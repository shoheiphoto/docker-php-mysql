<?php
@session_start();
/**
 * SC201CartSubtractLogic.php
 * 商品メニュー画面：検索ボタン(SC201CartSubtract)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);


$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];



$productItem = new ProductItem($productGroupCode, $productItemCode, $productItemName, $productItemPrice, -1, 0, "");
$cart = unserialize($_SESSION["cart"]);
$cart->addProduct($productItem);





$_SESSION["cart"] = serialize($cart); // カート情報をセッションに格納


/** 共通モジュール：商品メニュー用リスト作成 */
require_once("../model/logic/SC001ProductListCreate.php");


/** 次画面 */
$nextView = "SC201ProductSalesListView"; // 次画面は「商品メニュー」

?>