<?php
header("Content-Type: text/html; charset=windows-1251");
?>

<div class="text_right">

	<div class="text_pages_top"></div>
	<div class="text_pages_content">

<style>
H2 { 
    font-family: Arial;
    font-size: 130%;
}
   }
.changebox {
color: white;

width: 100px; height: 100px;
border: 0px solid #c9c9c9;
background-color: #3366CC;
}
.one_ferm {
    border-left: 0px solid #332D2D;
    border-bottom: 1px solid #332D2D;
    padding: 0 0 5px 8px;
    margin: 0 0 20px 0;
    position: relative;
}
 
/* IMG radius */

.b-img-radius {
  border: 2px solid #0000CD;
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
}

/* ----------- */
table {
    width: 100%; /* ������ ������� */
   }
   td {
    padding: 10px; /* ���� � ������� */
    vertical-align: top; /* ������������ �� �������� ���� ����� */
   }
</style>
<?PHP


$_OPTIMIZATION["title"] = "���������� ������ ������������� ���";
$_OPTIMIZATION["description"] = "���� ������� ��������� �� ����������� ��� �������� Mr.Farmer �� �� �������� �������������� �� ����� �� ���, � �� ��������� � ������� � �� �����������!";
$_OPTIMIZATION["keywords"] = "����������,������������� ����,��������� �����";
$user_id = $_SESSION["user_id"];
$usname = $_SESSION["user"];
$money_for_add=100;

$db->Query("SELECT COUNT(*) FROM db_monitor_ff");
$count_ff = $db->FetchRow();
$msg_ff = 10;
$ff_pages = ceil($count_ff / $msg_ff);



$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>

<table>
<tr align="left">
		<div style="font-size: 18px; color: #0000EE">
���������� ������ ������������� ���
</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 12px; color: #8B1A1A">
���� ������� ��������� �� ����������� ��� �������� Mr.Farmer<br>
�� �� �������� �������������� �� ����� �� ���, � �� ��������� � ������� � �� �����������!<br>
�� ��������� ���������� ��������� ���� � ������������� ��������� ����������!<br>
������ ���������� � ����� �������� �� ����� ������! >>> <a style="color: Gold" href="https://mr-farmer.biz/forum/viewforum.php?f=15" class="tips" original-title="��� ����������">������� � ������ ������.</a><br>
����� ���� ����������� �������� ������! ���� >>> <a style="color: Gold" href="https://mr-farmer.biz/forum/viewforum.php?f=15" class="tips" original-title="��� ����������">������� � ������ �� ������.</a><br>
</tr>
	<hr>
</div>
</table>
<div class="silver-bk">
	 <p style="text-align: center;"><img src="/img/mrfarmer.gif" border="0" alt="" width="88" height="31"></p>
        <center><a href="?menu=account&sel=monitor&fruitfarm=2" class="button-green-big button-green-big-new" style="margin-top:10px;">���</a>&nbsp;| &nbsp;<a href="?menu=account&sel=monitor&fruitfarm=1" class="button-green-big button-green-big-new" style="margin-top:10px;">������</a>&nbsp;| &nbsp;<a href="?menu=account&sel=monitor&fruitfarm=0" class="button-green-big button-green-big-new" style="margin-top:10px;">����������</a>&nbsp;| &nbsp;<a href="/rekladd.html" class="button-green-big button-green-big-new" style="margin-top:10px;">�������� ����</a></center>
		
<hr>
		
