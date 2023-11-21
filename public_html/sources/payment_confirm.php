<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

        $smarty->assign('card_mumber', $_POST['card_mumber']);
        $smarty->assign('card_name', $_POST['card_name']);
        $smarty->assign('dead_line', $_POST['dead_line']);
        $smarty->assign('security_cord', $_POST['security_cord']);

     $smarty->display('payment_confirm.tmpl');

?>