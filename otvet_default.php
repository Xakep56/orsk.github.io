<?php

$def[]='Ты кто?';
$def[]="Часик в радость чифир в сладость {$user_name}";

$def[]='У Тебя по Жизни все ровно?';
$def[]='Я бот а ты кто?';
$def[]='Доброго время суток!';
$def[]='Час в радость,БОГ в помощь!';
   srand ((double) microtime() * 1000000);
  $random_number = rand(0,count($def)-1);
$otwet=$def[$random_number];
 ?> 