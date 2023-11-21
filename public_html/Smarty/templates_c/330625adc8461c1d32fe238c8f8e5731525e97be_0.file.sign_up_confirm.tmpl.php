<?php
/* Smarty version 4.3.1, created on 2023-08-08 00:18:48
  from '/home/j2023b/public_html/Smarty/templates/sign_up_confirm.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64d10b58c01b75_71952282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '330625adc8461c1d32fe238c8f8e5731525e97be' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/sign_up_confirm.tmpl',
      1 => 1691421441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d10b58c01b75_71952282 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録の確認</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sign_up.css" rel="stylesheet">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>
    <link href="css/change_password.css" rel="stylesheet">
    <?php echo '<script'; ?>

      src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
      crossorigin="anonymous"
    ><?php echo '</script'; ?>
>
    

</head>
<body style="background-color: #F5F6F8;">

 <div class="container">
             <h2 style="text-align: center;">新規登録の確認</h2>
        <br>

    <form action="sign_up_complete.php" class="row g-3 ">

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">性<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="last_name" id="validationCustom01" value= <?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
 disabled>
                               
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">名<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="first_name" id="validationCustom02" value=<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
 disabled>

        </div>

        <a>生年月日<span style="color: red;">*</span>
        <div class="parent" style="width: 60%;">
            <input type="text" class="form-control" name="year"  value=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
 size="2" disabled >年
      
            <input type="text" class="form-control" name="month" value=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
 size="2" disabled>月

            <input type="text" class="form-control" name="day"  value= <?php echo $_smarty_tpl->tpl_vars['day']->value;?>
 size="2" disabled>日
            

        </div>
        </a>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Eメールアドレス<a style="color: red;">*</a></label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"  value=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 disabled>
       
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">パスワード<a style="color: red;">*</a></label>
          <div class="input-group">
          <input type="password" class="form-control" name="password" id="exampleInputPassword1"  value=<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
 disabled>
  
          </div>
        </div>

        <div class="md-3">
            <label>郵便番号<a style="color: red;">*</a></label>
            <input type="text" class="form-control"disabled name="mail_number"  value=<?php echo $_smarty_tpl->tpl_vars['mail_number']->value;?>
 disabled>
            
        </div>
        <div class="mb-3">
            <label>住所<a style="color: red;">*</a></label>
            <input  class="form-control" name="address"  value=<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
 disabled>
     

        </div>
        <div class="mb-3">
            <label>電話番号<a style="color: red;">*</a></label>
            <input  class="form-control" disabled name="phone_number"  value=<?php echo $_smarty_tpl->tpl_vars['phone_number']->value;?>
 disabled>
        
        </div>

        <div style="text-align: center;">
        <button type="button" class="btn btn-primary rounded-pill" onclick="history.back()" style="width:35%;">戻る</button>
        <button type="submit" class="btn btn-primary rounded-pill" style="width:35%;">登録</button>
        </div>

    </form>
</div>
      <br>


</body>
</html>
<?php }
}
