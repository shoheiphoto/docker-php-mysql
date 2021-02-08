<?php
@session_start();
/**
 * SC204LoginLogic.php
 * 注文完了画面：ログアウトボタン(SC204Logout)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$message = $loginCustomer->getName(). "様<br>ログアウトしました。<br>またのご利用をお待ちしております。";

$nextView = "SC190CustomerLogoutView"; // 次画面は「会員ログイン」

$_SESSION = array();

?>?>