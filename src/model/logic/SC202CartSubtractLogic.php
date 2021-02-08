<?php
@session_start();
/**
 * SC202CartSubtractLogic.php
 * カート画面：－ボタン(SC202CartSubtract)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$cart = unserialize($_SESSION["cart"]);


$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];


$productItem = new ProductItem($productGroupCode, $productItemCode, $productItemName, $productItemPrice, -1, 0, "");
$cart->addProduct($productItem);


$_SESSION["cart"] = serialize($cart); // カート情報をセッションに格納


/** 共通モジュール：商品メニュー用リスト作成 */
require_once("SC201FindLogic.php");


/** 次画面 */
$nextView = "SC202CartUpdateView"; // 次画面は「商品メニュー」

?>