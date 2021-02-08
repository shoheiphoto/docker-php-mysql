<?php
@session_start();
/**
 * SC201FindLogic.php
 * 商品メニュー画面：検索ボタン(SC201Find)押下
 */


// ログイン情報 取得
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

// カート情報 取得
$cart = unserialize($_SESSION["cart"]);
// var_dump($cart);


$cart->sortProductItemList();

$_SESSION["cart"] = serialize($cart); // カート情報をセッションに格納


// カート画面 表示
$nextView = "SC202CartUpdateView";
?>