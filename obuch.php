<?php
if(isset($_GET['вопрос']) and isset($_GET['ответ'])){
$fp = fopen("otvet.php", "a");//Открываем файл в режиме записи
$перед='$messages_array[';
$пос="'";
$вопрос=$_GET['вопрос'];
$между="']='";
$ответ=$_GET['ответ'];
$mytext = "$перед$пос$вопрос$между$ответ';\r\n"; // Исходная строка
$test = fwrite($fp,$mytext);
fseek($fp,6);
if ($test) echo 'Данные в файл успешно занесены.';
else echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
}else{
   echo "Заполните все поля";
}
?>
<html>
<body>
<form action="obuch.php" method="get">
<b>Вопрос:</b><br>
<input name="вопрос">
<br><b>Ответ:</b><br>
<input name="ответ"><br>
<input type="submit" value="Отправить">
 </body>
 </html>
