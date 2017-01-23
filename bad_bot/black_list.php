<?php
echo '<html><body><p>Как Вы сюда попали?</p>';
echo '<p><a href="https://mr-farmer.biz/">вернуться на главную страницу</a></p>';

if(phpversion() >= "4.2.0") {extract($_SERVER);}
$bad_bot = 0;
/* Смотрим, имеется ли такой же IP в базе */
$file_name = "black_list.dat";
$fp = fopen($file_name, "r") or die ("Ошибка файла<br>");
while ($line = fgets($fp, 255)) {
 $u = explode(" ", $line);
 if (preg_match("/".$u[0]."/", $REMOTE_ADDR)) {$bad_bot++;}
}
fclose($fp);
if ($bad_bot == 0) {
$tmestamp = time();
$datum = date("H:i:s d.m.Y",$tmestamp);
/* отсылаем отчет на email */
$to = "Ваш почтовый ящик";
$subject = "Заголовок сообщения";
$msg = "Пришёл с $REQUEST_URI $datum IP: $REMOTE_ADDR, User-агент $HTTP_USER_AGENT";
mail($to, $subject, $msg);
/* Если отсылать отчет на email не надо, то 4 строки выше можно удалить*/

/* Добавляем запись в файл black_list.dat */
$fp = fopen($file_name,'a+');
fwrite($fp,"$REMOTE_ADDR $datum $REQUEST_URI $HTTP_REFERER $HTTP_USER_AGENT\r\n");
fclose($fp);
}
echo '</body></html>';
?>