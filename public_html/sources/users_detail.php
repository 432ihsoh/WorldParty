<?php
/*!
@file users_detail.php
@brief ユーザー詳細
@copyright Copyright (c) 2021 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$user_id = 0;
$err_array = array();
$err_flag = 0;

$page = 0;
if(isset($_GET['page']) 
	&& cutil::is_number($_GET['page'])
	&& $_GET['page'] > 0){
	$page = $_GET['page'];
}

if(isset($_GET['mid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['mid'])
	&& $_GET['mid'] > 0){
	$user_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['user_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['user_id'])
	&& $_POST['user_id'] > 0){
	$user_id = $_POST['user_id'];
}
//メンバークラスを構築
$user_obj = new cusers();
//配列にメンバーを$_POSTに取り出す
//すでにPOSTされていたら、DBからは取り出さない

if(isset($_POST['func'])){
	switch($_POST['func']){
		case 'set':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
			else{
				regist();
				//regist()内でリダイレクトするので
				//ここまで実行されればリダイレクト失敗
				$_POST['func'] = 'edit';
				//システムに問題のあるエラー
				$err_flag = 2;
			}
		case 'conf':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
		break;
		case 'edit':
			//戻るボタン。
		break;
		default:
			//通常はありえない
			echo '原因不明のエラーです。';
			exit;
		break;
	}
}
else{
	if($user_id > 0){
		if(($_POST = $user_obj->get_tgt(false,$user_id)) === false){
			$_POST['func'] = 'new';
		}
		else{
			$_POST['func'] = 'edit';
		}
	}
	else{
		//新規の入力フォーム
		$_POST['func'] = 'new';
	}
}

/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////

//--------------------------------------------------------------------------------------
/*!
@brief	エラー存在の表示
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_err_flag(){
	global $err_flag;
	switch($err_flag){
		case 1:
		$str =<<<END_BLOCK

<p class="red">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
		echo $str;
		break;
		case 2:
		$str =<<<END_BLOCK

<p class="red">更新に失敗しました。サポートを確認下さい。</p>
END_BLOCK;
		echo $str;
		break;
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	パラメータのチェック
@return	エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
	global $err_array;
	$retflg = true;
	/// 各項目の存在と空白チェック
	if(ccontentsutil::chkset_err_field($err_array,'last_name','姓','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'first_name','名','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'user_mail_address','メールアドレス','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'user_password','パスワード','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'postal_code','郵便番号','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'user_address','住所','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'telephone_number','電話番号','isset_nl')){
		$retflg = false;
	}

	

	return $retflg;
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $user_id;
	$dataarr = array();
	$dataarr['user_id'] = (string)$_POST['user_id'];
	$dataarr['last_name'] = (string)$_POST['last_name'];
	$dataarr['first_name'] = (string)$_POST['first_name'];
	$dataarr['user_mail_address'] = (string)$_POST['user_mail_address'];
	$dataarr['user_password'] = (string)$_POST['user_password'];
	$dataarr['postal_code'] = (string)$_POST['postal_code'];
	$dataarr['user_address'] = (string)$_POST['user_address'];
	$dataarr['telephone_number'] = (string)$_POST['telephone_number'];
	
	
	$chenge = new cchange_ex();
	if($user_id > 0){
		$chenge->update(false,'users',$dataarr,'user_id=' . $user_id);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $user_id);
	}
	else{
		$mid = $chenge->insert(false,'users',$dataarr);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $mid);
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	ページの出力(一覧に戻るリンク用)
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_page(){
	global $page;
	if($page > 0){
		echo '?page=' . $page;
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーIDの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_id(){
	global $user_id;
	echo $user_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	ユーザーIDの出力(新規の場合は「新規」) 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_id_txt(){
	global $user_id;
	if($user_id <= 0){
		echo '新規';
	}
	else{
		echo $user_id;
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	ユーザーの苗字の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_last_name(){
	global $err_array;
	if(!isset($_POST['last_name']))$_POST['last_name'] = '';
	$tgt = new ctextbox('last_name',$_POST['last_name'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['last_name'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['last_name']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	ユーザーの名前の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_first_name(){
	global $err_array;
	if(!isset($_POST['first_name']))$_POST['first_name'] = '';
	$tgt = new ctextbox('first_name',$_POST['first_name'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['first_name'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['first_name']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	ユーザーのメールアドレスの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_mail_address(){
	global $err_array;
	if(!isset($_POST['user_mail_address']))$_POST['user_mail_address'] = '';
	$tgt = new ctextbox('user_mail_address',$_POST['user_mail_address'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['user_mail_address'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['user_mail_address']) 
		. '</span>';
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief	パスワードの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_password(){
	global $err_array;
	if(!isset($_POST['user_passwordd']))$_POST['user_password'] = '';
	$tgt = new ctextbox('user_password',$_POST['user_password'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['user_password'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['user_password']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	郵便番号の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_postal_code(){
	global $err_array;
	if(!isset($_POST['postal_code']))$_POST['postal_code'] = '';
	$tgt = new ctextbox('postal_code',$_POST['postal_code'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['postal_code'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['postal_code']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	住所の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_address(){
	global $err_array;
	if(!isset($_POST['user_address']))$_POST['user_address'] = '';
	$tgt = new ctextbox('user_address',$_POST['user_address'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['user_address'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['user_address']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	電話番号の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_telephone_number(){
	global $err_array;
	if(!isset($_POST['telephone_number']))$_POST['telephone_number'] = '';
	$tgt = new ctextbox('telephone_number',$_POST['telephone_number'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['telephone_number'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['telephone_number']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------

/*!
@brief	操作ボタンの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_switch(){
	global $user_id;
	if($_POST['func'] == 'conf'){
		$button = '更新';
		if($user_id <= 0){
			$button = '追加';
		}
		$str =<<<END_BLOCK
<input type="button"  value="戻る" onClick="javascript:set_func_form('edit','')"/>&nbsp;
<input type="button"  value="{$button}" onClick="javascript:set_func_form('set','')"/>
END_BLOCK;
	}
	else{
		$str =<<<END_BLOCK
<input type="button"  value="確認" onClick="javascript:set_func_form('conf','')"/>
END_BLOCK;
	}
	echo $str;
}

?>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>ユーザー詳細</title>
<script type="text/javascript">
<!--
function set_func_form(fn,pm){
	document.form1.target = "_self";
	document.form1.func.value = fn;
	document.form1.param.value = pm;
	document.form1.submit();
}


// -->
</script>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php require_once("gmenu.php"); ?>
<div id="headTitle">
<h2>ユーザー詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="users_list.php<?php echo_page(); ?>">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>ユーザーID</th>
<td width="70%"><?php echo_user_id_txt(); ?></td>
</tr>
<tr>
<th>姓<span class="red">＊</span></th>
<td width="70%"><?php echo_last_name(); ?></td>
</tr>
<tr>
<th>名<span class="red">＊</span></th>
<td width="70%"><?php echo_first_name(); ?></td>
</tr>
<tr>
<th>メールアドレス<span class="red">＊</span></th>
<td width="70%"><?php echo_user_mail_address(); ?></td>
</tr>
<tr>
<th>パスワード<span class="red">＊</span></th>
<td width="70%"><?php echo_user_password(); ?></td>
</tr>
<tr>
<th>郵便番号<span class="red">＊</span></th>
<td width="70%"><?php echo_postal_code(); ?></td>
</tr>
<tr>
<th>住所<span class="red">＊</span></th>
<td width="70%"><?php echo_user_address(); ?></td>
</tr>
<tr>
<th>電話番号<span class="red">＊</span></th>
<td width="70%"><?php echo_telephone_number(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="user_id" value="<?php echo_user_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
