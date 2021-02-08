<?php
@session_start();
/**
 * SC203BuyLogic.php
 * 注文確認画面：注文を続けるボタン(SC203Buy)押下
 */

/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);


/** 共通モジュール：商品メニュー用リスト作成 */
require_once("../model/logic/SC001ProductListCreate.php");

/** 次画面 */
$nextView = "SC201ProductSalesListView"; // 次画面は「商品メニュー」
?>