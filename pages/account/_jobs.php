<?php
header("Content-Type: text/html; charset=windows-1251");

$usid = $_SESSION["user_id"];

if (!empty($_SESSION['jobs_message'])) {
	echo '
        <div class="text_right">
            <div class="text_pages_top"></div>
            <div class="text_pages_content"> 
                <div class="jobs_message_title ' . $_SESSION['jobs_message']['class'] . '">'
		. $_SESSION['jobs_message']['message'] .
		'</div>';
	echo '<center><a href="/account/jobs/">Назад</a></center><br></div>
            <div class="text_pages_bottom"></div>            
        </div>';
	unset($_SESSION['jobs_message']);
	exit();
}

function percent($sum){
	if ($sum > 0 && $sum < 6) {
		$money = $sum - $sum * 30 / 100;
	}
	if ($sum > 5 && $sum < 11) {
		$money = $sum - $sum * 25 / 100;
	}
	if ($sum > 10) {
		$money = $sum - $sum * 20 / 100;
	}
	return $money;
}

/*
 * Калькулятор руб-монеты
 */
$db->Query("SELECT * FROM `db_config` WHERE `id` = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
function calculate_sum($sum, $coef){
	return $sum * $coef;
}

if(isset($_POST['add_job_to_favorite'])){
	$add_type = $_POST['add_job_to_favorite'];
	$jid = $_POST['job_id'];

	if($add_type == 1){
		$db->Query("SELECT COUNT(*) FROM `db_jobs_favorite` WHERE `user_id`='$usid' AND `job_id`='$jid'");
		$jobs_count = $db->FetchRow();

		if($jobs_count > 0){
		}else{
			$db->Query("INSERT INTO `db_jobs_favorite` (`job_id`, `user_id`) VALUES ('$jid', '$usid') ");
		}

	}else{
		$db->Query("SELECT COUNT(*) FROM `db_jobs_hidden` WHERE `user_id`='$usid' AND `job_id`='$jid'");
		$jobs_count = $db->FetchRow();

		if($jobs_count > 0){
		}else{
			$db->Query("INSERT INTO `db_jobs_hidden` (`job_id`, `user_id`) VALUES ('$jid', '$usid') ");
		}

	}

	header("Location: ".$_SERVER["REQUEST_URI"]);
	exit;

}

/*
 * Инициализируем данные для сортировки и фильтрации
 */

$filter = 0;
$sorting = 0;

if(isset($_GET['a']) && $_GET['a'] > 0){ // Автор
	$author_id = $_GET['a'];
}else{
	$author_id = 0;
}

if(isset($_GET['p'])){	// Номер текущей страницы
	$jobs_page = $_GET['p'];

	if(($jobs_page - 1) == 0){
		$limit_params = "LIMIT 0, 10";
	}else{
		$limit_params = "LIMIT ".(($jobs_page - 1) * 10).",".(($jobs_page - 1) * 10 + 10);
	}
}else{
	$jobs_page = 1;
	$limit_params = "";
}

if(isset($_GET['f'])){ // Фильтр
	$filter = $_GET['f'];
}

if(isset($_GET['s'])){ // Сортировка
	$sorting = $_GET['s'];
}


$search_rows = "`db_jobs`.`id`, `db_jobs`.`done`, `db_jobs`.`accept`, `db_jobs`.`user`, 
									`db_jobs`.`time`, `db_jobs`.`name`, `db_jobs`.`url`, `db_jobs`.`about`, 
									`db_jobs`.`info`, `db_jobs`.`category`, `db_jobs`.`period`, `db_jobs`.`time_to_job`, 
									`db_jobs`.`pay`, `db_jobs_category`.`name` as `cat_name`,
									`db_jobs_hidden`.`id` as `hidden_id`,
									`db_jobs_use`.`status` as `db_jobs_use_status`,
									`db_jobs_use`.`finish_time` as `db_jobs_finish_time`";

$order_by_params = "`db_jobs`.`time` DESC";
$where_params = "`db_jobs_hidden`.`id` IS NULL AND `db_jobs`.`done` = '0' AND `db_jobs`.`accept`='1' AND `db_jobs`.`balance`>'0'";

if(isset($_POST['jobs_sort_find'])){ // Если ищем по ИД

	$jid = $_POST['jobs_sort_find'];
	$where_params .=" AND `db_jobs`.`id`='".$jid."'";


}else{

	if($author_id > 0){
		$where_params .= " AND `user` = '".$author_id."'";
	}

	if($filter > 0){
		$where_params .= " AND `category` = '".$filter."'";
	}

	switch ($sorting){
		case 0:
			$where_params .= "";
			break;
		case 1:
			$where_params .= "AND `db_jobs_favorite`.`job_id` IS NOT NULL";
			break;
		case 2:
			$where_params .= "AND `period` > 0";
			break;
		case 3:
			$order_by_params = "`db_jobs`.`pay` DESC";
			break;
		case 4:
			$order_by_params = "`db_jobs`.`pay` ASC";
			break;
	}


}

/*
 * Формируем запрос и выполняем его
 */
/*$joblist_array = $db->FetchArrayAll($db->Query("SELECT 	".$search_rows."
														FROM `db_jobs` 
														LEFT JOIN `db_jobs_category` 
														ON `db_jobs`.`category`=`db_jobs_category`.`id` 
														LEFT JOIN `db_jobs_hidden` 
														ON `db_jobs`.`id`=`db_jobs_hidden`.`job_id`	AND `db_jobs_hidden`.`user_id`='$usid'	
														LEFT JOIN `db_jobs_favorite` 
														ON `db_jobs`.`id`=`db_jobs_favorite`.`job_id` AND `db_jobs_favorite`.`user_id`='$usid'
														WHERE  ".$where_params." 
														ORDER BY".$order_by_params." ".
														$limit_params));*/
$joblist_array = $db->FetchArrayAll($db->Query("SELECT 	".$search_rows."
														FROM `db_jobs` 
														LEFT JOIN `db_jobs_category` 
														ON `db_jobs`.`category`=`db_jobs_category`.`id` 
														LEFT JOIN `db_jobs_hidden` 
														ON `db_jobs`.`id`=`db_jobs_hidden`.`job_id`	AND `db_jobs_hidden`.`user_id`='$usid'	
														LEFT JOIN `db_jobs_favorite` 
														ON `db_jobs`.`id`=`db_jobs_favorite`.`job_id` AND `db_jobs_favorite`.`user_id`='$usid'
														LEFT JOIN `db_jobs_use` 
														ON `db_jobs`.`id`=`db_jobs_use`.`job_id` AND `db_jobs_use`.`user_id`='$usid'
														WHERE  ".$where_params." 
														ORDER BY".$order_by_params." ".
    $limit_params));

$db->Query("SELECT 	count(*)
					FROM `db_jobs` 
					LEFT JOIN `db_jobs_category` 
					ON `db_jobs`.`category`=`db_jobs_category`.`id` 
					LEFT JOIN `db_jobs_hidden` 
					ON `db_jobs`.`id`=`db_jobs_hidden`.`job_id`	AND `db_jobs_hidden`.`user_id`='".$usid."'	
					LEFT JOIN `db_jobs_favorite` 
					ON `db_jobs`.`id`=`db_jobs_favorite`.`job_id` AND `db_jobs_favorite`.`user_id`='".$usid."'	
					WHERE  ".$where_params." 
					ORDER BY".$order_by_params);

$all_results = $db->FetchRow();

$jobs_statistics_tmp = $db->FetchArrayAll($db->Query("SELECT * FROM `db_jobs_use` 
																LEFT JOIN `db_jobs` 
																ON `db_jobs`.`id`=`db_jobs_use`.`job_id` 
																WHERE `db_jobs_use`.`user_id`='$usid' AND `db_jobs_use`.`status`=0 "));
$all_pay_wait_tmp = $db->FetchArrayAll($db->Query("SELECT * FROM `db_jobs_use` 
																LEFT JOIN `db_jobs` 
																ON `db_jobs`.`id`=`db_jobs_use`.`job_id` 
																WHERE `db_jobs_use`.`user_id`='$usid' AND `db_jobs_use`.`status`=1 "));
$all_pay_rework_tmp = $db->FetchArrayAll($db->Query("SELECT * FROM `db_jobs_use` 
																LEFT JOIN `db_jobs` 
																ON `db_jobs`.`id`=`db_jobs_use`.`job_id` 
																WHERE `db_jobs_use`.`user_id`='$usid' AND `db_jobs_use`.`status`=2 "));
$all_pay_in_work = 0;
$all_pay_wait = 0;
$all_pay_rework= 0;
foreach ($jobs_statistics_tmp as $item){
	$all_pay_in_work += percent($item['pay']);
}
foreach ($all_pay_wait_tmp as $item){
	$all_pay_wait += percent($item['pay']);
}
foreach ($all_pay_rework_tmp as $item){
	$all_pay_rework += percent($item['pay']);
}
$jobs_statistics['in_work']['number'] = count($jobs_statistics_tmp);
$jobs_statistics['in_work']['sum'] = $all_pay_in_work;
$jobs_statistics['wait']['number'] = count($all_pay_wait_tmp);
$jobs_statistics['wait']['sum'] = $all_pay_wait;
$jobs_statistics['rework']['number'] = count($all_pay_rework_tmp);
$jobs_statistics['rework']['sum'] = $all_pay_rework;
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
			<div class="text-center jobs_list_refresh_block">
				<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="small_blue_text">[Обновить статистику]</a>
			</div>
			<div class="jobs_statuses_menu">
				<table cellpadding="7" border="2" width="100%">
					<tr>
						<td colspan="2" class="small_blue_text">
							Выполняются:
						</td>
						<td colspan="2" class="small_blue_text">
							Ожидают проверки:
						</td>
						<td colspan="2" class="small_blue_text">
							На доработке:
						</td>
					</tr>
					<tr>
						<td>
							<strong>
								<?php echo $jobs_statistics['in_work']['number']; ?> шт.
							</strong>
						</td>
						<td>
							<strong class="green-text">
								<?php echo $jobs_statistics['in_work']['sum']; ?>  монет
							</strong>
						</td>
						<td>
							<strong>
								<?php echo $jobs_statistics['wait']['number']; ?> шт.
							</strong>
						</td>
						<td>
							<strong class="green-text">
								<?php echo $jobs_statistics['wait']['sum']; ?> монет
							</strong>
						</td>
						<td>
							<strong>
								<?php echo $jobs_statistics['rework']['number']; ?> шт.
							</strong>
						</td>
						<td>
							<strong class="green-text">
								<?php echo $jobs_statistics['rework']['sum']; ?> монет
							</strong>
						</td>
					</tr>
				</table>
			</div>
			<div>
				<h1 class="text-center">Тип заданий</h1>
				<div class="text-center mb20">
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/0/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 0 ? 'active_sort_button' : ''); ?>">Все</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/1/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 1 ? 'active_sort_button' : ''); ?>">Клики</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/2/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 2 ? 'active_sort_button' : ''); ?>">Youtube</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/3/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 3 ? 'active_sort_button' : ''); ?>">Регистрация без активности</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/4/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 4 ? 'active_sort_button' : ''); ?>">Регистрация с активностью</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/5/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 5 ? 'active_sort_button' : ''); ?>">Инвестиции</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/6/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 6 ? 'active_sort_button' : ''); ?>">Социальные сети</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/7/sort/<?php echo $sorting; ?>/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($filter == 7 ? 'active_sort_button' : ''); ?>">Разное</a>
				</div>
				<div class="text-center mb10">
					<form action="" method="post">
						<label for="jobs_sort_find" class="jobs_normal_text">Поиск задания по ID </label>
						<input id="jobs_sort_find" name="jobs_sort_find" type="text" value="<?php echo (isset($_POST['jobs_sort_find']) ? $_POST['jobs_sort_find'] : ""); ?>" >
						<input type="submit" class="jobs_sort_button" value="Найти">
					</form>
				</div>
				<div class="text-center jobs_lsort_last_div mb20">
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/0/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($sorting == 0 ? 'active_sort_button' : ''); ?>">Все</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/1/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($sorting == 1 ? 'active_sort_button' : ''); ?>">Избранное</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/2/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($sorting == 2 ? 'active_sort_button' : ''); ?>">Многоразовые</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/3/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($sorting == 3 ? 'active_sort_button' : ''); ?>">Цена выше</a>
					<a href="/account/jobs/page/<?php echo $jobs_page; ?>/filter/<?php echo $filter; ?>/sort/4/author/<?php echo $author_id?>" class="jobs_sort_button <?php echo ($sorting == 4 ? 'active_sort_button' : ''); ?>">Цена ниже</a>
				</div>
			</div>
			<div class="jobs_jlist jobs_normal_text jobs_jlist_wrap">
				<div class="jobs_jlist_counter">
					<strong class="jobs_normal_text">
						Найдено заданий: <?php echo $all_results;?>
					</strong>
				</div>
				<div>
					<div class="jobs_list_paginate">

						<?php

						$current_page = $jobs_page;
						$last_page = round($all_results / 10);
						$left_page = $current_page - 2;
						$right_page = $current_page + 2;

						$paginate_arr[0] = 1;

						if($current_page - 2 > 1){
							$left_page = $current_page - 2;
						}else{
							$left_page = 2;
						}

						if($current_page + 2 < $last_page - 1){
							$right_page = $current_page + 2;
						}else{
							$right_page = $last_page - 1;
						}

						if($left_page - 1 > 1){
							$paginate_arr[] = "...";
						}

						for($i = $left_page; $i <= $current_page; $i++){
							$paginate_arr[] = $i;
						}

						for($j = $current_page + 1; $j <= $right_page; $j++){
							$paginate_arr[] = $j;
						}

						if($right_page + 1 < $last_page){
							$paginate_arr[] = "...";
						}

						if(end($paginate_arr) != $last_page){
							$paginate_arr[] = $last_page;
						}

						if($last_page > 1){
							echo "Страница:";
							foreach($paginate_arr as $pitem){
								if($pitem == "..."){
									echo "...";
								}else{
									if($pitem == $current_page){
										echo '<a href="/account/jobs/page/'.($pitem).'/filter/'.$filter.'/sort/'.$sorting.'/author/'.$author_id.'" class="jobs_normal_text jobs_list_paginate_active">'.$pitem.'</a>';
									}else{
										echo '<a href="/account/jobs/page/'.($pitem).'/filter/'.$filter.'/sort/'.$sorting.'/author/'.$author_id.'" class="jobs_normal_text">'.$pitem.'</a>';
									}
								}
							}
						}


						?>

					</div>
				</div>
				<div class="clearfix"></div>

				<?php

				if(count($joblist_array) == 0) {
					echo 'Нет доступных заданий!';
				}else {


					foreach ($joblist_array as $item) {
						?>

						<div class="jobs_jlist_item">
							<div class="jobs_item_left" style="max-width: 50%; overflow: hidden;">
								<ul>
									<li class="normal_blue-text">
										<div class="not_long_text">
											<a href="/account/jobs/show/<?php echo $item['id']; ?>">
												<?php echo $item['name']; ?>
											</a>
										</div>
									</li>
									<li>
										<?php echo $item['url']; ?>
									</li>
									<li class="small_blue_text">
											<?php echo $item['id'] . " - " . $item['cat_name']; ?>
									</li>
								</ul>
							</div>
							<div class="jobs_item_right tar">
								<div class="normal_blue-text mb10">
									<?php
										echo percent($item['pay'])." монет";
									?>
								</div>
								<div>
									<?php
                                        if ($item['period'] > 0) {
                                            if($item['db_jobs_use_status'] > 1){
                                                $tmp_time = $config->job_period_sec[$item['period']] - (time() - $item['db_jobs_finish_time']);
												if($tmp_time < 0){
													echo '<img src="/style/img/clock.png" alt="">';
												}else{
													$time = new DateTime('@'.$tmp_time);
													echo '<span><strong>Доступно через: '.$time->format('H час. i мин.').'</strong></span>
													<img src="/style/img/clock.png" alt="">';
												}
                                            } else{
                                                echo '<img src="/style/img/clock.png" alt="">';
                                            }
									    }
                                    ?>
									<form action="" method="post" class="di">
										<input type="hidden" name="add_job_to_favorite" value="1">
										<input type="hidden" name="job_id" value="<?php echo $item['id']; ?>">
										<button type="submit" class="custom_submit">
											<img src="/style/img/favorites.png" alt="">
										</button>
									</form>
									<form action="" method="post" class="di">
										<input type="hidden" name="add_job_to_favorite" value="0">
										<input type="hidden" name="job_id" value="<?php echo $item['id']; ?>">
										<button type="submit" class="custom_submit">
											<img src="/style/img/close.png" alt="">
										</button>
									</form>
								</div>
							</div>
							<div class="clearfix"></div>
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
