<?php

require_once("classes/_class.config.php");
require_once("classes/_class.db.php");

$config = new config;

$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
$db->Query("set names cp1251;");

$db->Query("SELECT * FROM `db_jobs_use` LEFT JOIN  `db_jobs` ON `db_jobs_use`.`job_id`=`db_jobs`.`id` WHERE `status` = '0' ");

while($job = $db->FetchArray()) {

    $time_difference = time() - $job['start_time'];

    if($time_difference >= $config->time_to_job[$job['time_to_job']]){
        decline($job, $db);
    }

}

function decline($job, $db){

    $jid = $job['job_id'];
    $usid = $job['user'];
    $reason = "Время, отведенное на выполнение задания закончилось!";

    $db->Query("UPDATE `db_jobs_use` SET `status`='3', `comment_admin`='$reason', `finish_time`='".time()."' WHERE `user_id`='$usid' AND `job_id`='$jid' ");
    $db->Query("UPDATE `db_jobs` SET  `balance`=`balance` + `pay`, `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid' ");

}

?>