
<?php
header("Content-Type: text/html; charset=windows-1251");

require_once("/classes/_class.config.php");

$config = new config;


if (!empty($_SESSION['job_add_message'])) {
    echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['job_add_message']['class'] . '">'
                        . $_SESSION['job_add_message']['message'] .
                        '</div>';
            echo '<center><a href="/account/jobs/add">Вернуться к странице заданий</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
    unset($_SESSION['job_add_message']);
    exit();
}

$uname = $_SESSION["user"];
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$money = $user_data['money_b'];

if(isset($_POST['update_job'])){

    $name = iconv("UTF-8", "windows-1251",  $_POST['name']);

    if(preg_match('/^[а-яa-zA-ZА-Я0-9.!,\s]{4,180}$/s', $name)) {
        $db->Query("SELECT * FROM `db_jobs_category` WHERE `id` = '".intval($_POST['category'])."' ");
        if($db->NumRows() > 0) {
            if(strlen($_POST['about']) > 4 && strlen($_POST['about']) <= 1024) {
                if(strlen($_POST['info']) > 4 && strlen($_POST['info']) <= 1024) {
                    if($_POST['pay'] > 0.49 && $_POST['pay'] < $money) {
                        $db->Query("SELECT `time` FROM `db_jobs` WHERE `user` = '$uname' ORDER BY `id` DESC LIMIT 1 ");
                        if($db->FetchRow() < time() - 180 || $db->NumRows() == 0) {
                            # Сохраняем

                            $period = $_POST['period'];
                            $time_to_job = $_POST['time_to_job'];
                            $pay = $_POST['pay'];
                            $category = $_POST['category'];
                            $url = $db->RealEscape($_POST['url']);
                            $about = iconv("UTF-8", "windows-1251",  $db->RealEscape($_POST['about']));
                            $info =	iconv("UTF-8", "windows-1251",  $db->RealEscape($_POST['info']));

                            //$_SESSION['job_add_message']['message'] =  "Ваше задание успешно добавлено!";
                            //$_SESSION['job_add_message']['class'] = "green-text";
                            $jid = $_POST['update_job'];

                            $tmp_data = $db->FetchArray($db->Query("SELECT * FROM db_jobs WHERE id = '$jid'"));
                            $old_time = $tmp_data['time'];

                            $db->Query("UPDATE `db_jobs` SET `user`='$usid', `done`=0, `accept`=-1, `name`='$name', `url`='$url', `about`='$about', `info`='$info',`category`='$category',`period`='$period', `time_to_job`='$time_to_job', `pay`='$pay', `time`='".$old_time."',`comment`=' ' WHERE `id`='$jid' ");

                            header("Location: /account/jobs/management/".$jid);
                            exit;

                        } else {
                            $_SESSION['job_add_message']['message'] = "Задание можно добавлять раз в 3 минуты!";
                            $_SESSION['job_add_message']['class'] = "red-text";
                        }
                    } else {
                        $_SESSION['job_add_message']['message'] = "Оплата за выполнение указана неверно!";
                        $_SESSION['job_add_message']['class'] = "red-text";
                    }
                } else{
                    $_SESSION['job_add_message']['message'] = "Информация для выполнения указано неверно!";
                    $_SESSION['job_add_message']['class'] = "red-text";
                }
            } else{
                $_SESSION['job_add_message']['message'] = "Описание указано неверно!";
                $_SESSION['job_add_message']['class'] = "red-text";
            }
        } else{
            $_SESSION['job_add_message']['message'] = "Категория указана неверно!";
            $_SESSION['job_add_message']['class'] = "red-text";
        }
    } else{
        $_SESSION['job_add_message']['message'] = "Заголовок указан неверно!";
        $_SESSION['job_add_message']['class'] = "red-text";
    }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;

}


