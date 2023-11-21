<?php
/* Smarty version 4.3.1, created on 2023-07-10 13:45:24
  from '/home/j2023b/public_html/Smarty/templates/registration.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ab8ce4b71de3_34875110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '921612cbee7507700d815685f4da3c08c95b25d2' => 
    array (
      0 => '/home/j2023b/public_html/Smarty/templates/registration.tmpl',
      1 => 1688963969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ab8ce4b71de3_34875110 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/original/registration.css" rel="stylesheet">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>
    <link href="css/takumi-design.css/change-Password.css" rel="stylesheet">
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
    <form action="register_Confirmation.php" method="post" class="row g-3">

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">性<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="last_name" id="validationCustom01" required>


        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">名<a style="color: red;">*</a></label>
            <input type="text" class="form-control" name="first_name" id="validationCustom02" required>

        </div>
        <a>生年月日<span style="color: red;">*</span>
        <div class="parent">
                <div>
                 <select name="year" required>
                    <option value="">-</option>
                    <option value="1900">1900</option>
                    <option value="1901">1901</option>
                    <option value="1902">1902</option>
                    <option value="1903">1903</option>
                    <option value="1904">1904</option>
                    <option value="1905">1905</option>
                    <option value="1906">1906</option>
                    <option value="1907">1907</option>
                    <option value="1908">1908</option>
                    <option value="1909">1909</option>
                    <option value="1910">1910</option>
                    <option value="1911">1911</option>
                    <option value="1912">1912</option>
                    <option value="1913">1913</option>
                    <option value="1914">1914</option>
                    <option value="1915">1915</option>
                    <option value="1916">1916</option>
                    <option value="1917">1917</option>
                    <option value="1918">1918</option>
                    <option value="1919">1919</option>
                    <option value="1920">1920</option>
                    <option value="1921">1921</option>
                    <option value="1922">1922</option>
                    <option value="1923">1923</option>
                    <option value="1924">1924</option>
                    <option value="1925">1925</option>
                    <option value="1926">1926</option>
                    <option value="1927">1927</option>
                    <option value="1928">1928</option>
                    <option value="1929">1929</option>
                    <option value="1930">1930</option>
                    <option value="1931">1931</option>
                    <option value="1932">1932</option>
                    <option value="1933">1933</option>
                    <option value="1934">1934</option>
                    <option value="1935">1935</option>
                    <option value="1936">1936</option>
                    <option value="1937">1937</option>
                    <option value="1938">1938</option>
                    <option value="1939">1939</option>
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                 </select>年
                </div>
                <div>

                    <select name="month" required>
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>月
                </div>
                <div>
                    <select name="day" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>日
                </div>
         </div>
        </a>

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
