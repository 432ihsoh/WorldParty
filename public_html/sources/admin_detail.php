<?php
/*!
@file admin_detail.php
@brief ユーザー詳細
@copyright Copyright (c) 2021 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$admin_id = 0;
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
	$admin_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['admin_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['admin_id'])
	&& $_POST['admin_id'] > 0){
	$admin_id = $_POST['admin_id'];
}
//メンバークラスを構築
$admin_obj = new cadmins();
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
	if($admin_id > 0){
		if(($_POST = $admin_obj->get_tgt(false,$admin_id)) === false){
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
	if(ccontentsutil::chkset_err_field($err_array,'admin_name','名前','isset_nl')){
		$retflg = false;
	}

	if(ccontentsutil::chkset_err_field($err_array,'admin_mail_address','メールアドレス','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'admin_password','パスワード','isset_nl')){
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
	global $admin_id;
	$dataarr = array();
	$dataarr['admin_id'] = (string)$_POST['admin_id'];
	$dataarr['admin_name'] = (string)$_POST['admin_name'];
	$dataarr['admin_mail_address'] = (string)$_POST['admin_mail_address'];
	$dataarr['admin_password'] = (string)$_POST['admin_password'];
	
	
	$chenge = new cchange_ex();
	if($admin_id > 0){
		$chenge->update(false,'admins',$dataarr,'admin_id=' . $admin_id);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $admin_id);
	}
	else{
		$mid = $chenge->insert(false,'admins',$dataarr);
		
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
@brief	管理者IDの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_admin_id(){
	global $admin_id;
	echo $admin_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	ユーザーIDの出力(新規の場合は「新規」) 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_admin_id_txt(){
	global $admin_id;
	if($admin_id <= 0){
		echo '新規';
	}
	else{
		echo $admin_id;
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	管理者名前の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_admin_name(){
	global $err_array;
	if(!isset($_POST['admin_name']))$_POST['admin_name'] = '';
	$tgt = new ctextbox('admin_name',$_POST['admin_name'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['admin_name'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['admin_name']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	管理者のメールアドレスの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_admin_mail_address(){
	global $err_array;
	if(!isset($_POST['admin_mail_address']))$_POST['admin_mail_address'] = '';
	$tgt = new ctextbox('admin_mail_address',$_POST['admin_mail_address'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['admin_mail_address'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['admin_mail_address']) 
		. '</span>';
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief	パスワードの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_admin_password(){
	global $err_array;
	if(!isset($_POST['admind_password']))$_POST['admin_password'] = '';
	$tgt = new ctextbox('admin_password',$_POST['admin_password'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['admin_password'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['admin_password']) 
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
	global $admin_id;
	if($_POST['func'] == 'conf'){
		$button = '更新';
		if($admin_id <= 0){
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
<title>管理者詳細</title>
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
<h2>管理者詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="admin_list.php<?php echo_page(); ?>">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>管理者ID</th>
<td width="70%"><?php echo_admin_id_txt(); ?></td>
</tr>
<tr>
<th>管理者名<span class="red">＊</span></th>
<td width="70%"><?php echo_admin_name(); ?></td>
</tr>
<tr>
<th>メールアドレス<span class="red">＊</span></th>
<td width="70%"><?php echo_admin_mail_address(); ?></td>
</tr>
<tr>
<th>パスワード<span class="red">＊</span></th>
<td width="70%"><?php echo_admin_password(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="admin_id" value="<?php echo_admin_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
