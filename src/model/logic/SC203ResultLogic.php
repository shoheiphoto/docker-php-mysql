<?php
@session_start();
/**
 * SC203ResultLogic.php
 * 注文確認画面：注文確定ボタン(SC203Result)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);


/** データベース：顧客テーブルを検索 */
$con = DBConnection::getConnection();
$ordersDAO = new OrdersDAO($con);
$result = $ordersDAO->insertOrder($loginCustomer, $cart);
$con = null;



$_SESSION["cart"] = serialize($cart);


/** 次画面 */
$nextView = "SC204BuyResultView"; // 次画面は「注文画面」

?>