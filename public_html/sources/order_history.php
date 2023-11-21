<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    //以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");

	if (isset($_POST['order_id']) ) {
		$order_id = $_POST['order_id'];
		$confirm_id = $_POST['confirm_id'];

		$engine = DB_RDBMS;
		$host = DB_HOST;
		$database = DB_NAME;
		$charset = DB_CHARSET;
		$user = DB_USER;
		$pass = DB_PASS;
		$conn = new mysqli($host, $user, $pass, $database);
		
		$query = "UPDATE orders SET confirm_id = ? WHERE order_id = ?";
		$stmt = $conn->prepare($query);

		$stmt->bind_param("ss", $confirm_id, $order_id);
			
		// エラーの確認
		if (!$stmt->execute()) {
			header("Location: sign_up_error.php");
			exit(); 
		}

		$conn->close();
	}
	


    $id = $_SESSION['tmB2023_mem']['user_id'];

    $engine = DB_RDBMS;
    $host = DB_HOST;
    $database = DB_NAME;
    $charset = DB_CHARSET;
    $user = DB_USER;
    $pass = DB_PASS;

    $conn = new mysqli($host, $user, $pass, $database);

    $query = "SELECT order_id, item_id, item_name, order_amount, order_num, confirm_id, order_date FROM orders WHERE user_id = $id";

    $result = $conn->query($query);

    $results = [];

	while ($row = $result->fetch_assoc()) {
		$results[] = $row;
	}

	$conn->close();

    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
	$smarty->assign('id', $id);
	$smarty->assign('results', $results);
    $smarty->display('order_history.tmpl');

?>