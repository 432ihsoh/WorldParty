<?php
/* Smarty version 4.3.1, created on 2023-08-15 22:28:00
  from '/home/j2023b/public_html/Smarty/templates/user_login.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64db7d600e3161_51474415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ce354e567527d3d9fc9b3d0600908cad311e1e2' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/user_login.tmpl',
      1 => 1692106079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64db7d600e3161_51474415 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    
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
    
    <h1 style="text-align: center;">ログイン</h1>   
    <br>
    <p class="red"><?php echo nl2br((string) $_smarty_tpl->tpl_vars['ERR_STR']->value, (bool) 1);?>
</p>
   
    <form class="row g-3 " action="user_login.php" method="post">
        
        <div class="mb-3">  
            <label" for="validationDefault01" class="form-label">メールアドレス</label>
            <input type="text" class="form-control" id="validationDefault01" name="user_mail_address" placeholder="メールアドレスを入力してください" required>
        </div>

        <div class="mb-3">  
        <label" for="validationDefault01" class="form-label">パスワード</label>
        <div class="input-group">
            <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="パスワードを入力してください" required>
            <i id="eyeIcon2" class="bi bi-eye translate-middle position-absolute top-50 end-0"></i>
            </div>
    </div>

        <a  href="#" style="text-align: right;">パスワードをお忘れですか？</a>

        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary rounded-pill" style="width:50%;">ログイン</button>
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
