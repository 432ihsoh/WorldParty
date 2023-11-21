<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

    if (isset($_POST['email']) && isset($_POST['title']) && isset($_POST['content'])) {
        $add_inquiry_title = $_POST['title'];
        $add_inquiry_content = $_POST['content'];
        $add_inquiry_mail_address = $_POST['email'];
        $add_inquiry_date = date('Y-m-d');
        $add_comment = "";
        $add_solve_id = 1;

        $engine = DB_RDBMS;
        $host = DB_HOST;
        $database = DB_NAME;
        $charset = DB_CHARSET;
        $user = DB_USER;
        $pass = DB_PASS;
        $conn = new mysqli($host, $user, $pass, $database);
    
        $query = "INSERT INTO inquiries (inquiry_title, inquiry_content, inquiry_mail_address, inquiry_date, comment, solve_id) VALUES ('$add_inquiry_title', '$add_inquiry_content', '$add_inquiry_mail_address', '$add_inquiry_date', '$add_comment', '$add_solve_id')";
    
        if ($conn->query($query) === FALSE) {
            header("Location: sign_up_error.php");
            exit(); 
        }
    
        $conn->close();
    }


    $smarty->assign('email', $_POST['email']);
    $smarty->assign('title', $_POST['title']);
    $smarty->assign('content', $_POST['content']);
    
    session_start();
    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->display('inquiry_complete.tmpl');

?>
