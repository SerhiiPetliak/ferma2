<?PHP
# ������������� �������
function __autoload($name){ include("classes/_class.".$name.".php");}

# ����� ������� 
$config = new config;

# �������
$func = new func;

# ���� ������
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

$db->Query("SELECT * FROM db_config WHERE id = '1'");
$data_c = $db->FetchArray();



if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"]))
{
	$m_key = $config->secretW;
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	
	$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));
	if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success")
	{
		
	$db->Query("SELECT * FROM db_payeer_insert WHERE id = '".intval($_POST['m_orderid'])."'");
	if($db->NumRows() == 0){ echo $_POST['m_orderid']."|error"; exit;}
	
	$payeer_row = $db->FetchArray();
	if($payeer_row["status"] > 0){ echo $_POST['m_orderid']."|success"; exit;}

	if($payeer_row["adv_id"] != 0){

	    $adv_sum = $payeer_row["sum"] * $data_c['ser_per_wmr'];
        $adv = $payeer_row["adv_id"];

        $db->query("UPDATE db_serfing SET `money` = `money` + '".$adv_sum."' WHERE id = '".$adv."'"); // ��������� ��������� �����


    }else {

        $db->Query("UPDATE db_payeer_insert SET status = '1' WHERE id = '" . intval($_POST['m_orderid']) . "'");

        $ik_payment_amount = $payeer_row["sum"];
        $user_id = $payeer_row["user_id"];

        # ���������
        $db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
        $sonfig_site = $db->FetchArray();

        $db->Query("SELECT user, referer_id FROM db_users_a WHERE id = '{$user_id}' LIMIT 1");
        $user_ardata = $db->FetchArray();
        $user_name = $user_ardata["user"];
        $refid = $user_ardata["referer_id"];

        # ��������� ������
        $serebro = sprintf("%.4f", floatval($sonfig_site["ser_per_wmr"] * $ik_payment_amount));

        $db->Query("SELECT insert_sum FROM db_users_b WHERE id = '{$user_id}' LIMIT 1");
        $ins_sum = $db->FetchRow();
        # ������ ���������� +10% ������� $serebro = intval($ins_sum <= 0.01) ? ($serebro + ($serebro * 0.10) ) : $serebro;
        $serebro = intval($ins_sum <= 0.01) ? ($serebro + ($serebro * 0.10)) : $serebro;
        $add_tree = ($ik_payment_amount >= 499.99) ? 0 : 0;
        $lsb = time();
        # ������� �������� �� ���������� �������� 10%
        $to_referer = ($serebro * 0.10);

        $db->Query("UPDATE db_users_b SET money_b = money_b + '$serebro', e_t = e_t + '$add_tree', to_referer = to_referer + '$to_referer', last_sbor = '$lsb', insert_sum = insert_sum + '$ik_payment_amount' WHERE id = '{$user_id}'");


        # ��������� �������� �������� � �������� - �������� ���� �� �����������
        $add_tree_referer = ($ins_sum <= 0.01) ? ", a_t = a_t + 0" : "";
        $db->Query("UPDATE db_users_b SET money_b = money_b + $to_referer, from_referals = from_referals + '$to_referer' {$add_tree_referer} WHERE id = '$refid'");


        # ���������� ����������
        $da = time();
        $dd = $da + 60*60*24*15;
        $db->Query("INSERT INTO db_insert_money (user, user_id, money, serebro, date_add, date_del) 
   VALUES ('$user_name','$user_id','$ik_payment_amount','$serebro','$da','$dd')");
# �������
        $competition = new competition($db);
        $competition->UpdatePoints($user_id, $ik_payment_amount);
#--------

# ���������� ���������� �����
        $db->Query("UPDATE db_stats SET all_insert = all_insert + '$ik_payment_amount' WHERE id = '1'");

        echo $_POST['m_orderid']."|success";
        exit;




    }
   
   

	}
	echo $_POST['m_orderid']."|error";
}
?>