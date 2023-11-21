<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_adm.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>メインメニュー</title>
<script type="text/javascript">

// -->
</script>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php require_once("gmenu.php"); ?>
<div id="headTitle">
<h2>メインメニュー</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php
echo $_SESSION['tmB2023_adm']['admin_name'];
echo "さん、こんちゃ～～っす"
?>
<br />
<table >
<tr>
<td><a href="items_list.php">商品管理</a></td>
</tr>
<tr>
<td><a href="users_list.php">ユーザー管理</a></td>
</tr>
<tr>
<td><a href="admin_list.php">管理者管理</a></td>
</tr>
<tr>
<td><a href="orders_list.php">注文管理</a></td>
</tr>
<tr>
<td><a href="inquiries_list.php">お問合せ</a></td>
</tr>
</table>
<p>&nbsp;</p>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
