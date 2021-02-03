<?php
@session_start();
/**
 * SC103ReturnLogic.php
 * 会員更新画面：戻る(SC103Return)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」

?>