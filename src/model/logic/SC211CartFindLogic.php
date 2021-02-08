<?php
@session_start();
/**
 * SC211CartFindLogic.php
 * 注文履歴画面：カートを見るボタン(SC211CartFind)押下
 */


// ログイン情報 取得
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

// カート情報 取得
$cart = unserialize($_SESSION["cart"]);
// var_dump($cart);

// カート画面 表示
$nextView = "SC202CartUpdateView";
?>