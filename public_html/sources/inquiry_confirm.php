<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

    $smarty->assign('email', $_POST['email']);
    $smarty->assign('title', $_POST['title']);
    $smarty->assign('content', $_POST['content']);
    
    
    session_start();
    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('inquiry_confirm.tmpl');

?>
