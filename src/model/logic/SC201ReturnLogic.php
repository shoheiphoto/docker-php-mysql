<?php
@session_start();

/**
 * SC201ReturnLogic.php
 * 商品メニュー画面：戻る(SC201Return)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);

$nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」

?>