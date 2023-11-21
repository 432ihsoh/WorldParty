<?php
/*!
@file orders_detail.php
@brief 注文詳細
@copyright Copyright (c) 2021 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$order_id = 0;
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
	$order_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['order_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['order_id'])
	&& $_POST['order_id'] > 0){
	$order_id = $_POST['order_id'];
}
//メンバークラスを構築
$order_obj = new corders();
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
	if($order_id > 0){
		if(($_POST = $order_obj->get_tgt(false,$order_id)) === false){
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
	if(ccontentsutil::chkset_err_field($err_array,'item_name','商品名','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'user_id','注文者ID','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'order_amount','金額','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'order_postal_code','郵便番号','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'order_address','郵便番号','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'order_date','注文日','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'confirm_id','配達状況','isset_nl')){
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
	global $order_id;
	$dataarr = array();
	$dataarr['user_id'] = (int)$_POST['user_id'];
	$dataarr['item_id'] = (int)$_POST['item_id'];
	$dataarr['item_name'] = (string)$_POST['item_name'];
	$dataarr['order_amount'] = (int)$_POST['order_amount'];
	$dataarr['order_postal_code'] = (string)$_POST['order_postal_code'];
	$dataarr['order_address'] = (string)$_POST['order_address'];
	$dataarr['order_date'] = $_POST['order_date'];
	$dataarr['confirm_id'] = (int)$_POST['confirm_id'];
	
	$chenge = new cchange_ex();
	if($order_id > 0){
		$chenge->update(false,'orders',$dataarr,'order_id=' . $order_id);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $order_id);
	}
	else{
		$mid = $chenge->insert(false,'orders',$dataarr);
		
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
@brief	注文IDの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_id(){
	global $order_id;
	echo $order_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	注文IDの出力(新規の場合は「新規」) 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_id_txt(){
	global $order_id;
	if($order_id <= 0){
		echo '新規';
	}
	else{
		echo $order_id;
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品idの名前の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_item_id(){
	global $err_array;
	if(!isset($_POST['item_id']))$_POST['item_id'] = '';
	$tgt = new ctextbox('item_id',$_POST['item_id'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['item_id'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['item_id']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品の名前の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_item_name(){
	global $err_array;
	if(!isset($_POST['item_name']))$_POST['item_name'] = '';
	$tgt = new ctextbox('item_name',$_POST['item_name'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['item_name'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['item_name']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品詳細の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_user_id(){
	global $err_array;
	if(!isset($_POST['user_id']))$_POST['user_id'] = '';
	$tgt = new ctextbox('user_id',$_POST['user_id'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['user_id'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['user_id']) 
		. '</span>';
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	金額の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_amount(){
	global $err_array;
	if(!isset($_POST['order_amount']))$_POST['order_amount'] = '';
	$tgt = new ctextbox('order_amount',$_POST['order_amount'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['order_amount'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['order_amount']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	郵便番号の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_postal_code(){
	global $err_array;
	if(!isset($_POST['order_postal_code']))$_POST['order_postal_code'] = '';
	$tgt = new ctextbox('order_postal_code',$_POST['order_postal_code'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['order_postal_code'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['order_postal_code']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	住所の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_address(){
	global $err_array;
	if(!isset($_POST['order_address']))$_POST['order_address'] = '';
	$tgt = new ctextbox('order_address',$_POST['order_address'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['order_address'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['order_address']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	注文日の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_order_date(){
	global $err_array;
	if(!isset($_POST['order_date']))$_POST['order_date'] = '';
	$tgt = new ctextbox('order_date',$_POST['order_date'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['order_date'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['order_date']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	カテゴリプルダウンの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_confirm_select(){
	global $err_array;
	if(!isset($_POST['confirm_id']))$_POST['confirm_id'] = 0;
	//カテゴリの一覧を取得
	$confirm_obj = new cconfirm();
	$allcount = $confirm_obj->get_all_count(false);
	$confirm_rows = $confirm_obj->get_all(false,0,$allcount);
	$tgt = new cselect('confirm_id');
	$tgt->add(0,'選択してください',$_POST['confirm_id'] == 0);
	foreach($confirm_rows as $key => $val){
		$tgt->add($val['confirm_id'],$val['confirm_name'],$val['confirm_id'] == $_POST['confirm_id']);
	}
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['confirm_id'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['confirm_id']) 
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
	global $order_id;
	if($_POST['func'] == 'conf'){
		$button = '更新';
		if($order_id <= 0){
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
<title>注文詳細</title>
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
<h2>注文詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="order_list.php<?php echo_page(); ?>">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>注文ID</th>
<td width="70%"><?php echo_order_id_txt(); ?></td>
</tr>
<tr>
<th>商品ID</th>
<td width="70%"><?php echo_item_id(); ?></td>
</tr>
<tr>
<th>商品名</th>
<td width="70%"><?php echo_item_name(); ?></td>
</tr>
<tr>
<th>注文者ID</th>
<td width="70%"><?php echo_user_id(); ?></td>
</tr>
<tr>
<th>金額</span></th>
<td width="70%"><?php echo_order_amount(); ?></td>
</tr>
<tr>
<th>郵便番号</th>
<td width="70%"><?php echo_order_postal_code(); ?></td>
</tr>
<tr>
<th>住所</th>
<td width="70%"><?php echo_order_address(); ?></td>
</tr>
<tr>
<th>注文日</th>
<td width="70%"><?php echo_order_date(); ?></td>
</tr>
<tr>
<th>配達状況</th>
<td width="70%"><?php echo_confirm_select(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="order_id" value="<?php echo_order_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
