<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users,
(SELECT COUNT(*) FROM db_users_a WHERE date_login > '$tfstats') activ_users");
$stats_data = $db->FetchArray();

?>

<div class="container"> 
	<div class="stats">
		<ul>
		    
			<li>
				<span><?=$stats_data["all_users"]; ?></span>
				Пользователей
			</li>
			<li>
				<span><?=$stats_data["activ_users"]; ?></span>
				Активных за 24 ч.
			</li>
			<li>
				<span><?=$stats_data["new_users"]; ?></span>
				Новых за 24 ч.
			</li>
			<li>
				<span><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +1); ?></span>
              Работаем дней       
			</li>
			<li>
				<span>
					<a href="/payments.html"><?=sprintf("%.2f",$stats_data["all_payment"]); ?></a>    
				</span>	
				Выплаченo
			</li>
			<li>
				<span>
					<?=sprintf("%.2f",$stats_data["all_insert"]); ?>   
				</span>	
				Резерв проекта

			</li>

		</ul>
		
	<div class="bantop">	
<table align="center" width="1000"> 
   <td>
 <iframe data-aa='324571' src='https://ad.a-ads.com/324571?size=468x60' scrolling='no' style='width:468px; height:60px; border:0px; padding:0;overflow:hidden' allowtransparency='true' frameborder='0'></iframe>
   </td>
   <td>
  <div id="linkslot_144542"><script src="https://linkslot.ru/bancode.php?id=144542" async></script></div>
 </td>
</table> 
	</div>
</div>
</div>