<style>
   .new_fa{
    width:auto;
    float:right;
    font-size:7px;
    position:relative;
    behavior:url(/PIE.php);
    margin-right:10px;
}
  </style>
  
<ul>
<li>
<a href="/forum">
	&nbsp;<span class="fa fa-comments-o"></span>
	<span style="font-size: 15px">�����</span>&nbsp;&nbsp;</a>
</li>
<li><table width="200"> 
   <td>
<a href="/account/chat">
	<span class="fa fa-leaf"></span>
	<span style="font-size: 15px">��� </span>&nbsp;&nbsp;</a>
	</td>
   <td>  
<?
					$usid = $_SESSION["user_id"];
					$db->Query("SELECT * FROM wmrush_pm WHERE user_id_in = '$usid' AND status = 0 AND inbox = 1");
					$sk = $db->NumRows();
					if ($sk > 0) {$pmm = '<font color="red">('.$sk.')</font>';} else {$pmm = '<font color="red">(0)</font>';}
					?>
					<a href="/account/pm">
					&nbsp;<span style="font-size: 15px">�����</span> <?=$pmm; ?></a>
					</td>
</table></li>
<li onclick="javascript:Menu('1')"><button style="width:200px;height:25px;background: LightBlue; border-radius: 10px 10px 2px 0; text-align: left; " title="��� �����"><span class="fa fa-fw fa-home"></span>&nbsp;<b>��� �����</b><div class="new_fa"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></div></button></li>
  <ul id="menu_1" style="display:none;">
    <li><a href="/account/birja" <?=(!isset($_GET["sel"]) && strtolower($_GET["sel"]) == "farm") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">������ �����</span></a></li>
	<li><a href="/account/farm.html" <?=(!isset($_GET["sel"]) && strtolower($_GET["sel"]) == "farm") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">��� ��������</span></a></li>
	<li><a href="/account/shop.html" <?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "shop") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">������� ��������</span></a></li>
	<li><a href="/account/market.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "market") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">������� ���������</span></a></li>
    <li><a href="/account/magazin"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "magazin") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">������� �����</span></a></li>
 </ul>
		
<li onclick="javascript:Menu('2')"><button style="width:200px;height:25px;background: LightBlue; border-radius: 10px 10px 2px 0; text-align: left; " title="������ � ����"><span class="fa fa-fw fa-gamepad"></span>&nbsp;<b>������ � ����</b><div class="new_fa"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></div></button></li>
  <ul id="menu_2" style="display:none;">
	<li><a href="/account/bonus.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "bonus") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">���������� �����</span></a></li>
    <li><a href="/account/bonus2"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "bonus2") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">����� � ������</span></a></li>
    <li><a href="/account/rul"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "rul") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">���� � ���������</span></a></li>
    <li><a href="/account/gono4ki"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "gono4ki") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">���� � �����</span></a></li>
    <li><a href="/account/bux4ik"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "bux4ik") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">������� �����</span></a></li>
</ul>	
		
<li onclick="javascript:Menu('3')"><button style="width:200px;height:25px;background: LightBlue; border-radius: 10px 10px 2px 0; text-align: left; " title="����������"><span class="fa fa-fw fa-bar-chart"></span>&nbsp;<b>����������</b><div class="new_fa"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></div></button></li>
  <ul id="menu_3" style="display:none;">	
	<li><a href="/account/serfing"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "balance") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">�������</span></a></li>
	<li><a href="/account/jobs"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "jobs") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">�������<div class="new_label">�����!</div></span></a></li>
	</span>
</ul>

<li onclick="javascript:Menu('4')"><button style="width:200px;height:25px;background: LightBlue; border-radius: 10px 10px 2px 0; text-align: left; " title="�������"><span class="fa fa-fw fa-money"></span>&nbsp;<b>�������</b><div class="new_fa"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></div></button></li>
  <ul id="menu_4" style="display:none;">	
    <li><a href="/account/balance.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "balance") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">��������� ������</span></a></li>
	<li><a href="/account/withdraw.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "withdraw") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">�������� �������</span></a></li>
	<li><a href="/account/exchange.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "exchange") ? 'class="selected"' : False; ?>>
	&nbsp;&nbsp;<span class="fa fa-fw fa-angle-right"></span>
	<span style="font-size: 15px">��������</span></a></li>
</ul>

<li><a href="/?menu=account&sel=monitor&fruitfarm=2">
	<span class="fa fa-fw fa-university"></span>
	����������</a></li>
    <li><a href="/rekladd.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "rekladd") ? 'class="selected"' : False; ?>>
	<span class="fa fa-fw fa-shopping-cart"></span>
	����� �������</a></li>
	<li><a href="/account/referals.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "referals") ? 'class="selected"' : False; ?>>
	<span class="fa fa-fw fa-users"></span>
	���� ��������</a></li>
	<li><a href="/account/config.html"<?=(isset($_GET["sel"]) && strtolower($_GET["sel"]) == "config") ? 'class="selected"' : False; ?>>
	<span class="fa fa-fw fa-cog"></span>
	���������</a></li>

    <li><iframe data-aa='387477' src='https://ad.a-ads.com/387477?size=200x200' scrolling='no' style='width:200px; height:230px; border:2px; padding:10;overflow:hidden' allowtransparency='true' frameborder='0'></iframe></li>
    <li></li>
</ul>

	
