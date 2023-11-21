<?php
/* Smarty version 4.3.1, created on 2023-07-12 09:43:31
  from '/home/j2023b/public_html/Smarty/templates/secession_confirm.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64adf733e602a3_48741723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d37d4e0b42d515b93cee9603d59eb0390313856' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/secession_confirm.tmpl',
      1 => 1689122561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64adf733e602a3_48741723 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldParty</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/secession.css" rel="stylesheet">
</head>

    <?php echo '<script'; ?>
 src="../js/jquery-3.7.0.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

    
    <h2 style="text-align: center; margin-top: 2%;">退会確認</h2>
   
    
    <div class="container">
        
        <P>アカウント名</P>
        <p></p>

        <P>メールアドレス</P>
        <P></P>
    </div>

    <br />

    <div style="text-align: center;">
    <P style="color: red;">*退会したアカウントを復旧することはできません</P>
    <input type="submit" class="btn btn-primary rounded-pill" onclick="location.href='secession_complete.php'" value="退会する" style="width: 10%;">
    </div>

</body>
</html>
<?php }
}
