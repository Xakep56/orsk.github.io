<?php
switch($message){
case"Меню":
case"меню":
case"Помощь":
case"помощь":
case"help":
case"Help":
case"Команда":
case"команда":
$otwet="📌Меню: Бота📿Фени!<br>
У фени есть 5 доступных команд<br>
😄Анекдот-Феня раскажеь Вам анекдот.<br>
📋Инфо-информация о Фени<br>
🎲Игра-сыграет с вами в одну из игр<br>
📝Цитата-напишет Вам случайную цитату!<br>
💰Бабло-напишет Вам курс валют.<br>
";
break;
case"Анекдот":
case"анекдот":
   include "anegdot.php";
break;
case"Инфо":
  case"инфо":
$otwet="Бот Феня-разрабатывается  исключительно  в развлекательных целях!";
break;
case"Цитата":
case"цитата":
include"citata.php";
break;
case"Игра":
case"игра":
$otwet="🎲ИГРА ТРИ НАПЕРСТКА🎲<br>Нужно угадать под каким наперстком лежит шарик напишите число в сообщении после слеша / от 1-го до 3-х ПРИМЕР: /1 нажать отправить";
break;
case"/1":
case"1":
include"igra.php";
break;
case"/2":
   case"2":
    include"igra.php";
break;
case"/3":
 case"3":
    include"igra.php";
break;
case"Бабло":
     case"бабло":

include"kurs_walyt.php";
break;
case"No":
case"Нет":
case"нет":
case"Неет";
case"Нэт";
include"dialogi/нет.php";
break;
  case"Да":
  case"да":
  case"Дадада":
  case"Дааа":
  case"дааа":
  case"Дэ":
  case"Нда":
include"dialogi/да.php";
break;
case"Человек":
  case"человек":
include"dialogi/человек.php";
  break;
     default:
include"otvet_default.php";
break;
}
 ?> 