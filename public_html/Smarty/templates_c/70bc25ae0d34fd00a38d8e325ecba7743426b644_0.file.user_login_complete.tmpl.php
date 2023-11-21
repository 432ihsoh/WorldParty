<?php
/* Smarty version 4.3.1, created on 2023-08-16 11:15:47
  from '/home/j2023b/public_html/Smarty/templates/user_login_complete.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64dc31533cedc9_35573750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70bc25ae0d34fd00a38d8e325ecba7743426b644' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/user_login_complete.tmpl',
      1 => 1692152077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64dc31533cedc9_35573750 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン完了</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>
    <link href="css/change_password.css" rel="stylesheet">
    
</head>

<body >

 <div class="container" style="width: 800px;">
	<h1 style="text-align: center;">ログインしました</h1>
	ようこそ<?php echo $_SESSION['tmB2023_member']['user_name'];?>
さん<br />   
	<br>

	<p style="text-align: center; margin: 30px; font-size: 18px;">それでは楽しいショッピングのお時間をお楽しみください。</p>   
	<br>

	<div style="text-align: center;">
		<button type="submit" class="btn btn-primary rounded-pill" style="width:50%;" onclick="location.href='index.php'">トップページ</button>
	</div>
       
</div>

</body>
</html>
<?php }
}
