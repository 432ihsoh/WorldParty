<?php
/* Smarty version 4.3.1, created on 2023-08-15 22:51:19
  from '/home/j2023b/public_html/Smarty/templates/admin.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64db82d7ebd4c0_04152869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c59788060a893dc9bf14871aa8e7fd339ca4d7d0' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/admin.tmpl',
      1 => 1692102207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64db82d7ebd4c0_04152869 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>ログイン</title>
<?php echo '<script'; ?>
 type="text/javascript">
<!--


// -->
<?php echo '</script'; ?>
>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<div id="headTitle">
<h2>ログイン</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<p class="red"><?php echo '<?php'; ?>
 echo cutil::ret2br($ERR_STR); <?php echo '?>'; ?>
</p>
<form action="admin.php" method="post">
<table>
<tr>
<th>メールアドレス</th>
<td width="60%"><input type="text" size="20" name="admin_mail_address" value="" style="ime-mode: disabled;"/></td>
</tr>
<tr>
<th class="nobottom">パスワード</th>
<td width="60%" class="nobottom"><input type="password" size="20" name="password" value="" style="ime-mode: disabled;"/></td>
</tr>
</table>
<p class="center"><input type="submit" value="ログイン"/></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>

<?php }
}
