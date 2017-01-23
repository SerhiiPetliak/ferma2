<?php

require_once("classes/_class.config.php");
require_once("classes/_class.db.php");

$config = new config;

$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
$db->Query("set names cp1251;");

$db->Query("SELECT * FROM `db_jobs_use` LEFT JOIN  `db_jobs` ON `db_jobs_use`.`job_id`=`db_jobs`.`id` WHERE `status` = '1' ");

while($job = $db->FetchArray()) {

    $time_difference = time() - $job['finish_time'];

    if($time_difference >= 259200){
        accept($job, $db);
    }

}

function accept($job, $db){

    $jid = $job['job_id'];
    $usid = $job['user'];

    $price = $job['pay'];

    if ($price > 0 && $price < 6) {                               // Вычитаем у пользователя проценты
        $pay_user = $price - $price * 30 / 100;
    }
    if ($price > 5 && $price < 11) {
        $pay_user = $price - $price * 25 / 100;
    }
    if ($price > 10) {
        $pay_user = $price - $price * 20 / 100;
    }

    $pay_user_b = number_format($pay_user - (($pay_user * 30) / 100), 2); // оплата пользователю на баланс для покупок
    $pay_user_p = $pay_user - $pay_user_b; // оплата пользователю на баланс для вывода
    $pay_user_ref = $pay_user * 0.05; // оплата рефереру

    //зачисление денег за просмотр пользователю
    $db->query("UPDATE db_users_b SET `money_b` = `money_b` + '".$pay_user_b."', `money_p` = `money_p` + '".$pay_user_p."', `to_referer` = `to_referer` + '".$pay_user_ref."'	WHERE id = '".$usid."'");

    //зачисление денег за просмотр рефереру
    $db->Query("SELECT referer_id FROM db_users_a WHERE id = '".$usid."'");
    $user_info = $db->FetchArray();
    $db->query("UPDATE db_users_b SET `money_b` = `money_b` + '".$pay_user_ref."'	WHERE id = '".$user_info['referer_id']."'");

    //Засчитываем работу, снимаем деньги
    $db->Query("UPDATE `db_jobs_use` SET `status`='4' WHERE `user_id`='$usid' AND `job_id`='$jid'");
    $db->Query("UPDATE `db_jobs` SET `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid'");

}

?>