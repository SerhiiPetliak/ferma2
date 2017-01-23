<?PHP
$_OPTIMIZATION["title"] = "Мои лоты";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];
?>
<style>
#ugolkru{
 color: #0000;
 background:#E6E6FA;
 </style>
<div class="text_right">

	<div class="text_pages_top"></div>
	<div class="text_pages_content">
<table>
<tr align="left">
		<div style="font-size: 18px; color: #0000EE">
Управление вашими лотами:
</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 12px; color: #8B1A1A">
<b>Правила:</b><br>
Введите количество и цену по которой вы хотите продать ваших курочек.<br>
Минимальная цена одного лота 610 золота | Максимальная цена 3000 золота.<br>
Перед тем как выставить или купить лот соберите продукцию с холодильника!<br>
Покупка и продажа производится со счета для покупок.<br>
Взымается комисия системы в размере 10% с продавца.<br>
</tr>
	<hr>
</div>
</table>
		<?
		
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();


				

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();


				
		if(isset($_POST['type'])) {
		$type = intval($_POST['type']);
		$price = sprintf("%.2f",$_POST["price"]);
		$kolvo = intval($_POST['kolvo']);
		
$array_items = array(1 => "a_t");
$array_name = array(1 => "1");
$item = intval($type);
$citem = $array_items[$item];
$sonf = $sonfig_site["amount_".$citem] - ($sonfig_site["amount_".$citem]*0.8);

if($user_data['credit'] > 0) {
	echo '<center><font color="red">Вы не можете выставить курочку на продажу так как на вас висит кредит в размере '.$user_data['credit'].' серебра, погасите кредит и сможете воспользоваться торгами</font></center>
	<div class="clr"></div>		
</div>';
	return;
	}

if($type >= 1 and $type <= 14) {
if($kolvo >= 1) {
if($price  > $sonf and $price <=  $sonfig_site["amount_".$citem]) {
if($user_data[$citem] >= $kolvo) {
$db->Query("INSERT INTO db_birja (user_id, login, type, date, kolvo, price) VALUES ('$usid', '$usname', '$type', '".time()."', '$kolvo', '$price')");
$db->Query("UPDATE db_users_b SET $citem = $citem - '$kolvo' WHERE id = '$usid'");

echo "<div class='ok'>Вы успешно выставили курочку на продажу</div><BR /><BR /><BR />";
}else echo "<div class='err'>УПС!!! Ошибочка!!! Недостаточно курочек</div><BR /><BR /><BR />";
}else echo "<div class='err'>УПС!!! Ошибочка!!! Не верная стоимость курочки. Стоимость не может быть ниже 610 и выше 3000</div><BR /><BR /><BR />";
}else echo "<div class='err'>УПС!!! Ошибочка!!! Не верное кол-во курочек</div><BR /><BR /><BR />";
}else echo "<div class='err'>УПС!!! Ошибочка!!! Укажите курочку</div><BR /><BR /><BR />";

		
		}
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
		?>
		<BR />
		<center><table class="standard-table">
		<form method="post" action="">
<tr>
   <td>У вас есть:</td>
   <td><select name="type">
<option value="1"><?=$user_data['a_t'];?> курочек
</select>   </td>
  </tr>
  <tr>
  <td>Кол-во</td>
  <td><input type="text" name="kolvo" value=""></td>
  </tr>
  <tr>
  <td>Цена за (1) </td>
  <td><input type="text" name="price" value=""></td>
  </tr>
  <tr align="center">
  <td colspan="2"><input type="submit" value="Выставить на продажу"style="height: 30px; radius:10px; margin-top: 0px;" class="btn_7" /></td>
  </tr>
  </form>
</table>		
	
		<BR />
		<center><button><a href="/account/birja" style="margin-top:10px;">Вернуться к торгам</a></button>&nbsp;  &nbsp;<button style="border-radius: 2px; background: LimeGreen; ">Мои лоты</button></center>
		<BR />
		
		
		
		<?
		if(isset($_POST['vol'])) {
		$id = intval($_POST['vol']);
		$kol = intval($_POST['kolvo']);
		$db->Query("SELECT * FROM db_birja WHERE id = '$id' AND user_id = '$usid'");
		if($db->NumRows() == 1) {
		$f = $db->FetchArray();
		
		
$array_items = array(1 => "a_t");
$array_name = array(1 => "1");
$item = intval($f['type']);
$citem = $array_items[$item];


		if($kol >= $f['kolvo']) {
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){
		$db->Query("UPDATE db_birja SET kolvo = kolvo - '$kol' WHERE id = '$id' AND user_id = '$usid'");
		$db->Query("UPDATE db_users_b SET $citem = $citem + '$kol' WHERE id = '$usid'");
		$db->Query("SELECT * FROM db_birja WHERE id = '$id' AND user_id = '$usid'");
		$g = $db->FetchArray();
		if($g['kolvo'] <= 0) {
		$db->Query("DELETE FROM db_birja WHERE id = '$id' AND user_id = '$usid'");
		}
		echo "<div class='ok'>Вы успешно сняли курочку с продажи</div><BR /><BR /><BR />";
		}else echo "<div class='err'>Перед тем как снять с продажи курицу соберите продукцию!</div><BR /><BR /><BR />";
		}else echo "<div class='err'>УПС!!! Ошибочка!!! Вы указали больше чем у вас имеется на бирже!</div><BR /><BR /><BR />";
		}else echo "<div class='err'>УПС!!! Ошибочка!!! Это не ваш лот</div><BR /><BR /><BR />";
		}
		
		?>
		<BR />
<table cellpadding='3' cellspacing='0' border='0' class="ta" align='center' width="96%">
   <tr id="ugolkru">
    <td align="center" class="m-tb"><b>id</b></td>
   
	<td align="center" class="m-tb">Животное</b></td>
	<td align="center" class="m-tb">Вы получите за (1)</b></td>
	<td align="center" class="m-tb">Дата выставления</b></td>
	<td align="center" class="m-tb">Кол-во</b></td>
	<td align="center" class="m-tb">Действие</b></td>
  </tr>
  
  
  <?
  $db->Query("SELECT * FROM db_birja WHERE user_id = '$usid' LIMIT 100");
  if($db->NumRows() == 0) {
  echo '<tr><td colspan="7"><br><center><font color="#008BC6">Ваши курочки все проданы или вы еще не выставляли лотов на продажу!</font></center></td></tr>';
  }
  while($a = $db->FetchArray()){
  switch($a['type']) {
  case 1: $type = '<img src="/images/animals/1b.png" /><div class="fr-te-gr"style=" margin-top: 1px" /><font color="#000000">'; break;

  
  }


  ?>
  <tr class="htt">
  <form method="post" action="">
    <td align="center"><b><?=$a['id'];?></b></td>
	<input type="hidden" name="vol" value="<?=$a['id'];?>">
   
	<td align="center"><?=$type;?></b></td>
	<td align="center"><?=$a['price']* 0.9;?> золота.</b></td>
	<td align="center"><?=date("d.m.Y", $a['date']);?></b></td>
	<td align="center"><input type="text" value="<?=$a['kolvo'];?>" name="kolvo" style="width:40px"></b></td>
	<td align="center"><input type="submit" value="Снять с торгов"style="height: 30px; radius:10px; margin-top: 0px;" class="btn_7" /></b></td>
	</form>
  </tr>
  <? } ?>
</table>

		<BR />
         
		 		</div>
	<div class="text_pages_bottom"></div>
	<?php include("_200x300.php");?>
</div>
	