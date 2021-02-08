<?php
@session_start();
/**
 * SC201FavoriteLogic.php
 * お気に入り追加, 削除(SC201Favorite)を押下
 */

// ログイン情報, カート情報 取得
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);

$productGroupCode = $_REQUEST["productGroupCode"];
$productItemCode = $_REQUEST["productItemCode"];
$productItemName = $_REQUEST["productItemName"];
$productItemPrice = $_REQUEST["productItemPrice"];

$registDate = date("Ymd");

$vOrderFavorite = new VOrderFavorite(
    $loginCustomer->getMail(),
    $loginCustomer->getName(),
    $productGroupCode,
    "",
    "",
    $productItemCode,
    $productItemName,
    $productItemPrice,
    $registDate);

// お気に入り追加, 削除処理
$con = DBConnection::getConnection();
$orderFavoriteDAO = new OrderFavoriteDAO($con);
$orderFavoriteDAO->insertDeleteOrder($vOrderFavorite);
$con = null;



// 共通モジュール ： 商品メニューリスト表示
require_once("../model/logic/SC001ProductListCreate.php");

$nextView = "SC212FavoriteListView";
?>