<?php
echo '<html><body><p>��� �� ���� ������?</p>';
echo '<p><a href="https://mr-farmer.biz/">��������� �� ������� ��������</a></p>';

if(phpversion() >= "4.2.0") {extract($_SERVER);}
$bad_bot = 0;
/* �������, ������� �� ����� �� IP � ���� */
$file_name = "black_list.dat";
$fp = fopen($file_name, "r") or die ("������ �����<br>");
while ($line = fgets($fp, 255)) {
 $u = explode(" ", $line);
 if (preg_match("/".$u[0]."/", $REMOTE_ADDR)) {$bad_bot++;}
}
fclose($fp);
if ($bad_bot == 0) {
$tmestamp = time();
$datum = date("H:i:s d.m.Y",$tmestamp);
/* �������� ����� �� email */
$to = "��� �������� ����";
$subject = "��������� ���������";
$msg = "������ � $REQUEST_URI $datum IP: $REMOTE_ADDR, User-����� $HTTP_USER_AGENT";
mail($to, $subject, $msg);
/* ���� �������� ����� �� email �� ����, �� 4 ������ ���� ����� �������*/

/* ��������� ������ � ���� black_list.dat */
$fp = fopen($file_name,'a+');
fwrite($fp,"$REMOTE_ADDR $datum $REQUEST_URI $HTTP_REFERER $HTTP_USER_AGENT\r\n");
fclose($fp);
}
echo '</body></html>';
?>