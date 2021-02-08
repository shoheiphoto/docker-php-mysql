<?php
@session_start();
/**
 * SC202ConfirmLogic.php
 * カート画面：注文確認ボタン(SC202Confirm)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);


/** 次画面 */
$nextView = "SC203BuyConfirmView"; // 次画面は「注文確認画面」

?>