if(isset($_POST['swap'])) {

    $name = iconv("UTF-8", "windows-1251",  $_POST['name']);

    if(preg_match('/^[а-яa-zA-ZА-Я0-9.!,\s]{4,180}$/s', $name)) {
        $db->Query("SELECT * FROM `db_jobs_category` WHERE `id` = '".intval($_POST['category'])."' ");
        if($db->NumRows() > 0) {
            if(strlen($_POST['about']) > 4 && strlen($_POST['about']) <= 1024) {
                if(strlen($_POST['info']) > 4 && strlen($_POST['info']) <= 1024) {
                        if($_POST['pay'] > 49 && $_POST['pay'] < $money) {
                            $db->Query("SELECT `time` FROM `db_jobs` WHERE `user` = '$uname' ORDER BY `id` DESC LIMIT 1 ");
                            if($db->FetchRow() < time() - 180 || $db->NumRows() == 0) {
                                # Сохраняем

                                $period = $_POST['period'];
                                $time_to_job = $_POST['time_to_job'];
                                $pay = $_POST['pay'];
                                $category = $_POST['category'];
                                $url = $db->RealEscape($_POST['url']);
                                $about = iconv("UTF-8", "windows-1251",  $db->RealEscape($_POST['about']));
                                $info =	iconv("UTF-8", "windows-1251",  $db->RealEscape($_POST['info']));



                                //$_SESSION['job_add_message']['message'] =  "Ваше задание успешно добавлено!";
                                //$_SESSION['job_add_message']['class'] = "green-text";

                                $db->Query("INSERT INTO `db_jobs`(`user`,`done`, `accept`, `name`,`url`,`about`,`info`,`category`,`period`, `time_to_job`, `pay`,`time`,`comment`) VALUES('$usid', 0, -1, '$name','$url','$about','$info','$category','$period', '$time_to_job', '$pay','".time()."',' ')");

                                header("Location: /account/jobs/management/".$db->LastInsert());
                                exit;

                            } else {
                                $_SESSION['job_add_message']['message'] = "Задание можно добавлять раз в 3 минуты!";
                                $_SESSION['job_add_message']['class'] = "red-text";
                            }
                        } else {
                            $_SESSION['job_add_message']['message'] = "Оплата за выполнение указана неверно!";
                            $_SESSION['job_add_message']['class'] = "red-text";
                        }
                } else{
                    $_SESSION['job_add_message']['message'] = "Информация для выполнения указано неверно!";
                    $_SESSION['job_add_message']['class'] = "red-text";
                }
            } else{
                $_SESSION['job_add_message']['message'] = "Описание указано неверно!";
                $_SESSION['job_add_message']['class'] = "red-text";
            }
        } else{
            $_SESSION['job_add_message']['message'] = "Категория указана неверно!";
            $_SESSION['job_add_message']['class'] = "red-text";
        }
    } else{
        $_SESSION['job_add_message']['message'] = "Заголовок указан неверно!";
        $_SESSION['job_add_message']['class'] = "red-text";
    }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;

}else {

    if(isset($_GET['job_id'])){
        $job_id = $_GET['job_id'];

        $db->Query("SELECT * FROM db_jobs WHERE id = '$job_id' LIMIT 1");
        $job_data = $db->FetchArray();
    }

    ?>

    <div class="text_right">
        <div class="text_pages_top"></div>
        <div class="text_pages_content">
            <div class="jobs_header_menu">
                <a href="/account/jobs" class="small_blue_text">Список заданий</a> |
                <a href="/account/jobs/statistic/1" class="small_blue_text">Статистика</a> |
                <a href="/account/jobs/my/1" class="small_blue_text">Мои задания</a> |
                <a href="/account/jobs/add" class="small_blue_text">Добавить задание</a>
            </div>
            <div class="jobs_main_title">
                <?php
                    if(isset($job_id)) {
                        echo "Редактировать оплачиваемое задание №" . $job_id;
                    }else{
                        echo "Добавить оплачиваемое задание";
                    }
                ?>
            </div>

            <div class="jobs_wrapper">

                <form accept-charset="UTF-8" action="" method="post">
                    <table width="99%" border="0" align="center">
                        <tr class="jobs_add_tr">
                            <td width="45%">Заголовок задания:</td>
                            <td width="55%">
                                <input type="text" name="name" value="<?php if(isset($job_id)) { echo $job_data['name']; } ?>" style="width: 100%;"/>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td>Категория задания:</td>
                            <td>
                                <select name="category" class="job_add_select">
                                    <?php
                                    $db->Query("SELECT * FROM `db_jobs_category` ");
                                    while ($job = $db->FetchArray()) {
                                        if(isset($job_id)) {
                                            if($job['id'] == $job_data['category']){
                                                echo '<option value="' . $job['id'] . '" selected>' . $job['name'] . '</option>';
                                            }else{
                                                echo '<option value="' . $job['id'] . '">' . $job['name'] . '</option>';
                                            }
                                        }else{
                                            echo '<option value="' . $job['id'] . '">' . $job['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select><br>
                                <span class="job_add_small_text">
                                    Если Вы неправильно выберете раздел - <strong>Штраф 1.00 руб.</strong>
                                </span>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td colspan="2">
                                <p>Описание задания: </p>
                                <textarea name="about" style="width: 100%; height: 100px;"/><?php if(isset($job_id)) { echo htmlspecialchars_decode($job_data['about']); } ?></textarea>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td>URL (с http://):</td>
                            <td>
                                <input type="text" name="url" value="<?php if(isset($job_id)) { echo $job_data['url']; }else{ echo "http://"; } ?>" style="width: 100%;"/>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td>Время на выполнение</td>
                            <td>
                                <select name="time_to_job" class="job_add_select">
                                    <?php

                                        foreach ($config->time_to_job_words as $key=>$value){
                                            if(isset($job_id)) {
                                                if($key == $job_data['time_to_job']){
                                                    echo '<option value="'.$key.'" selected>'.$value.'</option>';
                                                }else{
                                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                                }
                                            }else{
                                                echo '<option value="'.$key.'">'.$value.'</option>';
                                            }
                                        }

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td>Повтор каждые ХХ ч. :</td>
                            <td>
                                <select name="period" class="job_add_select">
                                    <?php

                                    foreach ($config->job_period as $key=>$value){
                                        if(isset($job_id)) {
                                            if($key == $job_data['period']){
                                                echo '<option value="'.$key.'" selected>'.$value.'</option>';
                                            }else{
                                                echo '<option value="'.$key.'">'.$value.'</option>';
                                            }
                                        }else{
                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                                    }

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td>Оплата исполнителю:</td>
                            <td>
                                <input type="text" name="pay" value="<?php if(isset($job_id)) { echo $job_data['pay']; }?>" />
                                <span class="job_add_small_text">
                                    (минимум 50 монет)
                                </span>
                            </td>
                        </tr>
                        <tr class="jobs_add_tr">
                            <td colspan="2">
                                <p>Условия проверки выполнения задания (что должен указать пользователь): </p>
                                <textarea name="info" style="width: 100%; height: 100px;"/><?php if(isset($job_id)) { echo htmlspecialchars_decode($job_data['info']); }?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <?php
                                if(isset($job_id)) {
                                    echo '<input type="hidden" name="update_job" value="'.$job_data['id'].'"> ';
                                }
                            ?>
                            <td colspan="2" align="center">
                                <input type="submit" name="swap" value="<?php if(isset($job_id)) { echo "Редактировать задание"; }else{ echo "Добавить задание"; }?>"
                                       style="height: 30px; margin-top:10px;"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="text_pages_bottom"></div>
    </div>
    <?php
}
?>