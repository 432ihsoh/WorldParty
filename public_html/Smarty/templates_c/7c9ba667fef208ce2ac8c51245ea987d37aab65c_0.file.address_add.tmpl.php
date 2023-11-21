<?php
/* Smarty version 4.3.1, created on 2023-07-19 10:19:10
  from '/home/j2023b/public_html/Smarty/templates/address_add.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64b73a0e4e1493_13308813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c9ba667fef208ce2ac8c51245ea987d37aab65c' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/address_add.tmpl',
      1 => 1689729528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64b73a0e4e1493_13308813 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お届け先の追加</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/sign_up.css" rel="stylesheet">
</head>

<body style="background-color: #F5F6F8;">
    <header>
       
    </header>

    <div class="container" style="width: 500px;">
        
        <div class="col text-center">
            <h1>お届け先の追加</h1>
        </div>

        <form class="row">

        <div class="row">
            <div class="col">
                <label" for="validationDefault01" class="form-label">性</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>

            <div class="col">
                <label" for="validationDefault01" class="form-label">名</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label" for="validationDefault01" class="form-label">生年月日</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label" for="validationDefault01" class="form-label">郵便番号</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label" for="validationDefault01" class="form-label">住所</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label" for="validationDefault01" class="form-label">電話番号</label>
                <input type="text" class="form-control" id="validationDefault01" required>
            </div>
        </div>

        <div><br></div>
       
        <div class="row">
        </div>
        <div style="text-align: center;">
            <button type="button" class="btn btn-primary rounded-pill" onclick="history.back()" style="width:35%;">戻る</button>
            <button type="submit" class="btn btn-primary rounded-pill" style="width:35%;">追加  </button>
            </div>

        </form>

    </div>


    <?php echo '<script'; ?>
 src="../js/jquery-3.7.0.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
