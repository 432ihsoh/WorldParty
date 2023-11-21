<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

    session_start();

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

    $conn->close();

    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->assign('items', $items);

    $smarty->display('index.tmpl');
?>
