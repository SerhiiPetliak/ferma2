<?php
header("Content-Type: text/html; charset=windows-1251");
$usid = $_SESSION['user_id'];

$status = $_GET['sec'];
$proccess = 0;

if (!empty($_SESSION['jobs_statistic_message'])) {
	echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['jobs_statistic_message']['class'] . '">'
		. $_SESSION['jobs_statistic_message']['message'] .
		'</div>';
	echo '<center><a href="/account/jobs/statistic">Назад</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
	unset($_SESSION['jobs_statistic_message']);
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

switch ($status){
	case 1:
		$proccess = 4;
		break;
	case 2:
		$proccess = 0;
		break;
	case 3:
		$proccess = 3;
		break;
	case 4:
		$proccess = 2;
		break;
}

$data = $db->FetchArrayAll($db->Query("SELECT * FROM `db_jobs_use` 
											  	LEFT JOIN `db_jobs`
											  	ON `db_jobs_use`.`job_id`=`db_jobs`.`id` 
												WHERE `user_id`='$usid' 
												AND `status`='$proccess' "));
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
			<div>
				<h1 class="text-center">Статистика</h1>
				<div class="text-center mb20">
					<a href="/account/jobs/statistic/1" class="jobs_sort_button <?php echo ($status == 1 ? "active_sort_button" : ""); ?>">Выполненые</a>
					<a href="/account/jobs/statistic/2" class="jobs_sort_button <?php echo ($status == 2 ? "active_sort_button" : ""); ?>">Начал выполнение</a>
					<a href="/account/jobs/statistic/3" class="jobs_sort_button <?php echo ($status == 3 ? "active_sort_button" : ""); ?>">Отклоненные</a>
					<a href="/account/jobs/statistic/4" class="jobs_sort_button <?php echo ($status == 4 ? "active_sort_button" : ""); ?>">На доработку</a>
				</div>

			</div>

			<div class="jobs_statistic_wrap">
				<?php
					if(count($data) == 0){
						echo "<p class='text-center'> Заданий по данному параметру не найдено!</p>";
					}else {
						foreach ($data as $item) {
							switch ($status){
								case 1:
									echo '<div class="jobs_comment_item">
												<ul>
													<li class="jobs_normal_text bold_text">
														Задание №'.$item['job_id'].'
													</li>
													<li class="jobs_normal_text green-text">														
														Выполнено и оплачено.													
													</li>
													<li class="jobs_normal_text bold_text">														
														На Ваш счет зачислено -	'.calculate_sum($item['pay']).' монет													
													</li>
												</ul>
											</div>';
									break;
								case 2:
									$time_shift = $config->time_to_job[$item['time_to_job']] - (time() - $item['start_time']);
									$time = new DateTime('@'.$time_shift);
									$time_left = $time->format('H:i:s');
									echo '<div class="jobs_comment_item">
												<ul>
													<li class="jobs_normal_text bold_text">
														Задание №'.$item['job_id'].'
													</li>
													<li class="jobs_normal_text green-text">														
														Выполняется.													
													</li>
													<li class="jobs_normal_text bold_text">														
														Осталось времени - '.$time_left.' 													
													</li>
												</ul>
											</div>';
									break;
								case 3:
									echo '<div class="jobs_comment_item">
												<ul>
													<li class="jobs_normal_text bold_text">
														Задание №'.$item['job_id'].'
													</li>
													<li class="jobs_normal_text red-text">														
														Отклонено!													
													</li>
													<li class="jobs_normal_text bold_text">														
														Причина:													
													</li>
													<li class="jobs_normal_text">														
														'.$item['comment_admin'].'													
													</li>
												</ul>
											</div>';
									break;
								case 4:
									echo '<div class="jobs_comment_item">
												<ul>
													<li class="jobs_normal_text bold_text">
														Задание №'.$item['job_id'].'
													</li>
													<li class="jobs_normal_text red-text">														
														Отправлено на доработку!													
													</li>
													<li class="jobs_normal_text bold_text">														
														Причина:													
													</li>
													<li class="jobs_normal_text">														
														'.$item['comment_admin'].'													
													</li>
													<li class="jobs_normal_text">
														<a href="/account/jobs/show/'.$item['id'].'" class="jobs_sort_button">Продолжить выполнение задания</a>
													</li>
												</ul>
											</div>';
									break;
							}
						}
					}
				?>
			</div>
		</div>
	</div>
	<div class="text_pages_bottom"></div>
</div>