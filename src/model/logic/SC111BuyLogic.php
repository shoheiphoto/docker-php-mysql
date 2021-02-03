<?php
@session_start();
/**
 * SC111BuyLogic.php
 * ようこそ画面：注文に進むボタン(SC111Buy)押下
 */

/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

/** 商品メニュー表示用検索フィールドの設定およびセッションへの格納 */
if(isset($_SESSION["findProductGroupCode"])){
    $findProductGroupCode = $_SESSION["findProductGroupCode"];
    $findKeyword = $_SESSION["findKeyword"];
}else{
    $findProductGroupCode = "";
    $findKeyword = "";
    $_SESSION["findProductGroupCode"] = $findProductGroupCode;
    $_SESSION["findKeyword"] = $findKeyword;
}

/** カートの生成およびセッションへの格納 */
if(isset($_SESSION["cart"])){
    $cart = unserialize($_SESSION["cart"]);
}else{
    $cart = new ProductStorage();
    $_SESSION["cart"] = serialize($cart);
}

/** 共通モジュール：商品メニュー用リスト作成 */
require_once("../model/logic/SC001ProductListCreate.php");

/** 次画面 */
$nextView = "SC201ProductSalesListView"; // 次画面は「商品メニュー」
?>