<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

$ERR_STR = "";
$user_id = "";
$last_name = "";
$first_name = "";
$postal_code = "";
$user_address = "";
$credit_number = "";

session_start();
if(isset($_SESSION['tmB2023_mem']['err']) && $_SESSION['tmB2023_mem']['err'] != ""){
    $ERR_STR = $_SESSION['tmB2023_mem']['err'];
}

//このセッションをクリア
$_SESSION['tmB2023_mem'] = array();

if(isset($_POST['user_mail_address']) && isset($_POST['password'])){
    if(chk_user_login(
        strip_tags($_POST['user_mail_address']),
        strip_tags($_POST['password']))){
        session_start();
        $_SESSION['tmB2023_mem']['user_mail_address'] = strip_tags($_POST['user_mail_address']);
        $_SESSION['tmB2023_mem']['user_id'] = $user_id;
        $_SESSION['tmB2023_mem']['last_name'] = $last_name;
        $_SESSION['tmB2023_mem']['first_name'] = $first_name;
        $_SESSION['tmB2023_mem']['postal_code'] = $postal_code;
        $_SESSION['tmB2023_mem']['user_address'] = $user_address;
        $_SESSION['tmB2023_mem']['credit_number'] = substr($credit_number, -4);
        cutil::redirect_exit("user_login_complete.php");
    }
}

function chk_user_login($user_mail_address,$password){
    global $ERR_STR;
    global $user_id;
    global $last_name;
    global $first_name;
    global $postal_code;
    global $user_address;
    global $credit_number;
    $user = new cusers();
    $row = $user->get_tgt_mail(false,$user_mail_address);
    if($row === false || !isset($row['user_id'])){
        $ERR_STR .= "メールアドレスが不定です。\n";
        return false;
    }
    //暗号化によるパスワード認証
    if($password != $row['user_password']){
        $ERR_STR .= "パスワードが違っています。\n";
        return false;
    }
    $user_id = $row['user_id'];
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $postal_code = $row['postal_code'];
    $user_address = $row['user_address'];
    $credit_number = $row['credit_number'];

    return true;
}

$smarty->assign('ERR_STR',$ERR_STR);
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('user_login.tmpl');


?>
