<?php

require_once("classes/_class.config.php");
require_once("classes/_class.db.php");

$config = new config;

$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
$db->Query("set names cp1251;");

$db->Query("SELECT * FROM `db_jobs` WHERE `done` = '0' AND `accept`='1' AND `balance`>'0' ORDER BY `time` DESC");

while($job = $db->FetchArray()) {

    $time_difference = time() - $job['time'];

    switch ($job['auto_up']){
        case 0:
            if($time_difference >= 3600){
                auto_up($job, $db);
                continue;
            }
            break;
        case 1:
            if($time_difference >= 10800){
                auto_up($job, $db);
                continue;
            }
            break;
        case 2:
            if($time_difference >= 21600){
                auto_up($job, $db);
                continue;
            }
            break;
        case 3:
            if($time_difference >= 43200){
                auto_up($job, $db);
                continue;
            }
            break;
        case 4:
            if($time_difference >= 86400){
                auto_up($job, $db);
                continue;
            }
            break;
        case 5:
            if($time_difference >= 259200){
                auto_up($job, $db);
                continue;
            }
            break;

    }

}

function auto_up($job, $db){

    $user_id = $job['user'];
    $jid = $job['id'];

    $db->Query("SELECT * FROM `db_users_b` WHERE `id`='$user_id'");
    $user = $db->FetchArray();

    if($job['auto_up_balance'] == 0){
        if($user['money_b'] >= 100){
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "' WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_b` = `money_b` - 100 WHERE id = '" . $user_id . "'");
        }
    }

    if($job['auto_up_balance'] == 1){
        if($user['money_p'] >= 100){
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "' WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_p` = `money_p` - 100 WHERE id = '" . $user_id . "'");
        }
    }

}

?>