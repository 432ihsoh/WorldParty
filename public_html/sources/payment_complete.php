<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    //以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");
	
    if (isset($_POST['card_number']) && isset($_POST['security_cord'])) {
		$credit = $_SESSION['tmB2023_mem']['credit_number'];
		$credit_number = $_POST['card_number'];
		$cvv = $_POST['security_cord'];

		$engine = DB_RDBMS;
		$host = DB_HOST;
		$database = DB_NAME;
		$charset = DB_CHARSET;
		$user = DB_USER;
		$pass = DB_PASS;
		$conn = new mysqli($host, $user, $pass, $database);

		$sql = "UPDATE users SET credit_number = ?, cvv = ? WHERE user_id = ?";
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param("sss", $credit_number, $cvv, $_SESSION['tmB2023_mem']['user_id']);
		
		if ($stmt->execute()) {
			$_SESSION['tmB2023_mem']['credit_number'] = substr($credit_number, -4);
			$credit = $_SESSION['tmB2023_mem']['credit_number'];
		} else {
			header("Location: sign_up_error.php");
			//echo $stmt->error;
		}
		
		$stmt->close();

		$conn->close();
	}

    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('payment_complete.tmpl');

?>
