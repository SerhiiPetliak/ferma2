<?php
if(phpversion() >= "4.2.0") {extract($_SERVER);}
$bad_bot = 0;
/* перебираем все записи в файле black_list.dat */
$file_name = "bad_bot/black_list.dat";
$fp = fopen($file_name, "r") or die ("Ошибка файла<br>");
while ($line = fgets($fp,255)) {
 $data = explode(" ", $line);
 if (preg_match("/".$data[0]."/", $REMOTE_ADDR)) {$bad_bot++;}
}
fclose($fp);
if ($bad_bot > 0) { /* это бот и мы запрещаем ему вход на сайт */
sleep(3);			/* задержка загрузки странички */
echo '<html><head>';
echo '<title>Сайт временно недоступен.</title>';
echo '</head><body><br>';
echo '<center><h1>Сайт временно недоступен!</h1></center><br>';
echo '<p><center>Приносим свои извинения ...</center></p><br>';
echo '</body></html>';
exit;
}
?>