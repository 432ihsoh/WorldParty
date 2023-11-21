<?php
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");

	$search = $_GET['search'];
    $search = str_replace("　", " ", $search); 
    $searchTerms = explode(' ', $search); 

    $engine = DB_RDBMS;
    $host = DB_HOST;
    $database = DB_NAME;
    $charset = DB_CHARSET;
    $user = DB_USER;
    $pass = DB_PASS;

    $conn = new mysqli($host, $user, $pass, $database);

    $sql = "SELECT item_id, item_name, item_price FROM items WHERE ";
    $placeholders = array_fill(0, count($searchTerms), "item_keyword LIKE ?");
    $sql .= implode(' OR ', $placeholders);

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("プリペアドステートメントエラー: " . $conn->error);
    }
    
    $searchTermWithWildcards = array_map(function($term) {
        return "%$term%";
    }, $searchTerms);
    
    $stmt->bind_param(str_repeat("s", count($searchTerms)), ...$searchTermWithWildcards);
    $stmt->execute();

    $result = $stmt->get_result();
    
    $results = [];

	while ($row = $result->fetch_assoc()) {
		$results[] = $row;
	}

	$stmt->close();
    $conn->close();

    session_start();
    $isLoggedIn = isset($_SESSION['tmB2023_mem']['user_id']);
    $smarty->assign('isLoggedIn', $isLoggedIn);
    $smarty->assign('results', $results);
	$smarty->assign('search', $search);


    $smarty->display('item_search.tmpl');

?>