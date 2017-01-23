<?php
header("Content-Type: text/html; charset=windows-1251");
?>



<div class="text_right">
	<div class="text_pages_top"></div>
	<div class="text_pages_content">

<!--<div class="s-bk-lf">
	<div class="acc-title">Список заданий</div>
</div>-->
<div class="silver-bk"><div class="clr"></div>	
<?php


$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

function colorSum($sum){

	if($sum >= 100) return "red";
	return "#000000";
}

if(isset($_POST['accept']) && is_numeric($_POST['accept'])) {
	$payed=$_POST['accept'];
	$db->Query("SELECT * FROM `db_jobs` WHERE `id` = '$payed' AND `accept` = '0' LIMIT 1 ");
        if($db->NumRows() > 0) {
	     $db->Query("UPDATE `db_jobs` SET `accept`='1' WHERE `id`='$payed' ");
        }
	header("Location: ".$_SERVER["REQUEST_URI"]);
	exit;
}

if(isset($_POST['decline']) && is_numeric($_POST['decline'])) {
	$payed=$_POST['decline'];
	$db->Query("SELECT * FROM `db_jobs` WHERE `id` = '$payed' AND `accept` = '0' OR `accept`= '-1' OR `accept`= '9' LIMIT 1 ");
        if($db->NumRows() > 0) {
	     $db->Query("UPDATE `db_jobs` SET `accept`='2' WHERE `id`='$payed' ");
        }
	header("Location: ".$_SERVER["REQUEST_URI"]);
	exit;
}

if(isset($_POST['comment_id'])) {
	$comment = iconv("UTF-8", "windows-1251",  $_POST['comment']);
	$job_id = $_POST['comment_id'];
	$db->Query("SELECT * FROM `db_jobs` WHERE `id` = '$job_id' LIMIT 1 ");
	if($db->NumRows() > 0) {
		$db->Query("UPDATE `db_jobs` SET `comment`= '$comment' WHERE `id`='$job_id' ");
	}
	header("Location: ".$_SERVER["REQUEST_URI"]);
	exit;
}


$db->Query("SELECT `db_jobs`.*, `db_users_a`.`user` as `user_name`  FROM `db_jobs` LEFT JOIN `db_users_a` ON `db_jobs`.`user`=`db_users_a`.`id` WHERE accept = 9 ORDER BY `db_jobs`.`id` DESC LIMIT {$lim}, 100");

if($db->NumRows() > 0){

?>
<table cellpadding='3' cellspacing='0' border='1' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">Логин</td>
	<td align="center" width="50" class="m-tb">Дата</td>
	<td align="center" width="100" class="m-tb">№ задания</td>
	  <td align="center" width="100" class="m-tb">Описание</td>
	<td align="center" width="50" class="m-tb">Ok/No</td>
	<td align="center" width="300" class="m-tb">Мой комментарий</td>
  </tr>

<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
		<td align="center" valign="top"><a href="/?menu=helpmyadmin&sel=users&edit=<?=$data["user"]; ?>"<?php if($data['gardener']==1) {echo ' style="color: red;"';}  ?> class="stn"><?=$data["user_name"]; ?></a></td>
		<td align="center" valign="top"><?=date("d.m H:i:s",$data["time"]); ?></td>
		<td align="center" valign="top"><?=$data['id']; ?></td>
		<td align="center" valign="top"><div class="tooltip"><?= substr($data['about'], 0, 7)."...<br><hr>".substr($data['info'], 0, 10)."..."; ?><span class="tooltiptext"><?= $data['about']."<br><hr>".$data['info']; ?></span></div></td>
		<td align="center" valign="top">
		<?php
			if($data["accept"]==0 || $data["accept"]==-1 || $data["accept"]==9) {
		?>
		<form action="" method="post">
		<input type="hidden" name="accept" value="<?=$data["id"]; ?>" />
		<input type="submit" value="Одобрить" />
		</form>
				<br>
		<form action="" method="post">
		<input type="hidden" name="decline" value="<?=$data["id"]; ?>" />
		<input type="submit" value="Отменить" />
		</form>
		<?php
		}
		else if($data["accept"]==2)
		{
			echo "<center><font color = 'green'><b>Отменено!</b></font></center><BR />";
		}
		else
		{
			echo "<center><font color = 'green'><b>Одобрено!</b></font></center><BR />";
		}
		?>
		</td>
		<td align="center" valign="top">
			<form accept-charset="utf-8" action="" method="post">
				<input type="hidden" name="comment_id" value="<?=$data["id"]; ?>" />
				<textarea name="comment" id="" cols="25" rows="3"><?=$data["comment"]; ?></textarea>
				<input type="submit" value="Сохранить" />
			</form>
		</td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<?PHP


}else echo "<center><b>На данной странице нет записей</b></center><BR />";

	
$db->Query("SELECT COUNT(*) FROM  db_jobs WHERE accept = 0 OR accept = -1 ");
$all_pages = $db->FetchRow();

	if($all_pages > 100){
	
	$sort_b = (isset($_GET["sort"])) ? intval($_GET["sort"]) : 0;
	
	$nav = new navigator;
	$page = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"])) : 1;
	
	echo "<BR /><center>".$nav->Navigation(10, $page, ceil($all_pages / 100), "/?menu=admin384&sel=jobs&page="), "</center>";
	
	}
?>
</div><div class='clr'></div>


	</div>
	<div class="text_pages_bottom"></div>
</div>
