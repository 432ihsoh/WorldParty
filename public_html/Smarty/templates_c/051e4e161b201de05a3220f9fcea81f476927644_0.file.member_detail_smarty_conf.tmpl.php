<?php
/* Smarty version 4.3.1, created on 2023-05-30 11:14:09
  from '/home/j2023b/public_html/Smarty/templates/member_detail_smarty_conf.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64755bf1c925a5_72912824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '051e4e161b201de05a3220f9fcea81f476927644' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/member_detail_smarty_conf.tmpl',
      1 => 1685408879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:gmenu.tmpl' => 1,
  ),
),false)) {
function content_64755bf1c925a5_72912824 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>メンバー詳細</title>

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
<h2>メンバー詳細(Smarty版)</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<?php echo $_smarty_tpl->tpl_vars['err_flag']->value;?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post" >
<a href="member_list_smarty.php<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>ID</th>
<td width="70%"><?php echo $_smarty_tpl->tpl_vars['member_id_txt']->value;?>
</td>
</tr>
<tr>
<th>メンバー名<span class="red">＊</span></th>
<td width="70%">
<strong><?php echo htmlspecialchars((string)$_POST['member_name'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
<input type="hidden" name="member_name" value="<?php echo htmlspecialchars((string)$_POST['member_name'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
</tr>
<tr>
<th>都道府県<span class="red">＊</span></th>
<td width="70%">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prefecture_rows']->value, 'value', false, 'k');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
if ($_smarty_tpl->tpl_vars['value']->value['prefecture_id'] == $_POST['prefecture_id']) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['value']->value['prefecture_name'];?>
</strong>
<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<input type="hidden" name="prefecture_id" value="<?php echo $_POST['prefecture_id'];?>
" />
</td>
</tr>
<tr>
<th>市区郡町村以下<span class="red">＊</span></th>
<td width="70%">
<strong><?php echo htmlspecialchars((string)$_POST['member_address'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
<input type="hidden" name="member_address"  value="<?php echo htmlspecialchars((string)$_POST['member_address'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
</tr>
<tr>
<th>性別<span class="red">＊</span></th>
<td width="70%">
<?php if ($_POST['member_gender'] == 1) {?>
<strong>男性</strong>
<?php } else { ?>
<strong>女性</strong>
<?php }?>
<input type="hidden" name="member_gender" value="<?php echo $_POST['member_gender'];?>
" />
</td>
</tr>
<tr>
<th>好きな果物</th>
<td width="70%">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fruits_rows']->value, 'value', false, 'k');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
if ($_smarty_tpl->tpl_vars['value']->value['check'] == 1) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['value']->value['fruits_name'];?>
</strong>&nbsp;
<input type="hidden" name="fruits[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['fruits_id'];?>
"  />
<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</td>
</tr>
<tr>
<th class="bobottom">コメント</th>
<td width="70%" class="bobottom">
<strong><?php echo nl2br((string) htmlspecialchars((string)$_POST['member_comment'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</strong>
<input type="hidden" name="member_comment" value="<?php echo htmlspecialchars((string)$_POST['member_comment'], ENT_QUOTES, 'UTF-8', true);?>
" />
</td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="member_id" value="<?php echo $_smarty_tpl->tpl_vars['member_id']->value;?>
" />
<p class="center">
<input type="button"  value="戻る" onClick="javascript:set_func_form('edit','')"/>&nbsp;
<input type="button"  value="<?php echo $_smarty_tpl->tpl_vars['button']->value;?>
" onClick="javascript:set_func_form('set','')"/>
</p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
<?php }
}
