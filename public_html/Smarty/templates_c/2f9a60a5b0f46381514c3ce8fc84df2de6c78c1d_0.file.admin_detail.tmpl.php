<?php
/* Smarty version 4.3.1, created on 2023-08-15 22:28:35
  from '/home/j2023b/public_html/Smarty/templates/admin_detail.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64db7d83eedf76_14966510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f9a60a5b0f46381514c3ce8fc84df2de6c78c1d' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/admin_detail.tmpl',
      1 => 1692106038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:gmenu.tmpl' => 1,
  ),
),false)) {
function content_64db7d83eedf76_14966510 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>管理者詳細</title>
<?php echo '<script'; ?>
 type="text/javascript">
<!--
function set_func_form(fn,pm){
    document.form1.target = "_self";
    document.form1.func.value = fn;
    document.form1.param.value = pm;
    document.form1.submit();
}


// -->
<?php echo '</script'; ?>
>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php $_smarty_tpl->_subTemplateRender('file:gmenu.tmpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="headTitle">
<h2>管理者詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<?php if ($_smarty_tpl->tpl_vars['err_flag']->value != '') {?>
<p ><?php echo $_smarty_tpl->tpl_vars['err_flag']->value;?>
</p>
<?php }?>
<form name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post" >
<a href="admin_list.php">一覧に戻る</a><br />
<table>
<tr>
<th>管理者ID</th>
<td width="70%"><?php echo $_smarty_tpl->tpl_vars['admin_id_txt']->value;?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td width="70%"><input type="text"   name="admin_mail_address" value="<?php echo htmlspecialchars((string)$_POST['admin_mail_address'], ENT_QUOTES, 'UTF-8', true);?>
"></td>
</tr>
<tr>
<th class="nobottom">管理者名</th>
<td class="nobottom" width="70%"><input type="text" name="admin_name" value="<?php echo htmlspecialchars((string)$_POST['admin_name'], ENT_QUOTES, 'UTF-8', true);?>
" ></td>
</tr>
<tr>
<th>パスワード</th>
<td width="70%"><input type="password"  name="enc_password" value="<?php echo htmlspecialchars((string)$_POST['enc_password'], ENT_QUOTES, 'UTF-8', true);?>
" ></td>
</tr>
<tr>
<th>パスワード確認</th>
<td width="70%"><input type="password"  name="enc_password_chk" value="<?php echo htmlspecialchars((string)$_POST['enc_password_chk'], ENT_QUOTES, 'UTF-8', true);?>
" ></td>
</tr>
</table>
<input type="hidden" name="func" value="conf" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="admin_id" value="<?php echo $_smarty_tpl->tpl_vars['admin_id']->value;?>
" />
<p class="center"><input type="submit" value="確認" /></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
<?php }
}
