<style>
#blink {
  -webkit-animation: blink 3.6s linear infinite;
  animation: blink 3.6s linear infinite;
}
@-webkit-keyframes blink {
  50% { color: rgb(34, 34, 34); }
  51% { color: rgba(34, 34, 34, 0); }
  100% { color: rgba(34, 34, 34, 0); }
}
@keyframes blink {
  50% { color: rgb(255, 0, 0); }
  51% { color: rgba(34, 34, 34, 0); }
  100% { color: rgba(34, 34, 34, 0); }
}
</style>

<ul>
    <li><a href="/forum" <?=(!isset($_GET["menu"]) OR strtolower($_GET["menu"]) == "index") ? 'class="current"' : False; ?>>Форум</a></li>
	<li><a href="/about.html" <?=(isset($_GET["menu"]) AND strtolower($_GET["menu"]) == "about") ? 'class="current"' : False; ?>>FAQ (о проекте)</a></li>
    <li><a href="/forum/viewforum.php?f=3" <?=(isset($_GET["menu"]) AND strtolower($_GET["menu"]) == "news") ? 'class="current"' : False; ?> id="blink">Новости !!!</a></li>
    <li><a href="/otziv.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "otziv") ? 'class="selected"' : False; ?>>Отзывы</a></li>
    <li><a href="/competition" <?=(isset($_GET["menu"]) AND strtolower($_GET["menu"]) == "competition") ? 'class="current"' : False; ?>>Конкурс</a></li>	
    <li><a href="/rules.html" <?=(isset($_GET["menu"]) AND strtolower($_GET["menu"]) == "rules") ? 'class="current"' : False; ?>>Соглашение</a></li>		
    <li><a href="/contacts.html" <?=(isset($_GET["menu"]) AND strtolower($_GET["menu"]) == "contacts") ? 'class="current"' : False; ?>>Контакты</a></li>
	
	<?php if(isset($_SESSION["user"])){?>
	<li><a class="logged" href="/account.html">Привет, <?=$_SESSION["user"]?>!</a></li>
	<li><a class="logged" href="/account/exit.html">Выход</a></li>
	<?php } else { ?>
	<li><a href="/signup.html">Вход/Регистрация</a></li>
	<?php } ?>
</ul> 
