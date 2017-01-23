<div class="text_right">
<div class="text_pages_top"></div>
<div class="text_pages_content"> </div>
<?php
header("Content-Type: text/html; charset=windows-1251");
?>
<div class="text_pages_content">
<div class="s-bk-lf">
<br />
	<div class="acc-title">Продажа животных с вашей фермы. Средства зачисляются на счет для вывода!</div>

</div>
<div class="silver-bk">
    <p><center><b>Если вы не хотите больше учавствовать в жизни проекта, вы можете продать своих животных.</b></center></p>
  <p><center><b>Продажа животных доступна только тем пользователям которые пополняли свой счет минимум на 100 руб.</b></center></p>
  <p><center><b>Одно нажатие кнопки продать - продает одно животное!</b></center></p>
  <br/>
<?PHP
$_OPTIMIZATION["title"] = "Продажа фермы";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

if(isset($_POST["obmen1"])){
    if ($user_data["a_t"] >= 1) {
	if ($user_data["insert_sum"]>=100) {	
    $db->Query("UPDATE db_users_b SET a_t = a_t - 1, money_p = money_p +500   WHERE id = '$usid'");
    echo "<center><font color = 'green'><b>Продажа успешно произведена</b></font></center><BR />";
    } else echo "<div class='err'>Продажа животных доступна пользователям пополнявшим счет минимум на 100 руб!</div><BR /><BR /><BR />";
	}
    else echo "<center><font color = 'red'>Недостаточно Животных для продажи</font></center><BR />";

}

if(isset($_POST["obmen2"])){
    if ($user_data["b_t"] >= 1) {
			if ($user_data["insert_sum"]>=100) {	
    $db->Query("UPDATE db_users_b SET b_t = b_t - 1, money_p = money_p +2500   WHERE id = '$usid'");
    echo "<center><font color = 'green'><b>Продажа успешно произведена</b></font></center><BR />";
    } else echo "<div class='err'>Продажа животных доступна пользователям пополнявшим счет минимум на 100 руб!</div><BR /><BR /><BR />";
	}
    else echo "<center><font color = 'red'>Недостаточно Животных для продажи</font></center><BR />";

}

if(isset($_POST["obmen3"])){
    if ($user_data["c_t"] >= 1) {
			if ($user_data["insert_sum"]>=100) {	
    $db->Query("UPDATE db_users_b SET c_t = c_t - 1, money_p = money_p +5000   WHERE id = '$usid'");
    echo "<center><font color = 'green'><b>Продажа успешно произведена</b></font></center><BR />";
    } else echo "<div class='err'>Продажа животных доступна пользователям пополнявшим счет минимум на 100 руб!</div><BR /><BR /><BR />";
	}
    else echo "<center><font color = 'red'>Недостаточно Животных для продажи</font></center><BR />";

}
if(isset($_POST["obmen4"])){
    if ($user_data["d_t"] >= 1) {
			if ($user_data["insert_sum"]>=100) {	
    $db->Query("UPDATE db_users_b SET d_t = d_t - 1, money_p = money_p +12500   WHERE id = '$usid'");
    echo "<center><font color = 'green'><b>Продажа успешно произведена</b></font></center><BR />";
    } else echo "<div class='err'>Продажа животных доступна пользователям пополнявшим счет минимум на 100 руб!</div><BR /><BR /><BR />";
	}
    else echo "<center><font color = 'red'>Недостаточно Животных для продажи</font></center><BR />";
    
}
if(isset($_POST["obmen5"])){
    if ($user_data["e_t"] >= 1) {
			if ($user_data["insert_sum"]>=100) {	
    $db->Query("UPDATE db_users_b SET e_t = e_t - 1, money_p = money_p +25000   WHERE id = '$usid'");
    echo "<center><font color = 'green'><b>Продажа успешно произведена</b></font></center><BR />";
    } else echo "<div class='err'>Продажа животных доступна пользователям пополнявшим счет минимум на 100 руб!</div><BR /><BR /><BR />";
	}
    else echo "<center><font color = 'red'>Недостаточно Животных для продажи</font></center><BR />";

}

?>


<div class="shop">
    <div class="block">
        <div class="block_name"></span>Животное: Курица</div>
	    <div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
	    <li>Куриц: <b><?=$user_data["a_t"]; ?></b> шт.</li>
	    <li>
		Данное животное можно купить или продать на Птичьем рынке! Доходность курицы зависит от цены по которой вы ее купили!
		</li>
		<li>
		<button><a href="/account/birja" style="margin-top:10px;">Перейти на Птичий рынок</a></button>
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/1.png" alt="Курица" title="Курица">
		</div>
	</div>
</div>
	
<div class="shop">
    <div class="block">
        <div class="block_name"></span>Животное: Свинья</div>
	    <div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
	    <li>За одну свинью получаете 2500 монет</li>
	    <li>Свиней: <b><?=$user_data["b_t"]; ?></b> шт.</li>
	    <li>
		<form action="" method="post">
		<input type="hidden" name="obmen2" value="2" />
		<input type="submit" value="Продать" style="float: 25px; margin-top: 2px;">
		</form>
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/2.png" alt="Курица" title="Курица">
		</div>
	</div>
</div>
	
<div class="shop">
    <div class="block">
        <div class="block_name"></span>Животное: Овца</div>
	    <div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
	    <li>За одну овцу получаете 5000 монет</li>
	    <li>Овец: <b><?=$user_data["c_t"]; ?></b> шт.</li>
	    <li>
		<form action="" method="post">
		<input type="hidden" name="obmen3" value="3" />
		<input type="submit" value="Продать" style="float: 25px; margin-top: 2px;">
		</form>
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/3.png" alt="Курица" title="Курица">
		</div>
	</div>
</div>
	
<div class="shop">
    <div class="block">
        <div class="block_name"></span>Животное: Коза</div>
	    <div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
	    <li>За одну козу получаете 12500 монет</li>
	    <li>Коз: <b><?=$user_data["d_t"]; ?></b> шт.</li>
	    <li>
		<form action="" method="post">
		<input type="hidden" name="obmen4" value="4" />
		<input type="submit" value="Продать" style="float: 25px; margin-top: 2px;">
		</form>
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/4.png" alt="Коза" title="Коза">
		</div>
	</div>
</div>

<div class="shop">
    <div class="block">
        <div class="block_name"></span>Животное: Корова</div>
	    <div style="margin-top: -5px;" class="block_list"><ul class="block_ul">
	    <li>За одну козу получаете 25000 монет</li>
	    <li>Коров: <b><?=$user_data["e_t"]; ?></b> шт.</li>
	    <li>
		<form action="" method="post">
		<input type="hidden" name="obmen5" value="5" />
		<input type="submit" value="Продать" style="float: 25px; margin-top: 2px;">
		</form>
		</li>
		</ul>
		</div>
		<div class="block_img"><img src="/images/animals/5.png" alt="Корова" title="Корова">
		</div>
	</div>
</div>	

<div class="clr"></div></div>
</div>
<div class="text_pages_bottom"></div>
</div>