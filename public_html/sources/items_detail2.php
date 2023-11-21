<?php
/*!
@file items_detail2.php
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_adm.php");


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
@brief  ファイルアップエラーの取得
@param[in]  $upfile  イメージ変数名
@return エラー文字列
*/
//--------------------------------------------------------------------------------------
function get_upload_err($upfile){
	$str = '';
    switch($_FILES[$upfile]['error']){
        case 1:
        case 2:
            $str = "アップロードされたファイルサイズが上限を越えています。\n";
        break;
        case 3:
            $str = "アップロードされたファイルは一部しかアップロードされませんでした。\n";
        break;
        case 4:
            $str = "画像ファイルはアップロードされませんでした\n";
        break;
        case 6:
            $str = "テンポラリフォルダがありません。管理者に連絡して下さい。\n";
        break;
        case 7:
            $str = "テンポラリファイルへのディスク書き込みに失敗しました。管理者に連絡して下さい。\n";
        break;
        default:
            $str = "原因不明のエラーです。管理者に連絡して下さい。\n";
        break;
    }
    return $str;
}


//--------------------------------------------------------------------------------------
/*!
@brief  ファイルのアップロード
@param[in]  $imagefile  イメージ変数名
@param[in]  $pathext  アップロードを許可する拡張子名（ドットも含める。半角小文字で記述）
@param[in]  $subdir  サブディレクトリ('2017/')など
@param[in]  $headstr  先頭につける文字列
@return 成功すればtrue
*/
//--------------------------------------------------------------------------------------
function upload($imagefile,$pathext,$subdir,$headstr){
    global $err_array;
    global $CMS_FILEUP_DIR;
    if(!isset($_FILES[$imagefile]['name']) || $_FILES[$imagefile]['name'] == ""){
        return false;
    }
    if($_FILES[$imagefile]['error'] == 0){
        $ext_dot_str = strtolower(strrchr($_FILES[$imagefile]['name'],"."));
		$okflg = false;
		foreach($pathext as $key => $val){
			if($ext_dot_str == $val){
				$okflg = true;
				break;
			}
		}
		if(!$okflg){
			$err_array[$imagefile] = "アップロードファイルの種類が許可されてません";
			return false;
		}
        //保存されるファイル名は目的に合わせて変更する
        $datastr = $subdir . $headstr . date("YmdHis") . strrchr($_FILES[$imagefile]['name'],".");
        $uppath = $CMS_FILEUP_DIR . $datastr;
        if (!move_uploaded_file($_FILES[$imagefile]['tmp_name'],
            $uppath)) {
            $err_array[$imagefile] .= "アップロードに失敗しました";
            return false;
        }
        else{
            chmod($uppath,0646);
            //アップロードされたファイルをPOST変数に入れる
            //データベースに登録する場合は、この変数を使う
            $_POST[$imagefile] = $datastr;
            return true;
        }
    }
    else{
        $err_array[$imagefile] = get_upload_err($imagefile);
        return false;
    }
}



//--------------------------------------------------------------------------------------
/*!
@brief  エラー存在のアサイン
@return なし
*/
//--------------------------------------------------------------------------------------
function assign_err_flag(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $err_flag;
    $str = '';
    switch($err_flag){
        case 1:
        $str =<<<END_BLOCK

<p class="red">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
        break;
        case 2:
        $str =<<<END_BLOCK

<p class="red">更新に失敗しました。サポートを確認下さい。</p>
END_BLOCK;
        break;
    }
    $smarty->assign('err_flag',$str);
}

