<?PHP
$_OPTIMIZATION["title"] = "���������� �����";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# ��������� �������
$bonus_min = 1;
$bonus_max = 50;

?>
<div class="text_right">
	<div class="text_pages_top"></div>
	<div class="text_pages_content">
	<?php include("link_s.php");?>
	<center>
	<div class="bonuses">
		<p>����� �������� 1 ��� � 24 ����</p>
		<p>����� �������� ������� �� ���� ��� �������. ����� ������ ������������ �� 1 �� 50 �����.</p>
		
	</div>
<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$db->Query("SELECT * FROM db_bonus_list WHERE user_id = '$usid'");
$row = $db->FetchArray();



$db->Query("SELECT COUNT(*) FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");
$hide_form = false;



	if($db->FetchRow() == 0){
	
		# ������ ������
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# ��������� ������
			$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' WHERE id = '$usid'");
			
			# ������ ������ � ������ �������
			
			
			$db->Query("INSERT INTO db_bonus_list (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# ��������� ������� ���������� �������
			$db->Query("DELETE FROM db_bonus_list WHERE date_del < '$dadd'");
			echo "<div class='ok'>�� ��� ���� ��� ������� �������� ����� � ������� {$sum}!</div>";
			$hide_form = true;
			
		}
			
			# ���������� ��� ��� �����
			if(!$hide_form){
?>

<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="�������� �����" style="height: 30px; margin-top:10px;"></td>
  </tr>
 
</table>
</form>

<?PHP 

			}

	}else echo '<div class="already_got"><img src="../images/success.png">&nbsp; �� ��� �������� ����� �� ��������� 24 ����</div>
	<div class="time_to">�� ������ �������� ��� ����� �����: <span style="color:#a20003;">'.$func->secs2hours($row["date_del"] - $dadd).'</span></div>
	'; ?>
<hr>
<table style="width: 100%">

  <tr><br><br>
  <div style="font-size: 18px; color: #006400">
  ��� ����� ���� ���������:</div>
  <br>
  <div id="linkslot_144544"><script src="https://linkslot.ru/bancode.php?id=144544" async></script></div>
 <br>
��������� 20 �������:
 </tr>
<tr>
	<th class="paddingtableb" width="10%">ID</th>
	<th class="paddingtableb" width="45%">������������</th>
	<th class="paddingtableb" width="20%">�����</th>
	<th class="paddingtableb" width="25%">����</th>
</tr>
  <?PHP
  
  $db->Query("SELECT * FROM `db_bonus_list` ORDER BY `id` DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		<tr>
    		<th class="paddingtablesmall"><?=$bon["id"]; ?></th>
    		<th class="paddingtablesmall"><?=$bon["user"]; ?></th>
    		<th class="paddingtablesmall"><?=$bon["sum"]; ?></th>
			<th class="paddingtablesmall"><?=date("d.m.Y",$bon["date_add"]); ?></th>
  		</tr>
		<?PHP
		
		}
  
	}else echo "<div class='ok'>������� �� �������!</div>"
  ?>

  
</table>
<center>
</div>
<div class="text_pages_bottom"></div> 
<?php include("_200x300.php");?>

</div>




