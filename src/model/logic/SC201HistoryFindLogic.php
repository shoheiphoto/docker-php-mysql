<?php
@session_start();
/**
 * SC201HistoryFindLogic.php
 * 商品メニュー画面：注文履歴を見るボタン(SC201HistoryFind)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);


$registDate = date("Ymd");


/** データベースを検索 */
$con = DBConnection::getConnection();
$ordersDAO = new OrdersDAO($con);
$ordersList = $ordersDAO->findAnyCustomer($loginCustomer->getMail());
$con = null;


// $sumQuantity = $ordersList->;



/** 次画面 */
$nextView = "SC211OrderHistoryView"; // 次画面は「商品メニュー」

?>