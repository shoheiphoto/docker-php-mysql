<?php
@session_start();
/**
 * SC111RegistModify.php
 * 会員更新画面：会員更新ボタン(SC111Modify)押下
 */



$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$nextView = "SC103CustomerModifyView"; // 次画面は「会員更新画面」

?>