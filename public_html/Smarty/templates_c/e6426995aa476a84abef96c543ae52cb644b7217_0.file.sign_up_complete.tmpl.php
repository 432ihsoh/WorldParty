<?php
/* Smarty version 4.3.1, created on 2023-08-08 00:19:05
  from '/home/j2023b/public_html/Smarty/templates/sign_up_complete.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64d10b6998b393_36177370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6426995aa476a84abef96c543ae52cb644b7217' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/sign_up_complete.tmpl',
      1 => 1691420411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d10b6998b393_36177370 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録完了</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>
    <link href="css/change_password.css" rel="stylesheet">
    
</head>

<body >

 <div class="container" style="width: 800px;">
	<h1 style="text-align: center;">新規登録ありがとうございます</h1>   
	<br>

	<p style="text-align: center; margin: 30px; font-size: 18px;">下記ボタンより、ログインページへお進みください。</p>   
	<br>

	<div style="text-align: center;">
		<button type="submit" class="btn btn-primary rounded-pill" style="width:50%;" onclick="location.href='login.php'">ログインページ</button>
	</div>
       
</div>

</body>
</html>


 <?php }
}
