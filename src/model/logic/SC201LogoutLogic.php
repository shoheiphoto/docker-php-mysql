<?php
@session_start();
/**
 * SC202LoginLogic.php
 * 商品メニュー画面：ログアウトボタン(SC202Logout)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);

$message = $loginCustomer->getName(). "様<br>ログアウトしました。<br>またのご利用をお待ちしております。";

$nextView = "SC190CustomerLogoutView"; // 次画面は「会員ログイン」

$_SESSION = array();

?>