<?php
if (isset($_GET["fruitfarm"])) {
$vyborka="";
	
if (intval($_GET["fruitfarm"])==1) {
	$vyborka="WHERE can_pay=1";
}else if (intval($_GET["fruitfarm"])==0) {
	$vyborka="WHERE can_pay=0";
}
if ($_SESSION["user_id"]==1) {
?>
	
	<?php
}

# Generated by wh1skas platform helper
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
	$db->Query("SELECT * from db_monitor_ff {$vyborka} order by last_modified desc");
	while ($monitor_data=$db->FetchArray()) {
	?>
	<div class="one_ferm">
	<table>
	
	
	   <td align="left" width="200" height="130">
		<a href="/?menu=account&sel=monitor&viewff=<?=$monitor_data["id_site"];?>"><img class="b-img-radius" src="<?=$monitor_data["screenshot"];?>" width="200" height="150" /></a>
       </td>
	
	
		<td align="left" height="130">
			<h2><a href="/?menu=account&sel=monitor&viewff=<?=$monitor_data["id_site"];?>"><?=$monitor_data["name_site"];?></a></h2>
<i style="font-size: 16px; color: #8B4513">
			<?=$monitor_data["more"];?>
			</i>
			<br>
			</td>
			<table>
			<hr>
			<div style="font-size: 11px; color: #8B1A1A">
			<b>���� ����������:</b> &nbsp;<?=date('d.m.Y',$monitor_data["date_add"]);?> &nbsp; | &nbsp; <b>������:</b> &nbsp;<?=$monitor_data["status"];?> &nbsp; | &nbsp; <b>�����:</b> &nbsp;<?=$monitor_data["balls"];?>&nbsp;|&nbsp; <b>���������:</b>  (<?=intval($monitor_data["payment_sum"]/$monitor_data["insert_sum"]*100);?>%) &nbsp; | &nbsp; <a href="/?menu=account&sel=monitor&viewff=<?=$monitor_data["id_site"];?>"><b>������� � ���������� >>></b></a>
			</div>
			</table>
		
</table>
		
	</div>
	<?php
	}
	?>
	
	
	
	
	
	
	
	
	
<?php
}elseif (isset($_GET["addfruitfarm"])) {

##### ������ �������� ����� � �������
#####################################
if (isset($_POST["addformon"])) {
 	
$db->Query("SELECT * from db_users_b where id='$user_id' LIMIT 1");
$userdata=$db->FetchArray();

	$db->Query("SELECT * from db_monitor_ff");
	$monitir_data=$db->FetchArray();
	
	$name_site=$db->RealEscape(htmlspecialchars($_POST["name_site"]));
	$screensh=$db->RealEscape(htmlspecialchars($_POST["screensh"]));
	$last_modified=time();
	$date_add=time();
	$canpay=intval($_POST["can_pay"]);
	$url = $db->RealEscape(htmlspecialchars($_POST["url"]));
	$insert_sum=intval($_POST["insert_sum"]);
	$payment_sum=intval($_POST["payment_sum"]);
	
	$min_insert=intval($_POST["min_insert"]);
	$min_payment=intval($_POST["min_payment"]);
	$monitor_days=strtotime($_POST["monitor_days"]);
	
	$balls=strval($_POST["balls"]);
	$more=$_POST["more"];
	$id_user = $_SESSION["user_id"];
	
	$username = $_SESSION["user"];
	$autopay=strval($_POST["autopay"]);
	$pay_sys=strval($_POST["pay_sys"]);
	
	if(!empty($_POST['name_site']) OR !empty($_POST['url']) OR !empty($_POST['insert_sum']) OR !empty($_POST['payment_sum']) OR !empty($_POST['min_insert']) OR !empty($_POST['min_payment']) OR !empty($_POST['monitor_days']) OR !empty($_POST['balls']) OR !empty($_POST['pay_sys'])) { 
	if ($monitir_data["name_site"]!=$name_site OR $monitir_data["url"]!=$url) {
	
	if ($userdata["money_b"]>=0) {
	
	$db->Query("INSERT INTO db_monitor_ff 
	(name_site, can_pay, screenshot, moderated, last_modified, date_add, url, insert_sum, payment_sum, min_insert, min_payment, monitor_days, balls, more, id_user, username, autopay) 
	VALUES 
	('$name_site', '$canpay', '$screensh', '1', '$last_modified', '$date_add', '$url', '$insert_sum', '$payment_sum', '$min_insert', '$min_payment', '$monitor_days', '$balls', '$more', '$id_user', '$username', '$autopay')");
	$db->Query("UPDATE db_users_b SET money_b = money_b - '$money_for_add' where id='$id_user'");
	

	
	echo '<div class="yeahhh" style:width="60%">���� ����� � ������!</div>';
	
	}else echo'<div class="not" style:width="60%">����� ������� ������������!</div>';
	}else echo'<div class="not" style:width="60%">����� ����� ��� �������� � ����������!</div>';
	}else echo '<div class="not" style:width="60%">��������� ��� ����!</div>';
}


#####################################
if ($user_id==1) {
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>�������� ��������� �����:</td>
				<td><input type="text" name="name_site" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>������ ?:</td>
				<td><SELECT name="can_pay">
				<option value="1">������</option>
				<option value="0">�� ������</option>
				</SELECT></td>
			</tr>
			<tr>
				<td>������ �� ��������� �����:<br>(�������������� ����������� ������)</td>
				<td><input type="text" name="url" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>������ �� ��������:<br></td>
				<td><input type="text" name="screensh" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>������� ������� ���� ���� ������� � ������ (���):</td>
				<td><input type="text" name="insert_sum" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>������� ������� ���� ���� �������� �� ������� (���):</td>
				<td><input type="text" name="payment_sum" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>��������� ������� (������� ����� �������):</td>
				<td><input type="text" name="pay_sys" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>� ������ ��� �� ���������� ������:</td>
				<td><input type="date" name="monitor_days" value="" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>�� ����� ����� ���������� ��������� ����, ����� ����� ���� �������� �������� (���):</td>
				<td><input type="text" name="min_insert" value="0" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>����������� ����� ��� ������ ������� (���):</td>
				<td><input type="text" name="min_payment" value="0" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>���� �� ��������� �����:</td>
				<td><select onchange="one(this.value)" name="balls"><option value="��">��</option><option value="���">���</option></select></td>
			</tr>
			<tr>
				<td> �����������:</td>
				<td><select onchange="one(this.value)" name="autopay"><option value="��">��</option><option value="���">���</option></select></td>
			</tr>
			<tr>
				<td>��������� ��������:<br>�������� 500 ��������!</td>
				<td><textarea cols="50" name="more"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" class="buttonmenu" name="addformon" value="�������� �����"/></td>
				<td></td>
			</tr>
		</table>
	</form>
<?php

}


}
elseif (isset($_GET["editff"])) {
echo '<input type="button" value="�����" class="buybuy" onclick="history.back()">';
$id_site=strval($_GET["editff"]);
$db->Query("SELECT * from db_monitor_ff WHERE MD5(CONCAT(MD5(id_site),salt)) = '$id_site'");
$monff_data=$db->FetchArray();

echo '<form action="" method="post">
<div class="yeahhh" style:width="60%">'.$monff_data["name_site"].'</div><br><table>

<tr>
				<td>������� ������� ���� ���� ������� � ������ (���):</td>
				<td><input type="text" name="insert_sum" value="'.$monff_data["insert_sum"].'" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>������� ������� ���� ���� �������� �� ������� (���):</td>
				<td><input type="text" name="payment_sum" value="'.$monff_data["payment_sum"].'" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>��������� ������� (������� ����� �������):</td>
				<td><input type="text" name="pay_sys" value="'.$monff_data["pay_sys"].'" style="width: 80%;"/></td>
			</tr>';
		#	<tr>
		#		<td>� ������ ��� �� ���������� ������:</td>
		#		<td><input type="date" name="monitor_days" value="'.date("d.m.Y",$monff_data["monitor_days"]).'" style="width: 80%;"/></td>
		#	</tr>
	echo'		<tr>
	
				<tr>
				<td>������/ �� ������:</td>
				<td><SELECT name="can_pay">
				<option value="1">������</option>
				<option value="0">�� ������</option>
				</SELECT></td>
			</tr>
				<td>�� ����� ����� ���������� ��������� ����, ����� ����� ���� �������� �������� (���):</td>
				<td><input type="text" name="min_insert" value="'.$monff_data["min_insert"].'" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>����������� ����� ��� ������ ������� (���):</td>
				<td><input type="text" name="min_payment" value="'.$monff_data["min_payment"].'" style="width: 80%;"/></td>
			</tr>
			<tr>
				<td>���� �� ��������� �����:</td>
				<td><select onchange="one(this.value)" name="balls"><option value="��">��</option><option value="���">���</option></select></td>
			</tr>
			<tr>
				<td> �����������:</td>
				<td><select onchange="one(this.value)" name="autopay"><option value="��">��</option><option value="���">���</option></select></td>
			</tr>
			<tr>
				<td>��������� ��������:</td>
				<td><textarea cols="50" name="more">'.$monff_data["more"].'</textarea></td>
			</tr>
</table><br><br>';
echo '<input name="editmonff" type="submit" class="buttonexit" value="���������"/>';
echo '</form>';
echo '* ������ ��� ��������� ���������, ������������� ��������� ������!';

if (isset($_POST["editmonff"])) {
	$id_site=strval($_GET["editff"]);
//	$name_site=$db->RealEscape(htmlspecialchars($_POST["name_site"]));
	
	//$url = $db->RealEscape(htmlspecialchars($_POST["url"]));
	$insert_sum=intval($_POST["insert_sum"]);
	$payment_sum=intval($_POST["payment_sum"]);
	$canpay=intval($_POST["can_pay"]);
	$min_insert=intval($_POST["min_insert"]);
	$min_payment=intval($_POST["min_payment"]);
//	$monitor_days=strtotime($_POST["monitor_days"]);
	
	$balls=strval($_POST["balls"]);
	$more=$_POST["more"];
//	$id_user = $_SESSION["user_id"];
	
//	$username = $_SESSION["user"];
	$autopay=strval($_POST["autopay"]);
	$pay_sys=strval($_POST["pay_sys"]);
	
	if(!empty($_POST['insert_sum']) OR !empty($_POST['payment_sum']) OR !empty($_POST['min_insert']) OR !empty($_POST['min_payment']) OR !empty($_POST['monitor_days']) OR !empty($_POST['balls']) OR !empty($_POST['pay_sys'])) { 
	
	$db->Query("UPDATE db_monitor_ff set insert_sum='$insert_sum', can_pay='$canpay', payment_sum='$payment_sum', min_insert='$min_insert', min_payment='$min_payment', balls='$balls', more='$more', autopay='$autopay', pay_sys='$pay_sys' WHERE MD5(CONCAT(MD5(id_site),salt)) = '$id_site'");
	echo '<div class="yeahhh" style:width="60%">��������� �������!</div>';
	echo '
<script language="JavaScript" type="text/javascript">
<!-- 
function GoNah(){ 
 window.history.go(-2); 
} 
setTimeout( "GoNah()", 1000 ); 
//--> 
</script>
';
}else echo '<div class="not" style:width="60%">��������� ��� ����!</div>';
}
?>





<?php
} else if ($_GET["viewff"]) {
	$idview=intval($_GET["viewff"]);
	$db->Query("SELECT * from db_monitor_ff WHERE id_site=$idview order by last_modified desc");
	while ($monitor_data=$db->FetchArray()) {
	?>
	<div class="one_ferm">
	<table>
	<tr>
	<h2><a target="_blank" href="<?=$monitor_data["url"];?>"><?=$monitor_data["name_site"];?> - �������� ���� >>></a></h2>
	<center><img class="b-img-radius" src="<?=$monitor_data["screenshot"];?>" width="640" height="400" /></center>
		<br>
		<hr>
		<tr align="left">
		<div style="font-size: 14px; color: #8B1A1A">
			<b>���� ����������:</b> &nbsp;<?=date('d.m.Y',$monitor_data["date_add"]);?> &nbsp;|&nbsp; <b>���������:</b> <?=intval(((time() - $monitor_data["monitor_days"]) / 86400));?>-� ���� &nbsp;|&nbsp; <b>���������:</b> <?=$monitor_data["payment_sum"];?>&nbsp;���. (<?=intval($monitor_data["payment_sum"]/$monitor_data["insert_sum"]*100);?>%)</div> 
		</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 14px; color: #8B1A1A">
			<b>��� �����:</b> &nbsp;<?=$monitor_data["insert_sum"];?> &nbsp;���.&nbsp;|&nbsp; <b>������:</b> &nbsp;<?=$monitor_data["status"];?>&nbsp;|&nbsp; <b>������� ��������� �����:</b> &nbsp;<?=$monitor_data["balls"];?></div> 
		</tr>
		<hr>
	<tr align="left">
		<div style="font-size: 14px; color: #8B1A1A">
			<b>�����������:</b> &nbsp;<?=$monitor_data["autopay"];?>&nbsp;|&nbsp; <b>��������� ������:</b> &nbsp;<?=$monitor_data["min_insert"];?>&nbsp; ���.&nbsp;|&nbsp; <b>���.����� ��� ������:</b> &nbsp;<?=$monitor_data["min_payment"];?>&nbsp; ���.</div> 
		</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 16px; color: #1C1C1C">
		&nbsp;	<?=$monitor_data["more"];?></div> <br>
<?php
		if ($monitor_data["username"]==$usname AND $monitor_data["id_user"]==$user_id OR $user_id==1) {
		echo '<a href="?menu=account&sel=monitor&editff='.md5(md5($monitor_data["id_site"]).$monitor_data["salt"]).'">������������� ��������</a><br?';
		}
		?>
		</tr>
	</table>
		</div>
		 
		
		
<div id="hypercomments_widget"></div> 
<script type="text/javascript"> 
_hcwp = window._hcwp || []; 
_hcwp.push({widget:"Stream", widget_id: 84576}); 
(function() { 
if("HC_LOAD_INIT" in window)return; 
HC_LOAD_INIT = true; 
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase(); 
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true; 
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/84576/"+lang+"/widget.js"; 
var s = document.getElementsByTagName("script")[0]; 
s.parentNode.insertBefore(hcc, s.nextSibling); 
})(); 
</script> 
<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
<?
	}
} else Header("location /?menu=account&sel=monitor&fruitfarm=2");
?>
</div>

		</div>
	<div class="text_pages_bottom"></div>
</div>