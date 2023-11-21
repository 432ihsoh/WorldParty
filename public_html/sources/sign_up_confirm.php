<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
        $smarty = new Smarty();
        $smarty->template_dir = "../Smarty/templates/";
        $smarty->compile_dir = "../Smarty/templates_c/";

        $smarty->assign('last_name', $_POST['last_name']);
        $smarty->assign('first_name', $_POST['first_name']);
        $smarty->assign('email', $_POST['email']);
        $smarty->assign('password', $_POST['password']);
        $smarty->assign('mail_number', $_POST['mail_number']);
        $smarty->assign('address', $_POST['address']);
        $smarty->assign('phone_number', $_POST['phone_number']); 

        $smarty->display('sign_up_confirm.tmpl');
?>

