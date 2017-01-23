
<?php
header("Content-Type: text/html; charset=windows-1251");

$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid'");
$user_data = $db->FetchArray();

if (!empty($_SESSION['job_management_message'])) {
    echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['job_management_message']['class'] . '">'
        . $_SESSION['job_management_message']['message'] .
        '</div>';
    echo '<center><a href="/account/jobs/management/'.$job_id.'">�����</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
    unset($_SESSION['job_management_message']);
    exit();
}


/*
 * ����������� ���-������
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

/*
 * �������� �������
 */
if(isset($_GET['delete_job'])){
    $jid = $_GET['delete_job'];

    $db->Query("SELECT * FROM `db_jobs` WHERE `id`= '$jid'");
    $job_data = $db->FetchArray();


    echo '<div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content">
                <div class="jobs_wrapper">
                    <div class="jobs_main_title">
                        �������� ������� �'.$jid.'
                    </div>';
                     if($job_data['reserved_balance'] > 0 ){
                         echo '<div class="jobs_message_title red-text">
                                     ��������� �� ����� � ��������� ����� ������������ �������� ����������!
                               </div>
                        <center><a href="/account/jobs/management/'.$jid.'">��������� � �������� �������</a></center>';
                     }else{
                        $balance = $job_data['balance'];
                        $db->Query("DELETE FROM `db_jobs` WHERE `id`= '$jid'");
                        $db->Query("UPDATE db_users_b SET `money_b` = `money_b` + '".$balance."' WHERE id = '".$_SESSION['user_id']."'");

                         header("Location: /account/jobs");
                         exit;
                     }
            echo '</div>
            </div>
            <div class="text_pages_bottom"></div>
         </div>';

    exit();
}

/*
 * ���������� �������
 */
if(isset($_POST['job_decline'])){
    $jid = $_POST['job_decline'];
    $usid = $_POST['user_id'];
    $reason = iconv("UTF-8", "windows-1251", $db->RealEscape(htmlspecialchars($_POST['cansel_reason'])));

    $db->Query("UPDATE `db_users_a` SET `jobs_decline` = `jobs_decline`+1 WHERE `id`='$usid' ");

    $db->Query("UPDATE `db_jobs_use` SET `status`='3', `comment_admin`='$reason' WHERE `user_id`='$usid' AND `job_id`='$jid' ");
    $db->Query("UPDATE `db_jobs` SET  `balance`=`balance` + `pay`, `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid' ");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * �������� �� ���������
 */
if(isset($_POST['job_rework'])){
    $jid = $_POST['job_rework'];
    $usid = $_POST['user_id'];
    $reason = iconv("UTF-8", "windows-1251", $db->RealEscape(htmlspecialchars($_POST['rework_reason'])));

    $db->Query("UPDATE `db_jobs_use` SET `status`='2', `comment_admin`='$reason',`finish_time`='0' WHERE `user_id`='$usid' AND `job_id`='$jid' ");
    $db->Query("UPDATE `db_jobs` SET  `balance`=`balance` + `pay`, `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid' ");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * �������� ��������� ����� ������
 */
if(isset($_POST['jobs_once_up'])){
    $jid = $_POST['jobs_once_up'];

    if($_POST['once_up_score'] == 0){

        if($user_data['money_b'] >= 100) {
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "' WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_b` = `money_b` - 100 WHERE id = '" . $_SESSION['user_id'] . "'");
        }
    }else{

        if($user_data['money_p'] >= 100) {
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "' WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_p` = `money_p` - 100 WHERE id = '" . $_SESSION['user_id'] . "'");
        }
    }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;

}

/*
 * ��������� ������
 */
