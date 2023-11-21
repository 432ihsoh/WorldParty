<?php
/* Smarty version 4.3.1, created on 2023-07-10 15:07:57
  from '/home/j2023b/public_html/Smarty/templates/inquiry_confirm.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64aba03d2e6665_55387211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01b256d5d0d29caf400cfdb9a891707e79b99c0a' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/inquiry_confirm.tmpl',
      1 => 1688969252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64aba03d2e6665_55387211 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>お問い合わせ確認|WorldParty(仮)</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<header>ヘッダーです</header>
	<div class="container my-5">
		<h1 class="text-center">お問い合わせ</h1>
		<h4 class="text-center" style="padding:20px">入力内容をご確認ください</h4>
		<p class="text-center">
			以下にご入力いただきました内容を送信いたします。<br>
			入力内容を確認の上、よろしければ「送信」ボタンを押してください。<br>
			入力内容に誤りや、不足がある場合には「戻る」ボタンで<br>
			前のページに戻り、再度ご入力をお願いいたします。
		</p>
		<p class="text-center">
			メールアドレス<br>
			                        <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

		</p>
		<p class="text-center">
			お名前<br>
			                        <?php echo $_smarty_tpl->tpl_vars['name']->value;?>


		</p>
		<p class="text-center">
			お問い合わせ内容<br>
			                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</p>

		<div class="text-center" style="padding:20px">
			<button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
			<button type="submit" class="btn btn-outline-primary" onclick="location.href='inquiry_complete.php'">送信</button>
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
