<?php
@session_start();
/**
 * SC190LoginLogic.php
 * ログアウト画面：ログインボタン(SC190Login)押下
 */

if (isset($_SESSION)){
    $_SESSION = array();
}

$nextView = "SC101CustomerloginView"; // 次画面は「ようこそ」

?>