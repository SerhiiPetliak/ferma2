<?php
if(phpversion() >= "4.2.0") {extract($_SERVER);}
$bad_bot = 0;
/* ���������� ��� ������ � ����� black_list.dat */
$file_name = "bad_bot/black_list.dat";
$fp = fopen($file_name, "r") or die ("������ �����<br>");
while ($line = fgets($fp,255)) {
 $data = explode(" ", $line);
 if (preg_match("/".$data[0]."/", $REMOTE_ADDR)) {$bad_bot++;}
}
fclose($fp);
if ($bad_bot > 0) { /* ��� ��� � �� ��������� ��� ���� �� ���� */
sleep(3);			/* �������� �������� ��������� */
echo '<html><head>';
echo '<title>���� �������� ����������.</title>';
echo '</head><body><br>';
echo '<center><h1>���� �������� ����������!</h1></center><br>';
echo '<p><center>�������� ���� ��������� ...</center></p><br>';
echo '</body></html>';
exit;
}
?>