<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    //以下はセッションメンバー管理用のインクルード
    require_once($CMS_COMMON_INCLUDE_DIR . "auth_member.php");
    
    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('payment.tmpl');

?>
