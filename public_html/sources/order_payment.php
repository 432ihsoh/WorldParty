<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    //以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");

    $id = $_POST['item_id'];
	$name = $_POST['item_name'];
	$price = $_POST['item_price'];
	$num = $_POST['num'];

    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
	$smarty->assign('num', $num);
	$smarty->assign('price', $price);
	$smarty->assign('name', $name);
	$smarty->assign('id', $id);
    $smarty->display('order_payment.tmpl');

?>
