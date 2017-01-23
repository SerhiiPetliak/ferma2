<?PHP
$_OPTIMIZATION["title"] = "Птичий рынок";
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
Птичий рынок: покупка и продажа ваших курочек!
</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 12px; color: #8B1A1A">
<b>Правила:</b><br>
Перед тем как выставить или купить лот соберите продукцию с холодильника!<br>
В поле количество укажите сколько вы хотите купить курочек, и нажмите купить!<br>
Покупка и продажа производится со счета для покупок.<br>
Минимальная цена одного лота 610 золота | Максимальная цена 3000 золота.<br>
Взымается комисия системы в размере 10% с продавца.<br>
</tr>
	<hr>
</div>
</table>
<div class="silver-bk0">
<br>
		<BR />
		<center><button style="border-radius: 2px; background: LimeGreen; ">Список курочек на продаже</button>&nbsp;  &nbsp;<button><a href="/account/mybirja" style="margin-top:10px;">Выставить на продажу</a></button></center>
		<BR />
		
		<?
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

//Покупаем курицу по лоту
		if(isset($_POST['vol'])) {
		$id = intval($_POST['vol']);
		$kol = (int)$_POST['kolvo'];
		
		if($kol >= 1) {
			$db->Query("SELECT * FROM db_birja WHERE id = '$id'");
			if($db->NumRows() == 1) {
				$q = $db->FetchArray();
				if($kol <= $q['kolvo']) {
				$sumpok = $kol * $q['price'];
				$sumz = $sumpok - ($sumpok * 0);
				$sumz2 = $sumz*0.9;
				if($user_data['money_b'] >= $sumpok) {
$array_items = array(1 => "a_t");
$array_name = array(1 => "1");
$item = intval($q["type"]);
$citem = $array_items[$item];

					if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){
						# Добавляем курицу и списываем деньги
						$db->Query("UPDATE db_users_b SET money_b = money_b - '$sumz', $citem = $citem + $kol,  
						last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");
						
						$db->Query("UPDATE db_users_b SET money_b = money_b + '$sumz2' WHERE id = '".$q['user_id']."'");
						$db->Query("UPDATE db_birja SET kolvo = kolvo - '$kol' WHERE id = '".$q['id']."'");
						$db->Query("SELECT * FROM db_birja WHERE id = '$id'");
						$s = $db->FetchArray();
						if($s['kolvo'] <= 0) {
						
						$db->Query("DELETE FROM db_birja WHERE id = '".$s['id']."'");
						}



						echo "<div class='ok'>Вы успешно купили курочку</div><BR /><BR /><BR />";
						
					}else echo "<div class='err'>Перед тем как докупить курочек следует собрать всю продукцию с холодильника!</div><BR /><BR /><BR />";
				}else echo "<div class='err'>УПС!!! Ошибочка!!! Недостаточно средств на счету</div><BR /><BR /><BR />";
				}else echo "<div class='err'>УПС!!! Ошибочка!!! В данном лоте нет столько курочек! Укажите меньшее число!</div><BR /><BR /><BR />";
			}else echo "<div class='err'>УПС!!! Ошибочка!!! Такого лота не существует</div><BR /><BR /><BR />";
		}else echo "<div class='err'>Не верное кол-во курочек</div><BR /><BR /><BR />";
		
		}
		
		?>
	<BR />
<table cellpadding='3' cellspacing='0' border='0' class="ta" align='center' width="96%">
   <tr id="ugolkru">
    <td align="center" class="m-tb"><b>id</b></td>
	<td align="center" class="m-tb">Курица</b></td> 
	<td align="center" class="m-tb">Цена(за 1 шт.)</b></td>
    <td align="center" class="m-tb">Логин</b></td>
	<td align="center" class="m-tb">Дата выставления</b></td>
	<td align="center" class="m-tb">Кол-во</b></td>
	<td align="center" class="m-tb">Купить</b>
	</td>
  </tr>
  
  
  
  <?
  $db->Query("SELECT * FROM db_birja order by price LIMIT 100");
  if($db->NumRows() == 0) {
  echo '<tr><td colspan="7"><br><center><font color="#008BC6">В данный момент на птичьем рынке нету ничего на продажу! Вы можете продать своих курочек!</font></center></td></tr>';
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
        
	<td align="center"><?=$a['price']* 1.0;?> золота</b></td>
        <td align="center"><?=$a['login'];?></b></td>
	<td align="center"><?=date("d.m.Y", $a['date']);?></b></td>
	<td align="center"><input type="text" value="<?=$a['kolvo'];?>" name="kolvo" style="width:40px"></b></td>
	<td align="center"><input type="submit" value="Купить"style="height: 30px; radius:10px; margin-top: 0px;" class="btn_7" /></b></td>
	</form>
  </tr>
  <? } ?>
</table>
	 

		<BR />
         </div>
		 		</div>
	<div class="text_pages_bottom"></div>
	<?php include("_200x300.php");?>
</div>
	
	