if(isset($_POST['job_accept'])){
    $user_id = $_POST['user_id'];
    $jid = $_POST['job_accept'];

    $db->Query("UPDATE `db_users_a` SET `jobs_accept` = `jobs_accept`+1 WHERE `id`='$usid' ");

    $price = $db->FetchArray($db->Query("SELECT `pay` FROM `db_jobs` WHERE `id`='$jid'"));

    if ($price['pay'] > 0 && $price['pay'] < 6) {                               // �������� � ������������ ��������
        $pay_user = $price['pay'] - $price['pay'] * 30 / 100;
    }
    if ($price['pay'] > 5 && $price['pay'] < 11) {
        $pay_user = $price['pay'] - $price['pay'] * 25 / 100;
    }
    if ($price['pay'] > 10) {
        $pay_user = $price['pay'] - $price['pay'] * 20 / 100;
    }

    $pay_user_b = number_format($pay_user - (($pay_user * 30) / 100), 2); // ������ ������������ �� ������ ��� �������
    $pay_user_p = $pay_user - $pay_user_b; // ������ ������������ �� ������ ��� ������
    $pay_user_ref = $pay_user * 0.05; // ������ ��������

    //���������� ����� �� �������� ������������
    $db->query("UPDATE db_users_b SET `money_b` = `money_b` + '".$pay_user_b."', `money_p` = `money_p` + '".$pay_user_p."', `to_referer` = `to_referer` + '".$pay_user_ref."'	WHERE id = '".$user_id."'");

    //���������� ����� �� �������� ��������
    $db->Query("SELECT referer_id FROM db_users_a WHERE id = '".$user_id."'");
    $user_info = $db->FetchArray();
    $db->query("UPDATE db_users_b SET `money_b` = `money_b` + '".$pay_user_ref."'	WHERE id = '".$user_info['referer_id']."'");

    //����������� ������, ������� ������
    $db->Query("UPDATE `db_jobs_use` SET `status`='4' WHERE `user_id`='$user_id' AND `job_id`='$jid'");
    $db->Query("UPDATE `db_jobs` SET `reserved_balance`=`reserved_balance` - `pay` WHERE `id`='$jid'");
    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * ��������� ��������� ����� ������
 */
if(isset($_POST['jobs_auto_up'])){
    $jid = $_POST['jobs_auto_up'];
    $up_period = $_POST['up_period'];

    if($_POST['auto_up_score'] == 0){

        if($user_data['money_b'] >= 100) {
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "', `auto_up`='$up_period', `auto_up_balance`=0 WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_b` = `money_b` - 100 WHERE id = '" . $_SESSION['user_id'] . "'");
        }
    }else{

        if($user_data['money_p'] >= 100) {
            $db->Query("UPDATE `db_jobs` SET `time`='" . time() . "', `auto_up`='$up_period', `auto_up_balance`=0 WHERE `id`= '$jid'");
            $db->Query("UPDATE db_users_b SET `money_p` = `money_p` - 100 WHERE id = '" . $_SESSION['user_id'] . "'");
        }
    }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;

}

/*
 * ���������� �� ��������
 */
