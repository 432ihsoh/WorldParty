<?php
/* Smarty version 4.3.1, created on 2023-08-08 00:44:11
  from '/home/j2023b/public_html/Smarty/templates/sign_up.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64d1114be126b2_45510818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b6effa2154454f81f3df1fc4cd9664d3281b299' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/sign_up.tmpl',
      1 => 1691422942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d1114be126b2_45510818 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>

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
        <h1 style="text-align: center;">新規登録</h1>
        <br>
    <form action="sign_up_complete.php" method="post" class="row g-3">

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">性<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="last_name" id="validationCustom01" required>


        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">名<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="first_name" id="validationCustom02" required>

        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Eメールアドレス<a style="color: red;">*</a></label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>

        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">パスワード<a style="color: red;">*</a></label>
          <div class="input-group">
          <input type="password" class="form-control" name="password" id="inputPassword">
          <i id="eyeIcon" class="bi bi-eye translate-middle position-absolute top-50 end-0"></i>
          </div>
        </div>

        <div class="md-3">
            <label>郵便番号<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="mail_number" required>

        </div>
        <div class="mb-3">
            <label>住所<a style="color: red;">*</a></label>
            <input  class="form-control" name="address" required>
        </div>
        <div class="mb-3">
            <label>電話番号<a style="color: red;">*</a></label>
            <input  class="form-control" name="phone_number" required>
        </div>
        <div style="text-align: center;">
        <button type="submit" class="btn btn-primary rounded-pill" style="width:50%;">登録</button>
        </div>
      </form>
      <br>


<?php echo '<script'; ?>
>
  //パスワード表示,非常時 
  // eyeIconのclickクリックイベント
  $("#eyeIcon").on("click", () => {
    // eyeIconのclass切り替え
    $("#eyeIcon").toggleClass("bi-eye-slash bi-eye");

  // inputのtype切り替え
  if ($("#inputPassword").attr("type") == "password") {
      $("#inputPassword").attr("type", "text");
  } else {
      $("#inputPassword").attr("type", "password");
  }
  });
  
<?php echo '</script'; ?>
>



</body>
</html>
<?php }
}
