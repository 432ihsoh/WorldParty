<?php
/*!
@file inquiries_detail.php
@brief お問合せ詳細
@copyright Copyright (c) 2021 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$inquiry_id = 0;
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
	$inquiry_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['inquiry_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['inquiry_id'])
	&& $_POST['inquiry_id'] > 0){
	$inquiry_id = $_POST['inquiry_id'];
}
//メンバークラスを構築
$inquiry_obj = new cinquiries();
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
	if($inquiry_id > 0){
		if(($_POST = $inquiry_obj->get_tgt(false,$inquiry_id)) === false){
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
	if(ccontentsutil::chkset_err_field($err_array,'inquiry_title','お問合せ名','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'inquiry_content','お問合せ詳細文','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'inquiry_mail_address','お問合せメールアドレス','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'inquiry_date','日付','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'comment','コメント','isset_nl')){
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
	global $inquiry_id;
	$dataarr = array();
	$dataarr['inquiry_id'] = (string)$_POST['inquiry_id'];
	$dataarr['inquiry_title'] = (string)$_POST['inquiry_title'];
	$dataarr['inquiry_mail_address'] = (string)$_POST['inquiry_mail_address'];
	$dataarr['inquiry_date'] = $_POST['inquiry_date'];
	$dataarr['comment'] = (string)$_POST['comment'];
	$dataarr['solve_id'] = (int)$_POST['solve_id'];
	
	$chenge = new cchange_ex();
	if($inquiry_id > 0){
		$chenge->update(false,'inquiries',$dataarr,'inquiry_id=' . $inquiry_id);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $inquiry_id);
	}
	else{
		$mid = $chenge->insert(false,'inquirys',$dataarr);
		
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
@brief	商品IDの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_id(){
	global $inquiry_id;
	echo $inquiry_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品の出力(新規の場合は「新規」) 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_id_txt(){
	global $inquiry_id;
	if($inquiry_id <= 0){
		echo '新規';
	}
	else{
		echo $inquiry_id;
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品の名前の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_title(){
	global $err_array;
	if(!isset($_POST['inquiry_title']))$_POST['inquiry_title'] = '';
	$tgt = new ctextbox('inquiry_title',$_POST['inquiry_title'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['inquiry_title'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['inquiry_title']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品詳細の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_content(){
	global $err_array;
	if(!isset($_POST['inquiry_content']))$_POST['inquiry_content'] = '';
	$tgt = new ctextbox('inquiry_content',$_POST['inquiry_content'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['inquiry_content'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['inquiry_content']) 
		. '</span>';
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品キーワードの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_mail_address(){
	global $err_array;
	if(!isset($_POST['inquiry_mail_address']))$_POST['inquiry_mail_address'] = '';
	$tgt = new ctextbox('inquiry_mail_address',$_POST['inquiry_mail_address'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['inquiry_mail_address'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['inquiry_mail_address']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品の値段の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_inquiry_date(){
	global $err_array;
	if(!isset($_POST['inquiry_date']))$_POST['inquiry_date'] = '';
	$tgt = new ctextbox('inquiry_date',$_POST['inquiry_date'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['inquiry_date'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['inquiry_date']) 
		. '</span>';
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	コメントの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_comment(){
	global $err_array;
	if(!isset($_POST['comment']))$_POST['comment'] = '';
	$tgt = new ctextbox('comment',$_POST['comment'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['comment'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['comment']) 
		. '</span>';
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	カテゴリプルダウンの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_solve_select(){
	global $err_array;
	if(!isset($_POST['solve_id']))$_POST['solve_id'] = 0;
	//カテゴリの一覧を取得
	$solve_obj = new csolve();
	$allcount = $solve_obj->get_all_count(false);
	$solve_rows = $solve_obj->get_all(false,0,$allcount);
	$tgt = new cselect('solve_id');
	$tgt->add(0,'選択してください',$_POST['solve_id'] == 0);
	foreach($solve_rows as $key => $val){
		$tgt->add($val['solve_id'],$val['solve_name'],$val['solve_id'] == $_POST['solve_id']);
	}
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['solve_id'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['solve_id']) 
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
	global $inquiry_id;
	if($_POST['func'] == 'conf'){
		$button = '更新';
		if($inquiry_id <= 0){
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
<title>お問合せ詳細</title>
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
<h2>お問合せ詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="inquiries_list.php<?php echo_page(); ?>">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>お問合せID</th>
<td width="70%"><?php echo_inquiry_id_txt(); ?></td>
</tr>
<tr>
<th>タイトル<span class="red">＊</span></th>
<td width="70%"><?php echo_inquiry_title(); ?></td>
</tr>
<tr>
<th>内容<span class="red">＊</span></th>
<td width="70%"><?php echo_inquiry_content(); ?></td>
</tr>
<tr>
<th>メールアドレス</span></th>
<td width="70%"><?php echo_inquiry_mail_address(); ?></td>
</tr>
<tr>
<th>日付<span class="red">＊</span></th>
<td width="70%"><?php echo_inquiry_date(); ?></td>
</tr>
<th>返信<span class="red">＊</span></th>
<td width="70%" class="bobottom"><?php echo_comment(); ?></td>
</tr>
<tr>
<th>解決<span class="red">＊</span></th>
<td width="70%"><?php echo_solve_select(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="inquiry_id" value="<?php echo_inquiry_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
