<?php
header("Content-Type: text/html; charset=windows-1251");

$usid = $_SESSION["user_id"];

if (!empty($_SESSION['jobs_my_message'])) {
	echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['jobs_my_message']['class'] . '">'
		. $_SESSION['jobs_my_message']['message'] .
		'</div>';
	echo '<center><a href="/account/jobs/my">Назад</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
	unset($_SESSION['jobs_my_message']);
	exit();
}

if(isset($_GET['sec'])){
	$status = $_GET['sec'];
}else{
	$status = 1;
}

if($status == 1){
	$user_jobs = $db->FetchArrayAll($db->Query("SELECT `db_jobs`.`id`, `db_jobs`.`done`, `db_jobs`.`accept`, `db_jobs`.`user`, 
													`db_jobs`.`time`, `db_jobs`.`name`, `db_jobs`.`url`, `db_jobs`.`about`, 
													`db_jobs`.`info`, `db_jobs`.`category`, `db_jobs`.`period`, `db_jobs`.`time_to_job`, 
													`db_jobs`.`pay`, `db_jobs_category`.`name` as `cat_name`
													 FROM `db_jobs` 
													 LEFT JOIN `db_jobs_category` 
													 ON `db_jobs`.`category`=`db_jobs_category`.`id` 
													 WHERE `user`='$usid' "));
}else{
	$user_jobs = $db->FetchArrayAll($db->Query("SELECT `db_jobs`.`id`, `db_jobs`.`done`, `db_jobs`.`accept`, `db_jobs`.`user`, 
													`db_jobs`.`time`, `db_jobs`.`name`, `db_jobs`.`url`, `db_jobs`.`about`, 
													`db_jobs`.`info`, `db_jobs`.`category`, `db_jobs`.`period`, `db_jobs`.`time_to_job`, `comment`,
													`db_jobs`.`pay`, `db_jobs_category`.`name` as `cat_name`
													 FROM `db_jobs` 
													 LEFT JOIN `db_jobs_category` 
													 ON `db_jobs`.`category`=`db_jobs_category`.`id` 
													 WHERE `db_jobs`.`accept`='2' AND `db_jobs`.`user`='$usid' "));
}


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
				Ваши задания
			</div>
			<div class="text-center mb20">
				<a href="/account/jobs/my/1" class="jobs_sort_button <?php echo ($status == 1 ? "active_sort_button" : ""); ?>">Размещенные</a>
				<a href="/account/jobs/my/2" class="jobs_sort_button <?php echo ($status == 2 ? "active_sort_button" : ""); ?>">Отменены админом</a>
			</div>
				<?php

					if(count($user_jobs) == 0) {
						echo 'У Вас еще нет заданий!';
					}else {
						foreach ($user_jobs as $item) {
				?>

							<div class="jobs_jlist_item">
								<div class="jobs_item_left">
									<ul class="jobs_normal_text">
										<li class="normal_blue-text">
											<a href="/account/jobs/management/<?php echo $item['id']; ?>">
												<?php echo $item['name']; ?>
											</a>
										</li>
										<li>
											<?php echo $item['url']; ?>
										</li>
										<li class="small_blue_text">
											<?php echo $item['id'] . " - " . $item['cat_name']; ?>
										</li>
										<?php

										if($status == 2){
											echo '
												<li class="small_blue_text">
													Причина отказа:
												</li>
												<li class="small_blue_text">
													'.$item['comment'].'
												</li>
												<li class="small_blue_text">
													<a href="/account/jobs/edit/'.$item['id'].'" class="jobs_sort_button">Редактировать задание</a>
												</li>
											';
										}

										?>
									</ul>
								</div>
								<div class="jobs_item_right tar">
									<!--<div class="normal_blue-text mb10">
										<?php

											/*$sum = "";

											if ($item['pay'] > 0 && $item['pay'] < 6) {
												$sum = $item['pay'] - $item['pay'] * 30 / 100;
											}
											if ($item['pay'] > 5 && $item['pay'] < 11) {
												$sum = $item['pay'] - $item['pay'] * 25 / 100;
											}
											if ($item['pay'] > 10) {
												$sum = $item['pay'] - $item['pay'] * 20 / 100;
											}

											$sum = $item['pay'] . "руб";

											echo $sum;*/


										?>
									</div>-->
								</div>
								<div class="clearfix"></div>
							</div>
			<?php
					}
				}
			?>

			</div>

		</div>
	<div class="text_pages_bottom"></div>
</div>
