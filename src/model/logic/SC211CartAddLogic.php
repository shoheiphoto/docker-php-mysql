<?php
@session_start();
/**
 * SC211CartAddLogic.php
 * 注文履歴画面：＋ボタン(SC211CartAdd)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$cart = unserialize($_SESSION["cart"]);


$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];


$productItem = new ProductItem($productGroupCode, $productItemCode, $productItemName, $productItemPrice, 1, 0, "");
$cart->addProduct($productItem);



/** データベースを検索 */
$con = DBConnection::getConnection();
$ordersDAO = new OrdersDAO($con);
$ordersList = $ordersDAO->findAnyCustomer($loginCustomer->getMail());
$con = null;



$_SESSION["cart"] = serialize($cart); // カート情報をセッションに格納


/** 共通モジュール：商品メニュー用リスト作成 */
require_once("SC201FindLogic.php");


/** 次画面 */
$nextView = "SC211OrderHistoryView"; // 次画面は「商品メニュー」

?>