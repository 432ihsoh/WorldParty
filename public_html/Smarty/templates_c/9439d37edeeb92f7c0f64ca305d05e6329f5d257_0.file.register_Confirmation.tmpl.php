<?php
/* Smarty version 4.3.1, created on 2023-07-06 13:38:49
  from '/home/j2023b/public_html/Smarty/templates/register_Confirmation.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64a64559231648_72289270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9439d37edeeb92f7c0f64ca305d05e6329f5d257' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/register_Confirmation.tmpl',
      1 => 1688618322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a64559231648_72289270 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録の確認</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/original/registration.css" rel="stylesheet">

</head>
<body style="background-color: #F5F6F8;">

 <div class="container">
             <h2 style="text-align: center;">新規登録の確認</h2>
        <br>

    <form class="row g-3 ">

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label" name="last_name">性<a style="color: red;">*</a></label>
            <input type="text" class="form-control" id="validationCustom01" value= <?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
 disabled>
                               
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label" name="first_name">名<a style="color: red;">*</a></label>
            <input type="text" class="form-control" id="validationCustom02" value=<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
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
