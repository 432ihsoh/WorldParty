<?php
/* Smarty version 4.3.1, created on 2023-07-10 15:01:33
  from '/home/j2023b/public_html/Smarty/templates/inquiry.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ab9ebdb44ce4_98519479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c2039a1b4b6170a1b43c4f720d22c349ba5d41b' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/inquiry.tmpl',
      1 => 1688968199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ab9ebdb44ce4_98519479 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>お問い合わせ|WorldParty(仮)</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<header>ヘッダーです</header>
	<div class="container my-5">
		<form action="inquiry_confirm.php" method="post"> 
			<h1 class="text-center">お問い合わせ</h1>
			<div class="form-group col-md-8">
				<label>メールアドレス <span class="badge bg-danger">必須</span></label>
				<input type="email" name="email" class="form-control" placeholder="メールアドレス">
			</div>
			<div class="form-group col-md-8">
				<label>お名前 <span class="badge bg-danger">必須</span></label>
				<input type="text" name="name" class="form-control" placeholder="お名前">
			</div>
			<div class="form-group">
				<label>お問い合わせ内容 <span class="badge bg-danger">必須</span></label>
				<textarea rows="6" cols="40" name="content" type="text" class="form-control"></textarea>
			</div>
			
			<div class="text-center" style="padding:20px">
				<button type="submit" class="btn btn-outline-primary">確認画面へ</button>
			</div>
		</form>
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
