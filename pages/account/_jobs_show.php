
<?php
header("Content-Type: text/html; charset=windows-1251");

require_once("/classes/_class.config.php");
$usid = $_SESSION["user_id"];

$config = new config;

$job_id = $_GET['job_id'];


if (!empty($_SESSION['job_show_message'])) {
    echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['job_show_message']['class'] . '">'
        . $_SESSION['job_show_message']['message'] .
        '</div>';
    echo '<center><a href="/account/jobs/show/'.$job_id.'">Назад</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
    unset($_SESSION['job_show_message']);
    exit();
}


/*
 * Калькулятор руб-монеты
 */
$db->Query("SELECT * FROM `db_config` WHERE `id` = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
function calculate_sum($sum){
    if($sum > 0 && $sum < 6){
        $res = $sum - $sum * 30 / 100;
    }
    if($sum > 5 && $sum < 11){
        $res = $sum - $sum * 25 / 100;
    }
    if($sum > 10){
        $res = $sum - $sum * 20 / 100;
    }
    return $res;
}

function getRealIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

$real_ip = getRealIP();

/*
 * Удаляем из избраного
 */
if(isset($_POST['job_delete_from_favorite'])){
    $jid = $_POST['job_delete_from_favorite'];

    $db->Query("DELETE FROM `db_jobs_favorite` WHERE `user_id`='$usid' AND `job_id`='$jid'");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * Начинаем выполнять
 */
if(isset($_POST['start_job'])){


    $jid = $_POST['start_job'];
    $uip = $_POST['user_ip'];

    $job_work_info = $db->FetchArray($db->Query("SELECT * FROM `db_jobs_use` WHERE `user_id`='$usid' AND `job_id`='$jid' "));
    $job_info = $db->FetchArray($db->Query("SELECT * FROM `db_jobs` WHERE `id`='$jid' "));
    $pay = $job_info['pay'];

    if(!isset($job_work_info)){
        $db->Query("UPDATE `db_jobs` SET `balance`=`balance` - '$pay', `reserved_balance`=`reserved_balance` + '$pay' WHERE `id`='$jid' ");
        $db->Query("INSERT INTO `db_jobs_use` (`start_time`, `finish_time`, `user_id`, `user_ip`, `comment_user`, `comment_admin`, `status`, `job_id`)
                                       VALUES ('".time()."', '0', '$usid', '$uip', ' ', ' ', '0', '$jid') ");
    }elseif($job_info['balance'] > 0 && $job_info['period'] > 0 && $job_work_info['status'] > 1){
        if(isset($job_work_info) && ((time() - $job_work_info['finish_time']) >= $config->job_period_sec[$job_info['period']]) ){
            $db->Query("UPDATE `db_jobs` SET `balance`=`balance` - '$pay', `reserved_balance`=`reserved_balance` + '$pay' WHERE `id`='$jid' ");
            $db->Query("UPDATE `db_jobs_use` 
                                    SET `start_time`='".time()."', `finish_time`='0', `user_ip`='$uip', `comment_user`='', `comment_admin`='', `status`='0', `job_id`='$jid' 
                                    WHERE `user_id`='$usid' AND `job_id`='$jid' ");
        }else{
            $_SESSION['job_show_message']['message'] = "Еще не прошло нужное количество времени, после прошлого выполнения!";
            $_SESSION['job_show_message']['class'] = "red-text";
        }
    }else{
        $_SESSION['job_show_message']['message'] = "Ошибка!";
        $_SESSION['job_show_message']['class'] = "red-text";
    }



    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * Оправляем задание на проверку
 */
if(isset($_POST['finish_job'])){
    $jid = $_POST['finish_job'];
    $uip = $_POST['user_ip'];
    $info = iconv("UTF-8", "windows-1251", $db->RealEscape(htmlspecialchars($_POST['info'])));

    $db->Query("UPDATE `db_jobs_use` SET `finish_time`='".time()."', `user_ip`='$uip', `comment_user`='$info', `status`='1' WHERE `job_id`='$jid' AND `user_id`='$usid' ");

    if(isset($_POST['comment'])){
        $comment = iconv("UTF-8", "windows-1251", $db->RealEscape(htmlspecialchars($_POST['comment'])));
        $db->Query("INSERT INTO `db_jobs_comments` (`job_id`, `user_id`, `comment_time`, `comment`) VALUES ('$jid', '$usid', '".time()."', '$comment') ");
    }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * Отказ от выполнения
 */
if(isset($_POST['job_cansel'])){
    $jid = $_POST['job_cansel'];
    $db->Query("DELETE FROM `db_jobs_use` WHERE `user_id`='$usid' AND `job_id`='$jid'");
    $db->Query("UPDATE `db_jobs` SET `balance`=`balance` + `pay`, `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid'");
    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

$db->Query("SELECT `db_jobs`.`id`, `db_jobs`.`done`, `db_jobs`.`accept`, `db_jobs`.`user`, 
									`db_jobs`.`time`, `db_jobs`.`name`, `db_jobs`.`url`, `db_jobs`.`about`, 
									`db_jobs`.`info`, `db_jobs`.`category`, `db_jobs`.`period`, `db_jobs`.`time_to_job`, 
									`db_jobs`.`pay`, `db_jobs_category`.`name` as `cat_name`,
									`db_users_a`.`user` as `user_name`,
									`db_users_a`.`id` as `user_id`,
									`db_users_a`.`avatar` as `user_img`,
									`db_users_a`.`jobs_accept` as `accept_counter`,
									`db_users_a`.`jobs_decline` as `decline_counter`,
									`db_jobs_favorite`.`job_id` as `favorite_id`
								FROM `db_jobs`
								LEFT JOIN `db_jobs_category` 
								  ON db_jobs.category=db_jobs_category.id
								LEFT JOIN `db_users_a` 
								  ON db_jobs.user=db_users_a.id
								LEFT JOIN `db_jobs_favorite` 
								  ON `db_jobs`.`id`=`db_jobs_favorite`.`job_id` AND `db_jobs_favorite`.`user_id`='$usid'
								WHERE `db_jobs`.`id` = $job_id");

$job_info = $db->FetchArray();
$jid = $job_info['id'];
/*
 * Достаем комментарии
 */
$job_comments = $db->FetchArrayAll(
    $db->Query("SELECT * FROM `db_jobs_comments` 
                          LEFT JOIN `db_users_a`
                          ON `db_jobs_comments`.`user_id`=`db_users_a`.`id`
                          WHERE `job_id`='$job_id'
                          ORDER BY `comment_time` DESC")
);
/*
 * Достаем инфу про выполнение задания, если есть
 */
$job_work_info = $db->FetchArray($db->Query("SELECT * FROM `db_jobs_use` WHERE `user_id`='$usid' AND `job_id`='$jid' AND `status`=0 "));
?>

    <div class="text_right">
        <div class="text_pages_top"></div>
        <div class="text_pages_content">
            <div class="jobs_wrapper">
                <div class="jobs_header_menu">
                    <a href="/account/jobs" class="small_blue_text">Список заданий</a> |
                    <a href="/account/jobs/statistic/1" class="small_blue_text">Статистика</a> |
                    <a href="/account/jobs/my/1" class="small_blue_text">Мои задания</a> |
                    <a href="/account/jobs/add" class="small_blue_text">Добавить задание</a>
                </div>
                <div class="jobs_main_title">
                    Задание №<?php echo $job_info['id']; ?>
                </div>
                <h1 class="text-center dark-green_text"><?php echo $job_info['name']; ?></h1>
                <div class="jobs_show_block">
                    <div class="jobs_show_title">
                        Информация об авторе
                    </div>
                    <table width="100%">
                        <tr>
                            <td class="text-center">
                                <img src="/images/avatar/<?php echo $job_info['user_img'];?>" alt="">
                            </td>
                            <td class="vatop">
                                <div class="jobs_author_div jobs_normal_text">
                                    <ul style="float: left;">
                                        <li class="jobs_management_left_l buttons grey_text">
                                            Автор: <strong><?php echo $job_info['user_name'];?></strong>
                                        </li>
                                        <li>
                                            Одобрено: <strong class="green-text"><?php echo $job_info['accept_counter']; ?></strong> / Отклонено: <strong class="red-text"><?php echo $job_info['decline_counter']; ?></strong>
                                        </li>
                                    </ul>
                                    <span class="jobs_management_left_rbuttons">
                                        <?php
                                            if(isset($job_info['favorite_id'])) {
                                        ?>
                                                <form action="" method="post" style="display: inline;">
                                                    <input type="hidden" name="job_delete_from_favorite"
                                                       value="<?php echo $job_info['id']; ?>">
                                                    <input type="submit" class="custom_submit small_blue_text" style="vertical-align: bottom;" value="Удалить из избранного">
                                                </form>
                                                |
                                        <?php
                                            }
                                        ?>
                                        <a href="/account/jobs/page/1/filter/0/sort/0/author/<?php echo $job_info['user_id'];?>" class="small_blue_text">Все задания автора</a>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="jobs_show_block">
                    <div class="jobs_show_title">
                        Информация о задании
                    </div>
                    <table width="100%">
                        <tr>
                            <td>
                                <ul class="jobs_normal_text">
                                    <li>Тип задания: <strong><?php echo $job_info['cat_name']; ?></strong></li>
                                    <li>Повтор задания: <strong><?php echo ($job_info['period'] == 0 ? "Нет повтора" : "Задание можно выполнять каждые ".$config->job_period[$job_info['period']]); ?></strong> </li>
                                    <li>Время на выполнение: <strong><?php echo $config->time_to_job_words[$job_info['time_to_job']]; ?></strong></li>
                                </ul>
                            </td>
                            <td class="vamid">
                                <span class="green-text">
                                    <strong>
                                        Оплата:
                                        <?php

                                            echo calculate_sum($job_info['pay'])." монет";

                                        ?>
                                    </strong>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="jobs_show_block">
                    <div class="jobs_show_title">
                        Описание задания
                    </div>
                    <div class="jobs_show_desc">
                        <p>
                            <?php echo $job_info['about']; ?>
                        </p>
                    </div>
                </div>
                <div class="jobs_show_block">
                    <div class="jobs_show_title">
                        Что нужно указать для проверки
                    </div>
                    <div class="jobs_show_check">
                        <p>
                            <?php echo $job_info['info']; ?>
                        </p>
                    </div>
                </div>
                <div class="jobs_show_block text-center">
                    <?php
                        if(isset($job_work_info)) {
                    ?>
                            <!--<a href="#job_start_block" class="jobs_show_button job_start_button">Начать выполнение</a><br>-->
                            <br>
                            <div class="jobs_in_work_process_block p5" id="job_start_block">
                                <div class="jobs_show_title">
                                    Проверка задания
                                </div>
                                <h1>Вы начали выполнять это задание.</h1>
                                <ul class="tal jobs_normal_text">
                                    <li>1. Прочитайте описание задания.</li>
                                    <li>2. Перейдите на сайт рекламодателя задания для выполнения задания.</li>
                                    <li>
                                        <a href="<?php echo $job_info['url']; ?>" target="_blank" class="big_blue_text">Перейти на сайт
                                            для выполнения задания.</a>
                                    </li>
                                    <li>Подайте отчет о выполнении. Впишите в поле ниже то, что просит рекламодатель для
                                        выполнения задания:
                                    </li>
                                </ul>
                                <p class="tal jobs_normal_text">
                                    <?php echo $job_info['info']; ?>
                                </p>
                                <p class="tal jobs_normal_text jobs_show_title">
                                    Осталось времени на выполнение задания:
                                    <span class="red-text">
                                        <strong id="my_timer">
                                            <?php
                                                $time_shift = $config->time_to_job[$job_info['time_to_job']] - (time() - $job_work_info['start_time']);
                                                if($time_shift <= 0){
                                                    echo "0:0:0";
                                                }else{
                                                    $time = new DateTime('@'.$time_shift);
                                                    echo $time->format('H:i:s');
                                                }

                                            ?>
                                        </strong>
                                    </span>
                                </p>
                                <form accept-charset="UTF-8" action="" method="POST" class="jmp" width="100%">
                                    <input type="hidden" name="user_ip" value="<?php echo $real_ip; ?>">
                                    <input type="hidden" name="finish_job" value="<?php echo $job_info['id']; ?>">
                                    <textarea name="info" id="" cols="30" rows="10">Текст для проверки</textarea>
                                    <hr>
                                    <p>
                                        Комментарий к заданию (необязательно):
                                    </p>
                                    <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                    <p class="tal jobs_normal_text">
                                        Ваш IP-адрес: <?php echo $real_ip; ?>, текущее время
                                        <script> var day = new Date(), hour = day.getUTCHours() + -day.getTimezoneOffset() / 60, month = day.getUTCMonth() + 1;
                                            document.write(day.getUTCDate() + "." + month + "." + day.getUTCFullYear() + "г." + " " + hour + ":" + day.getUTCMinutes());</script>
                                    </p>
                                    <input class="jobs_show_button" type="submit" value="Отправить">
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="job_cansel" value="<?php echo $job_info['id'];?>">
                                    <input type="submit" class="jobs_cansel_button" value="Я не буду выполнять! (Отмена)">
                                </form>
                                <!--<a href="" class="jobs_cansel_button">Я не буду выполнять! (Отмена)</a>-->

                            </div>
                    <?php
                        }else{
                    ?>
                            <form action="" method="post">
                                <input type="hidden" name="user_ip" value="<?php echo $real_ip; ?>">
                                <input type="hidden" name="start_job" value="<?php echo $job_info['id']; ?>">
                                <input type="submit" class="jobs_show_button job_start_button"
                                       value="Начать выполнение">
                            </form><br>
                    <?php
                        }
                    ?>
                    <a href="/account/jobs/page/1/filter/0/sort/0/author/0" class="jobs_show_button">Перейти к списку заданий</a>
                </div>

                <div class="jobs_show_block">
                    <div class="jobs_show_title">
                        Комментарии других пользователей
                    </div>
                    <span class="jobs_normal_text">
                        <?php echo (count($job_comments) == 0 ? "Нет комментариев" : "Комментариев всего: ".count($job_comments)); ?>
                    </span>
                    <div class="jobs_show_comment">
                        <?php
                            foreach ($job_comments as $comment_item) {
                        ?>
                                <div class="jobs_comment_item">
                                    <div class="jobs_item_left">
                                        <img src="/images/avatar/<?php echo $comment_item['avatar']; ?>" alt="">
                                    </div>
                                    <div class="jobs_comment_item_right jobs_normal_text tal">
                                        <p><?php echo "[".date('d.m.Y H:i', $comment_item['comment_time'])."] <strong>".$comment_item['user']."</strong>"; ?></p>
                                        <p>
                                            <?php echo $comment_item['comment']; ?>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text_pages_bottom"></div>
    </div>
<script>
    $(document).ready(function(){
       /*$(".job_start_button").click(function(){
           startTimer();
            $(".jobs_management_pay").css("display","block");
       });*/
       var is_start = $(".jobs_management_pay").attr("id");
        if(is_start = "job_start_block"){
            startTimer();
        }
    });

    function startTimer() {
        var my_timer = document.getElementById("my_timer");
        var time = my_timer.innerHTML;
        var arr = time.split(":");
        var h = arr[0];
        var m = arr[1];
        var s = arr[2];
        if (s == 0) {
            if (m == 0) {
                if (h == 0) {
                    alert("Время вышло");
                    window.location.reload();
                    return;
                }
                h--;
                m = 60;
                if (h < 10) h = "0" + h;
            }
            m--;
            if (m < 10) m = "0" + m;
            s = 59;
        }
        else s--;
        if (s < 10) s = "0" + s;
        document.getElementById("my_timer").innerHTML = h+":"+m+":"+s;
        setTimeout(startTimer, 1000);
    }

</script>