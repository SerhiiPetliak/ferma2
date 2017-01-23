<?php if(empty($_SESSION["user"])) {?>
        <ul>
            <li><a href="/about.html" <?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "about") ? 'class="selected"' : False; ?>>
			<span class="fa fa-info-circle "></span> О проекте</a>
			</li>
			<li><a href="/forum"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "news") ? 'class="selected"' : False; ?>>
			<span class="fa fa-comments-o"></span>Форум</a>
			</li>
            <li><a href="/forum/viewforum.php?f=3"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "news") ? 'class="selected"' : False; ?>>
			<span class="fa fa-newspaper-o"></span> Последние новости</a>
			</li>
			<li><a href="/?menu=account&sel=monitor&fruitfarm=2"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "monitor") ? 'class="selected"' : False; ?>>
			<span class="fa fa-university"></span> Мониторинг ферм</a>
			</li>
            <li><a href="/otziv.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "otziv") ? 'class="selected"' : False; ?>>
			<span class="fa fa-comment-o"></span> Отзывы</a>
			</li>
            <li><a href="/rules.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "rules") ? 'class="selected"' : False; ?>>
			<span class="fa fa-edit"></span> Соглашение</a>
			</li>
			<li><a href="/polezno.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "polezno") ? 'class="selected"' : False; ?>>
			<span class="fa fa-users"></span> Партнерка</a>
			</li>
			<li><a href="/rekladd.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "rekladd") ? 'class="selected"' : False; ?>>
			<span class="fa fa-shopping-cart"></span>Заказ рекламы</a>
			</li>
            <li><a href="/contacts.html"<?=(isset($_GET["menu"]) && strtolower($_GET["menu"]) == "contacts") ? 'class="selected"' : False; ?>>
			<span class="fa fa-envelope"></span> Контакты</a>
			</li>
			<li><iframe data-aa='387477' src='https://ad.a-ads.com/387477?size=200x200' scrolling='no' style='width:200px; height:230px; border:2px; padding:10;overflow:hidden' allowtransparency='true' frameborder='0'></iframe></li>
            <li></li>
        </ul>
<?php } ?>

        