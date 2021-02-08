<?php
@session_start();
/**
 * SC204BuyLogic.php
 * 注文完了画面：再度注文をするボタン(SC204Buy)押下
 */

/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

unset($_SESSION["cart"]);


$cart = new ProductStorage();
$_SESSION["cart"] = serialize($cart);


/** 共通モジュール：商品メニュー用リスト作成 */
require_once("../model/logic/SC001ProductListCreate.php");


/** 次画面 */
$nextView = "SC201ProductSalesListView"; // 次画面は「商品メニュー」
?>