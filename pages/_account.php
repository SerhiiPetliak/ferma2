<?PHP
$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
//if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		case "forum": include("pages/_forum.php"); break; // Ротатор
		case "knb": include("pages/account/_knb.php"); break; // КНБ
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "stats": include("pages/account/_story.php"); break; // Статистика
		case "referals": include("pages/account/_referals.php"); break; // Рефералы
        case "bonus2": include("pages/account/_bonus2.php"); break; // Бонус с риском
	    case "shop": include("pages/account/_shop.php"); break; // Моя ферма
	    case "magazin": include("pages/account/_magazin.php"); break; // Продажа фермы
		case "payment": include("pages/account/_payment.php"); break; // Статистика
        case "farm": include("pages/account/_farm.php"); break; // Склад
        case "bux4ik": include("pages/account/_bux4ik.php"); break; // Коробка удачи
        case "gono4ki": include("pages/account/_gono4ki.php"); break; // Гонки машин
        case "exchange": include("pages/account/_exchange.php"); break; // Обменный пункт
		case "market": include("pages/account/_market.php"); break; // Рынок
		case "rekladd": include("pages/account/_rekladd.php"); break; // Заказ рекламы
		case "withdraw": include("pages/account/_withdraw.php"); break; // Выплата WM
		case "balance": include("pages/account/_balance.php"); break; // Пополнение баланса
		case "config": include("pages/account/_config.php"); break; // Настройки
        case "rul": include("pages/account/_rul.php"); break; // Коробка удачи
		case "pm": include("pages/account/_pm.php"); break; // Внутренняя почта
		case "monitor": include("pages/account/_monitor.php"); break; // Внутренняя почта
		case "bonus": include("pages/account/_bonus.php"); break; // Ежедневный бонус
		case "chat": include("pages/account/_chat.php"); break; // chat
		case "chat": include("pages/_chat.php"); break; // chat 
		case "birja": include("pages/account/_birja.php"); break; // Биржа
		case "mybirja": include("pages/account/_mybirja.php"); break; // Моя биржа
		case "exit": include("exit.php"); break; // Выход
		

        case "advpayeer": include("pages/account/_advpayeer.php"); break; // Пополнение баланса


        case "serfing": include("pages/account/_serfing.php"); break;
        case "serfing_add": include("pages/account/_serfing_add.php"); break;
        case "serfing_cabinet": include("pages/account/_serfing_cabinet.php"); break;

        case "jobs": include("pages/account/_jobs.php"); break; // Задания
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");


if((!isset($_SESSION["user_id"]) AND $smenu=='monitor') OR isset($_SESSION["user_id"]))
return;
elseif(!isset($_SESSION["user_id"])) { 
Header("Location: /");} 
?>