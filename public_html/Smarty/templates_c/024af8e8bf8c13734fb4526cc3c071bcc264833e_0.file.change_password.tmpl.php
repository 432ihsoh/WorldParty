<?php
/* Smarty version 4.3.1, created on 2023-07-11 10:14:59
  from '/home/j2023b/public_html/Smarty/templates/change_password.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64acad136d7f72_77743227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '024af8e8bf8c13734fb4526cc3c071bcc264833e' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/change_password.tmpl',
      1 => 1689038094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64acad136d7f72_77743227 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>パスワード変更</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        <h2 style="text-align: center;">パスワード変更</h2>
        <br>

    <form class="row g-3 ">

      <div class="mb-3">
        <label for="inputPassword" class="form-label">既存パスワード<a style="color: red;">*</a></label>
        <div class="input-group">
        <input type="password" class="form-control" id="inputPassword" placeholder="パスワードを入力してください"/>
        <i id="eyeIcon" class="bi bi-eye translate-middle position-absolute top-50 end-0"></i>
        </div>
     </div>

     <div class="mb-3">
            <label for="inputPassword" class="form-label">新規パスワード<a style="color: red;">*</a></label>
            <div class="input-group">
            <input type="password" class="form-control" id="inputPassword2" placeholder="パスワードを入力してください"/>
            <i id="eyeIcon2" class="bi bi-eye translate-middle position-absolute top-50 end-0"></i>
            </div>
      </div>

        <a  href="#" style="text-align: right;">パスワードをお忘れですか？</a>

        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary rounded-pill" style="width:50%;">登録</button>
        </div>

    </form>
</div>


<?php echo '<script'; ?>
>
  //既存のパスワード表示,非常時
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


  //新規のパスワード表示,非常時
   // eyeIconのclickクリックイベント
   $("#eyeIcon2").on("click", () => {
    // eyeIconのclass切り替え
    $("#eyeIcon2").toggleClass("bi-eye-slash bi-eye");

  // inputのtype切り替え
  if ($("#inputPassword2").attr("type") == "password") {
      $("#inputPassword2").attr("type", "text");
  } else {
      $("#inputPassword2").attr("type", "password");
  }
  });
<?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
