<?php
@session_start();
/**
 * SC111LoginLogic.php
 * ログアウト画面：ログアウトボタン(SC103Logout)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$message = $loginCustomer->getName(). "様<br>ログアウトしました。<br>またのご利用をお待ちしております。";


$nextView = "SC190CustomerLogoutView"; // 次画面は「会員ログアウト」

$_SESSION = array();


?>