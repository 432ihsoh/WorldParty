<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");

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
<br />
<table >
<tr>
<td ><a href="prefecture_list.php">都道府県管理</a></td>
</tr>
<tr>
<td><a href="users_list.php">ユーザー一覧</a></td>
</tr>
<tr>
<td><a href="users_list.php">管理者一覧</a></td>
</tr>
</table>
<p>&nbsp;</p>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
