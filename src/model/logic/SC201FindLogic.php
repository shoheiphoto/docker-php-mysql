<?php
@session_start();
/**
 * SC201FindLogic.php
 * 商品メニュー画面 : 検索ボタン(SC201Find)を押下
 */

// ログイン情報 取得
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

// カート情報 取得
$cart = unserialize($_SESSION["cart"]);

// 商品メニューリスト表示設定, セッション格納
if (isset($_REQUEST["productGroup"])) {
    $findProductGroupCode = $_REQUEST["productGroup"];
    $_SESSION["findProductGroupCode"] = $findProductGroupCode;
} else {
    $findProductGroupCode = $_SESSION["findProductGroupCode"];
}

if (isset($_REQUEST["keyword"])) {
    $findKeyword = $_REQUEST["keyword"];
    $_SESSION["findKeyword"] = $findKeyword;
} else {
    $findKeyword = $_SESSION["findKeyword"];
}
// var_dump($findProductGroupCode);

// 共通モジュール ： 商品メニューリスト表示
require_once("SC001ProductListCreate.php");

// 商品メニュー画面 表示
$nextView = "SC201ProductSalesListView";
?>
