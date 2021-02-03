<?php
@session_start();
/**
 * SC201FindLogic.php
 * 商品メニュー画面：検索ボタン(SC201Find)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$cart = unserialize($_SESSION["cart"]);




// $productItem = new ProductStorage();

// $productList = $cart->getProductItemList($productItem);























$_SESSION["cart"] = serialize($cart);

/** 次画面 */
$nextView = "SC202CartUpdateView"; // 次画面は「商品メニュー」

?>