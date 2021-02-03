<?php
@session_start();
/**
 * SC111LoginLogic.php
 * ログアウト画面：ログアウトボタン(SC111Logout)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$message = $loginCustomer->getName(). "様<br>ログアウトしました。<br>またのご利用をお待ちしております。";

unset($_SESSION['loginCustomer']);


$nextView = "SC101CustomerLoginView"; // 次画面は「会員ログイン」

?>