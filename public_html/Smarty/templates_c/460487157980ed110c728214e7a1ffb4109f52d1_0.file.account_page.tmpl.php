<?php
/* Smarty version 4.3.1, created on 2023-07-18 15:03:52
  from '/home/j2023b/public_html/Smarty/templates/account_page.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64b62b485c3698_18055724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '460487157980ed110c728214e7a1ffb4109f52d1' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/account_page.tmpl',
      1 => 1689659918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64b62b485c3698_18055724 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウントページ</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/original/header.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="row">
            <div class="col-4">
                <img src="../image/タイトルロゴ.png" onclick="history.back()">
            </div>
            <div class="col-4">
                <div class="dropdown d-flex mt-2 h-75">
                    <button class="btn btn-light dropdown-toggle search-border-left-radius w-75" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="margin-right: 50%;">Dropdown button</span>
                    </button>
                    <ul class="dropdown-menu w-75" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    <button class="btn btn-primary search-border-right-radius" type="submit">検索</button>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-3" style="justify-content: end;">
                <button class="btn btn-primary rounded-pill me-2 mt-2 h-75" type="submit" style="width: 45%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    ログイン
                </button>
                <button class="btn btn-primary rounded-pill mt-2 h-75" type="submit" style="width: 45%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    カート
                </button>
            </div>
        </div>
    </header>

    <br>


   <div class="container" style="width: 700px;">

    <table class="table">
        
        <tr><th><h1>世界皇太子</h1> </th> <td style="text-align: right;"><button type="button" class="btn btn-primary">お問い合わせ</button></td></tr>

        <tr><td>基本情報</td> <td style="text-align: right;">
            <button type="button" class="btn btn-primary" >変更</button></td></tr>

        <tr><td>生年月日</td> <td style="text-align: right;"></td></tr>

        <tr><td>メールアドレス</td> <td style="text-align: right;"></td></tr>

        <tr><td>パスワード</p></td> <td style="text-align: right;"><small style="color: red;">＊安全のためパスワードは非表示です　</small>
            <button type="button" class="btn btn-primary" >変更</button></td></tr>

        <tr><td>クレジットカード</td> <td style="text-align: right;">
            <button type="button" class="btn btn-primary" >変更</button></td></tr>
    
        <tr><td><p style="margin-top: 40px;">お届け先の変更・追加</p></td>  <td style="text-align: right;">
            <button type="button" class="btn btn-primary" >変更</button>

            <br>
            <br>

            <button type="button" class="btn btn-primary" >追加</button></td>
        </tr>
      </table>

        <br>

        <div style="text-align: center;">
            <button type="button" class="btn btn-primary">退会</button>
        </div>
   </div>

    <?php echo '<script'; ?>
 src="../js/jquery-3.7.0.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
