<?php
/* Smarty version 4.3.1, created on 2023-07-11 10:05:37
  from '/home/j2023b/public_html/Smarty/templates/review.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64acaae1f0d314_77610072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6429de04694dc14083d0810b1c623af0cdea7b85' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/review.tmpl',
      1 => 1689037519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64acaae1f0d314_77610072 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>レビュー|WorldParty(仮)</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/review.css" rel="stylesheet">
	
</head>

<body>
	<header>ヘッダーです</header>
	<form class="review-area mx-auto" required="required">
		<div>
			<h3>この商品をレビュー</h3>
			<p></p>
		</div>
		<div class="review">
			<h4>評価</h4>
			<div class="stars" >
				<span>
					<input id="review01" type="radio" name="review"><label for="review01">★</label>
					<input id="review02" type="radio" name="review"><label for="review02">★</label>
					<input id="review03" type="radio" name="review"><label for="review03">★</label>
					<input id="review04" type="radio" name="review"><label for="review04">★</label>
					<input id="review05" type="radio" name="review"><label for="review05">★</label>
				</span>
			</div>
		</div>
		<div>
			<h4>レビュータイトル</h4>
			<input type="text" class="form-control" placeholder="最も伝えたいポイントは何ですか？" required>
		</div>
		<div>
			<h4>レビューを追加</h4>
			<textarea rows="6" cols="40" name="review" type="text" class="form-control" placeholder="気に入ったこと/気に入らなかったことは何ですか？" required></textarea>
		</div>
		<div class="text-center" style="padding:20px">
			<input type="submit" required="required" class="btn btn-outline-primary" onclick="location.href='review_confirm.php'" value="投稿" >
		</div>

	</form>
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
