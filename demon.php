<?php
if(session_start()){
$тема='Новый подпищик';
$сообщение='Братан на нас подписались!';
mail("googlevitalyaoren@icloud.com","$тема","$сообщение");
print("OK!");
}
 ?> 