if(isset($_POST['need_check'])){
    $job_id = $_POST['need_check'];
    $db->Query("UPDATE `db_jobs` SET `accept`='9' WHERE `id`= '$job_id'");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * ��������� ����
 */
if(isset($_POST['jobs_pay_submit'])){

   $job_id = $_POST['jobs_pay_submit'];
   $summ = $_POST['jobs_pay_summ'];

   if($_POST['score'] == 0){
       $db->Query("UPDATE `db_jobs` SET `balance`=`balance` + '$summ' WHERE `id`= '$job_id'");
       $db->Query("UPDATE db_users_b SET `money_b` = `money_b` - '".$summ."' WHERE id = '".$_SESSION['user_id']."'");
   }else{
       $db->Query("UPDATE `db_jobs` SET `balance`=`balance` + '$summ' WHERE `id`= '$job_id'");
       $db->Query("UPDATE db_users_b SET `money_p` = `money_p` - '".$summ."' WHERE id = '".$_SESSION['user_id']."'");
   }

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * ������ �� �����
 */
if(isset($_POST['pause'])){
    $job_id = $_POST['pause'];
    $db->Query("UPDATE `db_jobs` SET `done`=-1 WHERE `id`= '$job_id'");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

/*
 * ������ �� �����
 */
if(isset($_POST['pause_stop'])){
    $job_id = $_POST['pause_stop'];
    $db->Query("UPDATE `db_jobs` SET `done`=0 WHERE `id`= '$job_id'");

    header("Location: ".$_SERVER["REQUEST_URI"]);
    exit;
}

$job_id = $_GET['job_id'];
$job_status = "";

$jobs_ids_list = $db->FetchArrayAll($db->Query("SELECT `id` FROM `db_jobs` WHERE `done` = '0' AND `accept`='1' AND `balance`>'0' ORDER BY `time` DESC")); //���������� ����� � ������

$job_number_in_list = array_search($job_id, array_column($jobs_ids_list, 'id')) + 1;                   //���������� ����� � ������

$db->Query("SELECT `db_jobs`.`id`, `db_jobs`.`done`, `db_jobs`.`accept`, `db_jobs`.`user`, 
									`db_jobs`.`time`, `db_jobs`.`name`, `db_jobs`.`url`, `db_jobs`.`about`, 
									`db_jobs`.`info`, `db_jobs`.`category`, `db_jobs`.`period`, `db_jobs`.`time_to_job`, 
									`db_jobs`.`pay`, `db_jobs`.`balance`, `db_jobs`.`reserved_balance`,
									`db_jobs_category`.`name` as `cat_name`,
									`db_users_a`.`user` as `user_name`,
									`db_users_a`.`avatar` as `user_img`
								FROM `db_jobs`
								LEFT JOIN `db_jobs_category` 
								  ON db_jobs.category=db_jobs_category.id
								LEFT JOIN `db_users_a` 
								  ON db_jobs.user=db_users_a.id
								WHERE `db_jobs`.`id` = '$job_id'");

$job_info = $db->FetchArray();

if($job_info['accept'] == -1){
    $job_status = "need_moderate";
}
if($job_info['accept'] == 9){
    $job_status = "in_moderate";
}
if(($job_info['balance'] == 0 && $job_info['accept'] == 0) ){
    $job_status = "need_pay";
}
if($job_info['accept'] == 2){
    $job_status = "declined";
}
if($job_info['done'] == -1){
    $job_status = "paused";
}

$sum = $job_info['balance'];

$jid = $job_info['id'];
$jobs_statistics_in_work = $db->FetchArray($db->Query("SELECT count(*) FROM `db_jobs_use` WHERE `status`=0 AND `job_id`='$jid'"));
$jobs_statistics_wait = $db->FetchArray($db->Query("SELECT count(*) FROM `db_jobs_use` WHERE `status`=4 AND `job_id`='$jid'"));
$jobs_statistics_rework = $db->FetchArray($db->Query("SELECT count(*) FROM `db_jobs_use` WHERE `status`=2 AND `job_id`='$jid'"));

$jobs_need_check = $db->FetchArrayAll($db->Query("SELECT j.id, j.start_time, j.finish_time, j.user_id, j.user_ip, j.comment_user, j.status, j.job_id, u.user 
                                                          FROM `db_jobs_use` j 
                                                          LEFT JOIN `db_users_a` u 
                                                          ON j.user_id=u.`id`
                                                          WHERE j.`status`='1' AND j.job_id='$jid'"));

?>

    <div class="text_right">
        <div class="text_pages_top"></div>
        <div class="text_pages_content">
            <div class="jobs_wrapper">
                <div class="jobs_header_menu">
                    <a href="/account/jobs" class="small_blue_text">������ �������</a> |
                    <a href="/account/jobs/statistic/1" class="small_blue_text">����������</a> |
                    <a href="/account/jobs/my/1" class="small_blue_text">��� �������</a> |
                    <a href="/account/jobs/add" class="small_blue_text">�������� �������</a>
                </div>
                <div class="jobs_main_title">
                    ���������� ��������
                </div>
                <div class="jobs_management_mblock">
                    <div class="jobs_management_left">
                        <div>
                            <ul>
                                <li class="medium_red_text jobs_normal_text">
                                    <?php
                                        switch ($job_status){
                                            case "in_moderate":
                                                echo "������� �� ���������.";
                                                break;
                                            case "declined":
                                                echo "������� ��������� ���������������!";
                                                break;
                                            case "need_moderate":
                                                echo "������� �� �������. ��������� ��������.";
                                                break;
                                            case "need_pay":
                                                echo "������� �� �������. ��������� ������ �������.";
                                                break;
                                            case "paused":
                                                echo "<span class='orange_text'>������� �� �������. �� �����. [</span>
                                                        <form method='post' style='display: inline;'>
                                                             <input type='hidden' name='pause_stop' value='".$job_info['id']."'>
                                                             <input type='submit' class='custom_submit dark_blue_text' value='���������'>
                                                        </form>
                                                      <span class='orange_text'>]</span>";
                                                break;
                                            default:
                                                echo "<span class='dark-green_text'>������� �������. [</span>
                                                         <form method='post' style='display: inline;'>
                                                             <input type='hidden' name='pause' value='".$job_info['id']."'>
                                                             <input type='submit' class='custom_submit dark_blue_text' value='�����'>
                                                             </form>
                                                     <span class='dark-green_text'>]</span>";
                                                break;
                                        }
                                    ?>
                                </li>
                                <li class="small_blue_text jobs_normal_text">
                                    <div class="not_long_text">
                                        <?php echo $job_info['name']; ?>
                                    </div>
                                </li>
                                <li class="small_blue_text jobs_normal_text text-12">
                                    <span>� <?php echo $job_info['id']; ?></span>
                                    <span>���� �������: <?php echo $job_info['pay']; ?> �����.</span>
                                    <span>��������������:
                                        <?php
                                            echo calculate_sum($job_info['pay']);
                                        ?>
                                        �����
                                    </span>
                                    <span>
                                        ����� � ������: <?php echo $job_number_in_list; ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="jobs_management_left_lbuttons">
                                <div class="jobs_management_left_lbuttons_buttons l_gray_button" title="���������� �������� �������">
                                    <?php echo $jobs_statistics_in_work[0]; ?>
                                </div>
                                <div class="jobs_management_left_lbuttons_buttons l_green_button" title="���������� �������������� ������">
                                    <?php echo $jobs_statistics_wait[0]; ?>
                                </div>
                                <div class="jobs_management_left_lbuttons_buttons l_red_button" title="���������� ����������� ������">
                                    <?php echo $jobs_statistics_rework[0]; ?>
                                </div>
                                <div class="jobs_management_left_lbuttons_buttons l_blue_button" title="���������� ��������� ����������">
                                    <?php
                                        if($job_info['balance'] == 0) {
                                            echo 0;
                                        }else {
                                            echo $job_info['balance'] / $job_info['pay'];
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="jobs_management_left_rbuttons">
                                <a href="#" class="jobs_management_up_button"><img src="/style/img/up_arrow.png" alt=""></a>
                                <a href="/account/jobs/edit/<?php echo $job_info['id']; ?>"><img src="/style/img/edit-trans.png" alt=""></a>
                                <a href="/account/jobs/delete/<?php echo $job_info['id']; ?>" onclick="return confirm('�� ����� ������ ������� ��� �������?') ? true : false;"><img src="/style/img/cross.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="jobs_management_right small_blue_text">
                        <?php
                            if($job_status == "need_moderate") {
                                echo '
                                    <form action="" method="post">
                                    <input type="hidden" name="need_check" value="'.$job_info['id'].'">
                                        <button type="submit" class="need_moderate_submit">
                                            <span class="transport-moder" title="��������� ������� �� ��������">
                                                ���������<br>�� ��������
                                            </span>
                                        </button>                                    
                                    </form>
                                ';
                            }else if($job_status == "need_pay"){
                                echo '
                                    <span class="add-budgetnone need_pay_init" title="��������� ��������� ������">
                                        <span style="font-size: 11px">'.$sum.'<br>���������</span>
                                    </span>
                                ';
                            }else{
                                echo '
                                    <span class="add-budgetnone need_pay_init" title="��������� ��������� ������">
                                        <span style="font-size: 11px">'.$sum.'<br>���������</span>
                                    </span>
                                ';
                            }
                        ?>
                    </div>
                </div>
                <div class="jobs_management_up text-center">
                    <h1 class="black_text">������� ������� ����� ������</h1>
                    <div class="jobs_management_pay_form_div">
                        <span class="small_blue_text red-text">������� ������� ����� ������ ����� 100 �����!</span>
                        <form action="" method="post">
                            <span class="">����������� ��������:</span>
                            <input type="hidden" name="jobs_once_up" value="<?php echo $job_info['id']; ?>">
                            <div>
                                <label for="jobs_pay_summ"><strong class="small_blue_text dark-green_text">����: </strong></label>
                                <select name="once_up_score" class="score_select" id="">
                                    <option value="0">���� ��� �������</option>
                                    <option value="1">���� ��� ������</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="�������">
                            </div>
                        </form>
                        <hr>
                        <form action="" method="post">
                            <span class="">������������ �������������� ��������:</span>
                            <input type="hidden" name="jobs_auto_up" value="<?php echo $job_info['id']; ?>">
                            <div>
                                <label for="jobs_pay_summ"><strong class="small_blue_text dark-green_text">������� ��� �: </strong></label>
                                <select name="up_period" class="score_select" id="">
                                    <option value="0">10 �����</option>
                                    <option value="1">30 �����</option>
                                    <option value="2">1 ���</option>
                                    <option value="3">3 ����</option>
                                    <option value="4">6 �����</option>
                                    <option value="5">12 �����</option>
                                    <option value="6">24 �����</option>
                                </select>
                            </div>
                            <div>
                                <label for="jobs_pay_summ"><strong class="small_blue_text dark-green_text">����: </strong></label>
                                <select name="auto_up_score" class="score_select" id="">
                                    <option value="0">���� ��� �������</option>
                                    <option value="1">���� ��� ������</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" value="�������">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="jobs_management_pay text-center">
                    <h1 class="black_text">���������� ������� �������</h1>
                    <div class="jobs_management_pay_form_div">
                        <form action="" method="post">
                            <div>
                                <label for="jobs_pay_summ"><strong class="small_blue_text dark-green_text">�����: </strong></label>
                                <input id="jobs_pay_summ" name="jobs_pay_summ" class="jobs_pay_summ" type="text">
                                <span class="small_blue_text dark-green_text"><strong>�����.</strong></span>
                            </div>
                            <input type="hidden" name="jobs_pay_submit" value="<?php echo $job_info['id']; ?>">
                            <div>
                                <label for="jobs_pay_summ"><strong class="small_blue_text dark-green_text">����: </strong></label>
                                <select name="score" class="score_select" id="">
                                    <option value="0">���� ��� �������</option>
                                    <option value="1">���� ��� ������</option>
                                </select>
                            </div>
                            <div class="small_blue_text dark-green_text">
                                ����� ��������� ����������: <span class="number_attempts">0</span>
                            </div>
                            <div class="small_blue_text red-text pay_error">
                                ����������, �������� �����, ��� �� ���������� 10 ����������! ���� � ��� �� ����� ������������ �����.
                            </div>
                            <div>
                                <input type="submit" name="jobs_pay_submit_button" class="jobs_pay_submit" disabled="true" value="��������">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="jobs_management_notes">
                    <table>
                        <tr>
                            <td class="jobs_notes_img_td">
                                <img src="/style/img/up_arrow.png" alt="">
                            </td>
                            <td class="jobs_notes_td">
                                <p class="jobs_normal_text">
                                    ������� ������� � ������. ��� ���� �� ���������� �������, ��� ������ ����� ���������� �
                                    �������������� ����������! �������� ������� �������� 1 ��� � 10 �����. ��������� ������
                                    �������� - 1 ���. ����� �������� �������������� ��������.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="jobs_notes_img_td">
                                <img src="/style/img/edit-trans.png" alt="">
                            </td>
                            <td class="jobs_notes_td">
                                <p class="jobs_normal_text">
                                    ������������� �������.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="jobs_notes_img_td">
                                <img src="/style/img/cross.png" alt="">
                            </td>
                            <td class="jobs_notes_td">
                                <p class="jobs_normal_text">
                                    ������� �������. ��� �������� ������� �������� ������������ �� ������ �������������.
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="jobs_management_commission">
                    <ul>
                        <li>��� ������������� ����������� ����� 1 ����� - �������� ������� 30%</li>
                        <li>��� ������������� ����������� ����� 5 ������ - �������� ������� 25%</li>
                        <li>��� ������������� ����������� ����� 10 ������ - �������� ������� 20%</li>
                    </ul>
                </div>

                <div class="jobs_finish_wrap text-center">
                    <h1>������ � ����������:</h1>
                    <?php
                        if(count($jobs_need_check) == 0){
                            echo "����� ��� �� �������� ������ �������";
                        }else{
                            foreach ($jobs_need_check as $item) {
                    ?>
                                <div class="jobs_finish_item tal jobs_normal_text">
                                    <ul>
                                        <li class="jobs_check-li">
                                            �����
                                        </li>
                                        <li>
                                            <?php echo $item['user']; ?>
                                        </li>
                                        <li class="jobs_check-li">
                                            ���� � ����� ����������
                                        </li>
                                        <li>
                                            <?php echo date("d.m.Y H:i:s", $item['start_time']); ?>
                                        </li>
                                        <li class="jobs_check-li">
                                            IP � �������� �����������
                                        </li>
                                        <li>
                                            <?php echo $item['user_ip']; ?>
                                        </li>
                                        <li class="jobs_check-li">
                                            �� ������� ������� ��������
                                        </li>
                                        <li>
                                            <?php
                                                $time_shift = $item['finish_time'] - $item['start_time'];
                                                $time = new DateTime('@'.$time_shift);
                                                echo $time->format('H:i:s');
                                            ?>
                                        </li>
                                        <li class="jobs_check-li">
                                            ����������, ������� ������ ������������ � ���� ��� ��������:
                                        </li>
                                        <li>
                                            <p>
                                                <?php echo $item['comment_user']; ?>
                                            </p>
                                        </li>
                                        <li class="text-center">
                                            <form action="" method="post" class="di">
                                                <input type="hidden" name="job_accept" value="<?php echo $job_info['id']; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $item['user_id']; ?>">
                                                <input type="submit" class="button-blue jobs_show_button" value="��������">
                                            </form>
                                            <br>
                                        </li>
                                        <li class="text-center">
                                            <form accept-charset="UTF-8" action="" method="post" class="di">
                                                <input type="hidden" name="job_decline" value="<?php echo $job_info['id']; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $item['user_id']; ?>">
                                                <textarea name="cansel_reason" id="" cols="30" class="cansel_reason_textarea"
                                                          rows="10" required>������� ���������� ��� ���������</textarea><br>
                                                <input type="submit" class="jobs_cansel_button" value="���������">
                                            </form>
                                            <form accept-charset="UTF-8" action="" method="post" class="di">
                                                <input type="hidden" name="job_rework" value="<?php echo $job_info['id']; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $item['user_id']; ?>">
                                                <input type="hidden" class="rework_reason" name="rework_reason">
                                                <input type="submit" class="jobs_cansel_button" value="��������� �� ���������">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                    <?php
                            }
                        }
                    ?>
                </div>

            </div>
        </div>
        <div class="text_pages_bottom"></div>
    </div>

<script>
    $(document).ready(function(){

        $(".cansel_reason_textarea").change(function(){
            $(".rework_reason").val($(".cansel_reason_textarea").val());
        });

        $(".jobs_management_up_button").click(function(){
            $(".jobs_management_up").css("display", "block");
        });

        var summ = <?php echo $job_info['pay']; ?>,
            balance_b = <?php echo $user_data['money_b']; ?>,
            balance_p = <?php echo $user_data['money_p']; ?>;

        $(".need_pay_init").click(function(){
            $(".jobs_management_pay").css("display", "block");
        });

        $(".jobs_pay_summ").click(function(){

            pay_calc("start");
        });

        $(".jobs_pay_summ").change(function(){
            pay_calc("stop");
            var pay = $(this).val() / summ;
           $(".number_attempts").text(pay);
        });

        function pay_calc(param){

            if(param == "start"){
                var myTimer = setInterval(function(){
                    var sum_pay = $(".jobs_pay_summ").val();
                    var pay = sum_pay / summ;
                    $(".number_attempts").text(pay);

                    var sel_val = $(".score_select").val();

                    if(pay < 10){
                        $(".pay_error").css("display", "block");
                        $(".jobs_pay_submit").attr("disabled", "true");
                    }else{
                        if((sel_val == 0 && balance_b < sum_pay) || (sel_val == 1 && balance_p < sum_pay)){
                            $(".pay_error").css("display", "block");
                            $(".jobs_pay_submit").attr("disabled", "true");
                        }else{
                            $(".pay_error").css("display", "none");
                            $(".jobs_pay_submit").removeAttr("disabled");
                        }
                    }
                }, 500);
            }else{
                clearInterval(myTimer);
            }
        }
    });
</script>
