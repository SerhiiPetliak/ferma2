<div class="text_right">
<div class="text_pages_top"></div>
<div class="text_pages_content">
<div class="s_divide"></div>	


<div class="s-bk-lf"><div class="acc-title"><div class="clr"></div>	<span style="font-size:20px;"><b>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">

<tr height='25' valign=top align=center>
<td align="center" class="m-tb">ID</td>

<td align="center" class="m-tb">Пользователь</td>

<td align="center" class="m-tb">IP</td>

<td align="center" class="m-tb">Забанить</td>

<td align="center" class="m-tb">Бан одинаковых IP</td>

<td align="center" class="m-tb">Спрятать</td>
</tr>


<?

if(isset($_POST["banned"])){

$db->Query("UPDATE db_users_a SET banned = '1' WHERE id = '".intval($_POST["banned"])."'");

echo "<center><b>Пользователь ".($_POST["banned"] > 0 ? "забанен" : "разбанен")."</b></center><BR />";

}
else
if(isset($_POST["banneds"])){

$db->Query("SELECT ip FROM db_users_a WHERE id = '".intval($_POST["banneds"])."'");

$ip=$db->FetchArray();
	$ip=$ip['ip'];
	$db->Query("UPDATE db_users_a SET banned = '1' WHERE ip = '$ip' ");
echo "<center><b>Пользователи с таким ip ".($_POST["banneds"] > 0 ? "забанены" : "разбанены")."</b></center><BR />";

}
else
if(isset($_POST["hide"])){

$db->Query("UPDATE db_users_a SET hide = '1' WHERE id = '".intval($_POST["hide"])."' ");

echo "<center><b>Пользователь скрыт</b></center><BR />";

}

$db->Query("SELECT *, INET_NTOA(db_users_a.ip) uip FROM db_users_a WHERE ip IN (SELECT ip FROM db_users_a GROUP BY ip HAVING COUNT(*) > 1) AND banned = 0 AND hide = 0 ORDER BY ip ");

while($data = $db->FetchArray()) 
{

?>


<tr class="htt">
<td align="center"><?=$data["id"]; ?></td>

<td align="center"><?=$data["user"]; ?></td>

<td align="center"><?=$data["uip"]; ?></td>
<td align="center">


<form action="" method="post">

<input type="hidden" name="banned" value="<?=$data["id"]; ?>" />

<input type="submit" value="Забанить" />

</form>


<td align="center">
<form action="" method="post">

<input type="hidden" name="banneds" value="<?=$data["id"]; ?>" />

<input type="submit" value="Забанить всех IP" />

</form>

</td>


<td align="center">

<form action="" method="post">

<input type="hidden" name="hide" value="<?=$data["id"]; ?>" />
<input type="submit" value="Скрыть" />

</form>

</td>

</tr>


<?php

}

?>


</table>

</div>

<div class='clr'></div>
 </div>
  </div>   
<div class="text_pages_bottom"></div>
</div>                       