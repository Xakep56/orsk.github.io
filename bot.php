<?php 

if (!isset($_REQUEST)) { 
  return; 
} 

//Строка для подтверждения адреса сервера из настроек Callback API 
$confirmation_token='ed17b148';

//Ключ доступа сообщества 
$token='61237e510de44bb7a00c27c37ca01a20f30be425bd799f84fddd99a11666269959040b837f0b303051f6d';
// VK API как сделать бот в вк готовый php скрипт бот вконтакте бот сообщений группы вконтакте
$data = json_decode(file_get_contents('php://input'));
switch ($data->type){
case 'confirmation':
echo $confirmation_token;
break;
    // Если это уведомление о вступлении в группу
case 'group_join':
        //...получаем id нового участника
        $userId = $data->object->user_id;

        //затем с помощью users.get получаем данные об авторе
        $userInfo = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$userId}&v=5.0"));

        //и извлекаем из ответа его имя
        $user_name = $userInfo->response[0]->first_name;

        //С помощью messages.send и токена сообщества отправляем ответное сообщение
        $request_params = array(
'message' => "Как жизнь?{$user_name}!",
            'user_id' => $userId,
            'access_token' => $token,
            'v' => '5.0'
        );

        $get_params = http_build_query($request_params);

        file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);

        //Возвращаем "ok" серверу Callback API
        echo('ok');
break;

 // Если это уведомление о выходе из группы
    case 'group_leave':
        //...получаем id ушедшего участника
        $userId = $data->object->user_id;

        //затем с помощью users.get получаем данные об авторе
        $userInfo = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$userId}&v=5.0"));

        //и извлекаем из ответа его имя
        $user_name = $userInfo->response[0]->first_name;

        //С помощью messages.send и токена сообщества отправляем ответное сообщение
        $request_params = array(
            'message' => "{$user_name}, Мне очень жаль прощаться с Тобой!",
            'user_id' => $userId,
            'access_token' => $token,
            'v' => '5.0'
        );

        $get_params = http_build_query($request_params);

        file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);

        //Возвращаем "ok" серверу Callback API
        echo('ok');

        break;
case 'message_new':
$user_id = $data->object->user_id;
$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0"));
$user_name = $user_info->response[0]->first_name;
$message = $data->object->body;
include"otvet.php";
include "meny.php";
foreach($messages_array as $k => $v){
if($message == $k){$otwet = $v;}
if($message == $v){$otwet=$k;}
if($message == $user_name)
{
$slovo='А я Феня!';
$otwet=$slovo;
}
}
$request_params =array(
'message' => $otwet,
'user_id' => $user_id,
'access_token' => $token,
'v' => '5.0'
);
$get_params = http_build_query($request_params);
file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
echo('ok');
break;
return false;
}
?>
