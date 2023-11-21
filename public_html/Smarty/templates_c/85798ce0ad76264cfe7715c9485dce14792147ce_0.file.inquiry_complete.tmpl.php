<?php
/* Smarty version 4.3.1, created on 2023-07-10 15:09:18
  from '/home/j2023b/public_html/Smarty/templates/inquiry_complete.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64aba08e1312e9_57344887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85798ce0ad76264cfe7715c9485dce14792147ce' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/inquiry_complete.tmpl',
      1 => 1688964720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64aba08e1312e9_57344887 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>お問い合わせ完了|WorldParty(仮)</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<header>ヘッダーです</header>
	<div class="container my-5">
		<h1 class="text-center">お問い合わせ</h1>
		<h4 class="text-center" style="padding:20px">お問い合わせフォームの送信を完了致しました。</h4>
		<p class="text-center">
			この度はお問い合わせいただきまして誠にありがとうございます。<br>
			ご入力頂いたメールアドレス宛へ、ご確認メールをお送りしておりますのでご確認ください。<br>
			内容を確認次第、担当者より折返しご連絡させていただきます。今しばらくお待ちくださいませ。
		</p>
		
		<div class="text-center" style="padding:20px">
			<button type="submit" class="btn btn-outline-primary" onclick="location.href='index.html'">トップページへ戻る</button>
		</div>
	</div>
	<footer>フッターです</footer>

	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
