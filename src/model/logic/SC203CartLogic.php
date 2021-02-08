<?php
@session_start();
/**
 * SC203CartLogic.php
 * 注文確認画面：カートに戻るボタン(SC203Cart)押下
 */


// ログイン情報 取得
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
// カート情報 取得
$cart = unserialize($_SESSION["cart"]);

// カート画面 表示
$nextView = "SC202CartUpdateView";
?>