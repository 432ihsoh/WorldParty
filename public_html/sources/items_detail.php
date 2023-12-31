<?php
/*!
@file items_detail.php
@brief 商品詳細
@copyright Copyright (c) 2021 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$item_id = 0;
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
	$item_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['item_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['item_id'])
	&& $_POST['item_id'] > 0){
	$item_id = $_POST['item_id'];
}
//メンバークラスを構築
$item_obj = new citems();
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
	if($item_id > 0){
		if(($_POST = $item_obj->get_tgt(false,$item_id)) === false){
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
	if(ccontentsutil::chkset_err_field($err_array,'item_description','商品詳細文','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'item_keyword','商品キーワード','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'item_price','価格','isset_nl')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'category_id','カテゴリ','isset_nl')){
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
	global $item_id;
	$dataarr = array();
	$dataarr['item_id'] = (string)$_POST['item_id'];
	$dataarr['item_name'] = (string)$_POST['item_name'];
	$dataarr['item_description'] = (string)$_POST['item_description'];
	$dataarr['item_keyword'] = (string)$_POST['item_keyword'];
	$dataarr['item_price'] = (int)$_POST['item_price'];
	$dataarr['category_id'] = (int)$_POST['category_id'];

	
	$chenge = new cchange_ex();
	if($item_id > 0){
		$chenge->update(false,'items',$dataarr,'item_id=' . $item_id);
		
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $item_id);
	}
	else{
		$mid = $chenge->insert(false,'items',$dataarr);
		
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
function echo_item_id(){
	global $item_id;
	echo $item_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品の出力(新規の場合は「新規」) 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_item_id_txt(){
	global $item_id;
	if($item_id <= 0){
		echo '新規';
	}
	else{
		echo $item_id;
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
function echo_item_description(){
	global $err_array;
	if(!isset($_POST['item_description']))$_POST['item_description'] = '';
	$tgt = new ctextbox('item_description',$_POST['item_description'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['item_description'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['item_description']) 
		. '</span>';
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品キーワードの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_item_keyword(){
	global $err_array;
	if(!isset($_POST['item_keyword']))$_POST['item_keyword'] = '';
	$tgt = new ctextbox('item_keyword',$_POST['item_keyword'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['item_keyword'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['item_keyword']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品の値段の出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_item_price(){
	global $err_array;
	if(!isset($_POST['item_price']))$_POST['item_price'] = '';
	$tgt = new ctextbox('item_price',$_POST['item_price'],'size="50"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['item_price'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['item_price']) 
		. '</span>';
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	カテゴリプルダウンの出力 修正
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_category_select(){
	global $err_array;
	if(!isset($_POST['category_id']))$_POST['category_id'] = 0;
	//カテゴリの一覧を取得
	$category_obj = new ccategory();
	$allcount = $category_obj->get_all_count(false);
	$category_rows = $category_obj->get_all(false,0,$allcount);
	$tgt = new cselect('category_id');
	$tgt->add(0,'選択してください',$_POST['category_id'] == 0);
	foreach($category_rows as $key => $val){
		$tgt->add($val['category_id'],$val['category_name'],$val['category_id'] == $_POST['category_id']);
	}
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['category_id'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['category_id']) 
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
	global $item_id;
	if($_POST['func'] == 'conf'){
		$button = '更新';
		if($item_id <= 0){
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
<title>商品詳細</title>
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
<h2>商品詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="contents">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="items_list.php<?php echo_page(); ?>">一覧に戻る</a><br />
<span class="red">＊</span>は必須項目
<table>
<tr>
<th>商品ID</th>
<td width="70%"><?php echo_item_id_txt(); ?></td>
</tr>
<tr>
<th>商品名<span class="red">＊</span></th>
<td width="70%"><?php echo_item_name(); ?></td>
</tr>
<tr>
<th>商品詳細文<span class="red">＊</span></th>
<td width="70%"><?php echo_item_description(); ?></td>
</tr>
<tr>
<th>キーワード</span></th>
<td width="70%"><?php echo_item_keyword(); ?></td>
</tr>
<tr>
<th>価格<span class="red">＊</span></th>
<td width="70%"><?php echo_item_price(); ?></td>
</tr>
<tr>
<th>カテゴリ<span class="red">＊</span></th>
<td width="70%"><?php echo_category_select(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="item_id" value="<?php echo_item_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
