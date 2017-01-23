<?PHP
$_OPTIMIZATION["title"] = "Ферма";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
?>
<div class="text_right">
<div class="text_pages_top"></div>
<div class="text_pages_content">        
<div class="s_divide"></div>
<?php 
	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			
			$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			echo "<div class='ok'>Вы успешно собрали всю продукцию!</div>";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<div class='err'>Продукцию можно собрать не чаще чем 1 раз в 10 минут!</div>";
	
	}



?>

<table>
<tr align="left">
		<div style="font-size: 18px; color: #0000EE">
Моя ферма: здесь находятся купленные вами животные!
</tr>
		<hr>
		<tr align="left">
		<div style="font-size: 12px; color: #8B1A1A">
Вся продукция которую приносят вам ваши животные хранится в холодильнике. <br>
Вам нужно собирать ее и перемещать на склад, вы можете делать это каждых 10 минут!<br>
Собранную продукцию продавайте со склада и получайте доход! Старайтесь делать это каждый день! Вдруг пропадет електричество ))))))<br>
</tr>
	<hr>
</div>
</table>

<div class="clear"></div>
<div class="shop">
	<div class="block">
		<div class="block_name"></span>Животное: Курица / Доходность динамическая!</div>
		<div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
		<li>Продуктивность: <b><?=$sonfig_site["a_in_h"]; ?></b> в час</li>
		<li>Куплено: <b><?=$user_data["a_t"]; ?></b> шт.</li>
		<li>
		Продукции в холодильнике: <span style="font-size: 15px;"><b>
		<?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?>
		</b></span>яиц
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/1.png" alt="Курица" title="Курица">
		</div>
	</div>
</div>

<div class="shop">
	<div class="block">
		<div class="block_name"></span>Животное: Свинья / Доходность 18% в месяц</div>
		<div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
		<li>Продуктивность: <b><?=$sonfig_site["b_in_h"]; ?></b> в час</li>
		<li>Куплено: <b><?=$user_data["b_t"]; ?></b> шт.</li>
		<li>
		Продукции в холодильнике: <span style="font-size: 15px;"><b>
		<?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?>
		</b></span>мяса
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/2.png" alt="Свинья" title="Свинья">
		</div>
	</div>
</div>

<div class="shop">
	<div class="block">
		<div class="block_name"></span>Животное: Овца / Доходность 21.6% в месяц</div>
		<div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
		<li>Продуктивность: <b><?=$sonfig_site["c_in_h"]; ?></b> в час</li>
		<li>Куплено: <b><?=$user_data["c_t"]; ?></b> шт.</li>
		<li>
		Продукции в холодильнике: <span style="font-size: 15px;"><b>
		<?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?>
		</b></span>шерсти
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/3.png" alt="Овца" title="Овца">
		</div>
	</div>
</div>

<div class="shop">
	<div class="block">
		<div class="block_name"></span>Животное: Коза / Доходность 25.2% в месяц</div>
		<div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
		<li>Продуктивность: <b><?=$sonfig_site["d_in_h"]; ?></b> в час</li>
		<li>Куплено: <b><?=$user_data["d_t"]; ?></b> шт.</li>
		<li>
		Продукции в холодильнике: <span style="font-size: 15px;"><b>
		<?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?>
		</b></span>молока
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/4.png" alt="Коза" title="Коза">
		</div>
	</div>
</div>

<div class="shop">
	<div class="block">
		<div class="block_name"></span>Животное: Корова / Доходность 28.8% в месяц</div>
		<div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
		<li>Продуктивность: <b><?=$sonfig_site["e_in_h"]; ?></b> в час</li>
		<li>Куплено: <b><?=$user_data["e_t"]; ?></b> шт.</li>
		<li>
		Продукции в холодильнике: <span style="font-size: 15px;"><b>
		<?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?>
		</b></span>молока 
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/5.png" alt="Корова" title="Корова">
		</div>
	</div>
</div>

<form action="" method="post">
<center><input type="submit" name="sbor" value="Собрать с холодильника на склад" style="height:30px;"/></center>
</form>

</div>
<div class="text_pages_bottom"></div>
<?php include("_200x300.php");?>
</div>	