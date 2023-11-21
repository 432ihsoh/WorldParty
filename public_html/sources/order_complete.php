<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    //以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");

	if (isset($_POST['item_id']) ) {
		$add_user_id = $_SESSION['tmB2023_mem']['user_id'];
		$add_item_id = $_POST['item_id'];
		$add_item_name = $_POST['item_name'];
		$add_order_amount = $_POST['item_price'];
		$add_order_num = $_POST['num'];
		$add_order_postal_code = $_SESSION['tmB2023_mem']['postal_code'];
		$add_order_address = $_SESSION['tmB2023_mem']['user_address'];
		$add_confirm_id = 1;
		$add_order_date = date('Y-m-d');

		$engine = DB_RDBMS;
		$host = DB_HOST;
		$database = DB_NAME;
		$charset = DB_CHARSET;
		$user = DB_USER;
		$pass = DB_PASS;
		$conn = new mysqli($host, $user, $pass, $database);
		
		$query = "INSERT INTO orders (user_id, item_id, item_name, order_amount, order_num, order_postal_code, order_address, confirm_id, order_date) VALUES ('$add_user_id', '$add_item_id', '$add_item_name', '$add_order_amount', '$add_order_num', '$add_order_postal_code', '$add_order_address', '$add_confirm_id', '$add_order_date')";

			
		// エラーの確認
		if ($conn->query($query) === FALSE) {
			header("Location: sign_up_error.php");
			exit(); 
		}
	}
	// データベース接続を閉じる
	$conn->close();
	
	
	

    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('order_complete.tmpl');

?>