//--------------------------------------------------------------------------------------
/*!
@brief  パラメータのチェック
@return エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
    global $err_array;
    global $item_id;
    $retflg = true;
    /// メンバー名の存在と空白チェック
    if(ccontentsutil::chkset_err_field($err_array,'item_name','商品名','isset_nl')){
        $retflg = false;
    }
////////////////////////////////////////////////////////////
	/*
	if($member_id == 0 && $_POST['enc_password'] == ''){
		if(ccontentsutil::chkset_err_field($err_array,'enc_password','パスワード','isset_pass')){
			$retflg = false;
		}
		if(ccontentsutil::chkset_err_field($err_array,'enc_password_chk','パスワード確認','isset_pass')){
			$retflg = false;
		}
		else if($_POST['enc_password'] != $_POST['enc_password_chk']){
			$err_array['enc_password_chk'] = "「パスワード確認」が「パスワード」と違っています。";
			$retflg = false;
		}
	}
	if($member_id > 0 && $_POST['enc_password'] != ''){
		if(ccontentsutil::chkset_err_field($err_array,'enc_password','パスワード','isset_pass')){
			$retflg = false;
		}
		if(ccontentsutil::chkset_err_field($err_array,'enc_password_chk','パスワード確認','isset_pass')){
			$retflg = false;
		}
		else if($_POST['enc_password'] != $_POST['enc_password_chk']){
			$err_array['enc_password_chk'] = "「パスワード確認」が「パスワード」と違っています。";
			$retflg = false;
		}
	}
	

    /// メンバーの都道府県チェック
    if(ccontentsutil::chkset_err_field($err_array,'prefecture_id','都道府県','isset_num_range',1,47)){
        $retflg = false;
    }
    /// メンバー住所の存在と空白チェック
    if(ccontentsutil::chkset_err_field($err_array,'member_address','市区郡町村以下','isset_nl')){
        $retflg = false;
    }
    /// メンバーの性別チェック
    if(ccontentsutil::chkset_err_field($err_array,'member_gender','性別','isset_num_range',1,2)){
        $retflg = false;
    }
	*/

	//ファイルのアップロード
	//添付されてなくてもエラーは出さない
	$ext_arr = array();
	$ext_arr[] = '.jpg';
	$ext_arr[] = '.png';
	$subdir = '';
	upload('item_image',$ext_arr,$subdir,'main');

//print_r($err_array);

    return $retflg;
}



//--------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------
/*!
@brief  メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return なし
*/
//--------------------------------------------------------------------------------------
function regist(){
    global $item_id;
    $dataarr = array();

    $dataarr['item_name'] = (string)$_POST['item_name'];
    $dataarr['item_description'] = (string)$_POST['item_description'];
    $dataarr['item_price'] = (int)$_POST['item_price'];
    
    $dataarr['item_image'] = (string)$_POST['item_image'];
    $chenge = new cchange_ex();
    if($item_id > 0){
        $chenge->update(false,'item',$dataarr,'item_id=' . $item_id);
        cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $item_id);
    }
    else{
        $mid = $chenge->insert(false,'item',$dataarr);
        cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $mid);
    }
}
//--------------------------------------------------------------------------------------
/*!
@brief  ページの出力(一覧に戻るリンク用)
@return なし
*/
//--------------------------------------------------------------------------------------
function assign_page(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $page;
    $pagestr = '';
    if($page > 0){
        $pagestr =  '?page=' . $page;
    }
    $smarty->assign('page',$pagestr);
}

//--------------------------------------------------------------------------------------
/*!
@brief  商品IDのアサイン
@return なし
*/
//--------------------------------------------------------------------------------------
function assign_item_id(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $item_id;
    $smarty->assign('item_id',$item_id);
}

//--------------------------------------------------------------------------------------
/*!
@brief  商品IDのアサイン(新規の場合は「新規」)
@return なし
*/
//--------------------------------------------------------------------------------------
function assign_item_id_txt(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $item_id;
    if($item_id <= 0){
        $smarty->assign('item_id_txt','新規');
    }
    else{
        $smarty->assign('item_id_txt',$item_id);
    }
}
/*
//--------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------
function assign_item_description(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $item_id;
    $smarty->assign('item_description',$item_description);
}
//--------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------
function assign_item_price(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $item_id;
    $smarty->assign('item_price',$item_price);
}
//--------------------------------------------------------------------------------------
*/

/*!
@brief  イメージディレクトリのアサイン
@return なし
*/
//--------------------------------------------------------------------------------------
function assign_updir(){
    //$smartyをグローバル宣言（必須）
    global $smarty;
    global $CMS_FILEUP_DIR;
    $smarty->assign('updir',$CMS_FILEUP_DIR);
}


//--------------------------------------------------------------------------------------



/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
if(!isset($_POST['item_name']))$_POST['item_name'] = '';
if(!isset($_POST['item_description']))$_POST['item_description'] = '';
if(!isset($_POST['item_price']))$_POST['item_price'] = '';

if(!isset($_POST['item_image']))$_POST['item_image'] = '';
assign_err_flag();
assign_page();
assign_item_id();
assign_item_id_txt();
//assign_item_description();
//assign_item_price();

assign_updir();

$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
    $button = '更新';
    if($item_id <= 0){
        $button = '追加';
    }
    $smarty->assign('button',$button);
    $smarty->display('items_detail_conf2.tmpl');
}
else{
    $smarty->display('items_detail2.tmpl');
}
?>
