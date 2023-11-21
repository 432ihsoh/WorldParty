<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
	//以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");

    
	$id = 0;
	$num = 0;
	$random = rand(1, 28);
	if (isset($_POST['item_id']) && isset($_POST['num'])) {
		$id = $_POST['item_id'];
		$num = $_POST['num'];

		$engine = DB_RDBMS;
		$host = DB_HOST;
		$database = DB_NAME;
		$charset = DB_CHARSET;
		$user = DB_USER;
		$pass = DB_PASS;
		$conn = new mysqli($host, $user, $pass, $database);

		$query = "SELECT item_id, item_name, item_keyword, item_price FROM items";
		$result = $conn->query($query);

		$items = array();
		while ($row = $result->fetch_assoc()) {
			$items[] = $row;
		}

		$smarty->assign('items', $items);
		$conn->close();
	}


    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
	$smarty->assign('num', $num);
	$smarty->assign('id', $id);
	$smarty->assign('random', $random);
    //$smarty->assign('name', $items[0]['item_name']);  

    $smarty->display('cart.tmpl');

	

?>
