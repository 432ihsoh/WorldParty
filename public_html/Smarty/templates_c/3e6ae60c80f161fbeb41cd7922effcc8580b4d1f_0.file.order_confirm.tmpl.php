<?php
/* Smarty version 4.3.1, created on 2023-07-12 14:32:01
  from '/home/j2023b/public_html/Smarty/templates/order_confirm.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ae3ad1933b24_36164738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e6ae60c80f161fbeb41cd7922effcc8580b4d1f' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/order_confirm.tmpl',
      1 => 1689139912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ae3ad1933b24_36164738 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldParty</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/order_confirm.css" rel="stylesheet">
</head>
<body>

    <div class="container" style="width: 1000px;">
        <div class="row">
          <div class="col">
            <br>
            <h2>注文確認</h2>
          </div>

          <p></p>
          
    <!--商品１-->    
        <div class="row">
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0" >
                  <div class="col-md-4">
                    <img src="../image/アカウントロゴ.png" class="img-position" style="width: 5rem;"alt="">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <p class="card-text">￥</p>

                        <p class="card-text pulldown-size">
                          <select class="form-select font-size" id="exampleFormSelect1">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          </select>
                        </p>
                      
                    </div>
                  </div>
                </div>
              </div>
    <!--商品２--> 
              <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0" >
                      <div class="col-md-4">
                        <img src="../" class="img-position" style="width: 5rem;"alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text">￥</p>
                          <p class="card-text pulldown-size">
                            <select class="form-select font-size" id="exampleFormSelect1">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
    <!--注文テーブル-->
          <div class="col">
            <table class="table table-position">
              <thead>
                <tr>
                  <td>注文内容</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">小計　：</th>
                  <td>￥</td>
                </tr>
                <tr>
                  <th scope="row">配送料：</th>
                  <td style="width: auto;">￥</td>
                </tr>
                <tr>
                  <th scope="row" style="color: red;">請求額：</th>
                  <td>￥</td>
                </tr>
              </tbody>
            </table>
            <div style="margin-left: 100px;">
              <p>【キャンセルポリシー】
                <br>
                ・注文後のキャンセルはできません。
                <br>
                ・返品交換は７日以内まで受付けます。
              </p>
            </div>
          </div>
        </div>

        <p></p>

        <div style="text-align: center;">
          <p style="color: red;">以下の商品で注文を確定してもよろしいですか？</p>
        </div>

        
          <div class="row row-cols-4" style="text-align: center;">
            <div class="col"></div>

            <div class="col"><a class="btn btn-primary" href="#" role="button">買い物を続ける</a></div>
            <div class="col"><a class="btn btn-primary" href="#" role="button">注文を確定</a></div>

            <div class="col"></div>
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
