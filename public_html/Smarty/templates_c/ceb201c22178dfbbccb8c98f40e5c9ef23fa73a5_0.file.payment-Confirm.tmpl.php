<?php
/* Smarty version 4.3.1, created on 2023-07-10 13:48:41
  from '/home/j2023b/public_html/Smarty/templates/payment-Confirm.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ab8da95bb564_63972805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ceb201c22178dfbbccb8c98f40e5c9ef23fa73a5' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/payment-Confirm.tmpl',
      1 => 1688964513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ab8da95bb564_63972805 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>お支払方法　確認</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

 
  <div class="container">

    <br>
    <a href="payment.php" style="font-size: 20px;">>戻る</a>
    <h1>お支払方法　確認</h1>
    
    <br>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
            <label class="form-check-label" for="flexRadioDefault1">
                クレジットカード
            </label>
      </div>
     
    <br>

   <form class="row g-3">
      <div class="col-md-4">
            <label for="validationDefault01" class="form-label">カード番号</label>
            <input type="text" class="form-control" name="card_mumber" id="validationDefault01" value=<?php echo $_smarty_tpl->tpl_vars['card_mumber']->value;?>
 disabled>
                  </div>
      <div class="col-md-4">
            <label for="validationDefault02" class="form-label">カード名義</label>
            <input type="text" class="form-control" name="card_name" id="validationDefault02" value=<?php echo $_smarty_tpl->tpl_vars['card_name']->value;?>
 disabled>  
                  </div>

      <p>

      <div class="col-md-4">
            <label for="validationCustom03" class="form-label" >期限</label>
            <input type="date" class="form-control" name="dead_line" id="validationDefault03" value=<?php echo $_smarty_tpl->tpl_vars['dead_line']->value;?>
 disabled> 
                  </div>

      <div class="col-md-4">
            <label for="validationDefault02" class="form-label">セキュリティーコード</label>
            <input type="text" class="form-control" name="security_cord" id="validationDefault04" value=<?php echo $_smarty_tpl->tpl_vars['security_cord']->value;?>
 disabled>
                  </div>

      <p>

        <div class="col-12" style="text-align: center;">
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
            <button class="btn btn-primary" type="submit">登録</button>
        </div>
    </form>
  </div>
  

    
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
