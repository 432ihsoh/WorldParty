<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

        if (isset($_POST['last_name']) && isset($_POST['first_name'])) {
            $add_last_name = $_POST['last_name'];
            $add_first_name = $_POST['first_name'];
            $add_user_mail_address = $_POST['email'];
            $add_user_password = $_POST['password'];
            $add_postal_code = $_POST['mail_number'];
            $add_user_address = $_POST['address'];
            $add_telephone_number = $_POST['phone_number'];
            $add_credit_number = 0;
            $add_cvv = 0;

            $engine = DB_RDBMS;
            $host = DB_HOST;
            $database = DB_NAME;
            $charset = DB_CHARSET;
            $user = DB_USER;
            $pass = DB_PASS;
            $conn = new mysqli($host, $user, $pass, $database);
        
            $query = "INSERT INTO users (last_name, first_name, user_mail_address, user_password, postal_code, user_address, telephone_number, credit_number, cvv) VALUES ('$add_last_name', '$add_first_name', '$add_user_mail_address', '$add_user_password', '$add_postal_code', '$add_user_address', '$add_telephone_number', '$add_credit_number', '$add_cvv')";

        
            // エラーの確認
            if ($conn->query($query) === FALSE) {
                header("Location: sign_up_error.php");
                exit(); 
            }
        
            // データベース接続を閉じる
            $conn->close();
        }

        $smarty->assign('last_name', $_POST['last_name']);
        $smarty->assign('first_name', $_POST['first_name']);
        $smarty->assign('email', $_POST['email']);
        $smarty->assign('password', $_POST['password']);
        $smarty->assign('mail_number', $_POST['mail_number']);
        $smarty->assign('address', $_POST['address']);
        $smarty->assign('phone_number', $_POST['phone_number']); 


    session_start();
    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('sign_up_complete.tmpl');
?>