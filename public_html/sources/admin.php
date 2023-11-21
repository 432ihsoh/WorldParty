<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

$ERR_STR = "";
$admin_id = "";
$admin_name = "";

session_start();
if(isset($_SESSION['tmB2023_adm']['err']) && $_SESSION['tmB2023_adm']['err'] != ""){
    $ERR_STR = $_SESSION['admin']['err'];
}

//このセッションをクリア
$_SESSION['tmB2023_adm'] = array();

if(isset($_POST['admin_mail_address']) && isset($_POST['password'])){
    if(chk_admin_login(
        strip_tags($_POST['admin_mail_address']),
        strip_tags($_POST['password']))){
        session_start();
        $_SESSION['tmB2023_adm']['admin_mail_address'] = strip_tags($_POST['admin_mail_address']);
        $_SESSION['tmB2023_adm']['admin_id'] = $admin_id;
        $_SESSION['tmB2023_adm']['admin_name'] = $admin_name;
        cutil::redirect_exit("admin_index.php");
    }
}

function chk_admin_login($admin_mail_address,$password){
    global $ERR_STR;
    global $admin_id;
    global $admin_name;
    $admin = new cadmins();
    $row = $admin->get_tgt_mail(false,$admin_mail_address);
    if($row === false || !isset($row['admin_id'])){
        $ERR_STR .= "ログイン名が不定です。\n";
        return false;
    }
    //暗号化によるパスワード認証
    if($password != $row['admin_password']){
        $ERR_STR .= "パスワードが違っています。\n";
        return false;
    }
    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    return true;
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('admin.tmpl');


?>
