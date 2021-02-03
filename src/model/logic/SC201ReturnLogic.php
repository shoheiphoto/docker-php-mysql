<?php
@session_start();

/**
 * SC201ReturnLogic.php
 * 会員更新画面：戻る(SC201Return)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」

?>