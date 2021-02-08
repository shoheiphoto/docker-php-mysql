<?php
@session_start();
/**
 * SC201FavoriteFindLogic.php
 * 商品メニュー画面：お気に入りを見るボタン(SC201FavoriteFind)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);
$cart = unserialize($_SESSION["cart"]);


// お気に入り追加, 削除処理
$con = DBConnection::getConnection();
$orderFavoriteDAO = new OrderFavoriteDAO($con);
$orderFavoriteList = $orderFavoriteDAO->findAnyCustomer($loginCustomer->getMail());
$con = null;


/** 次画面 */
$nextView = "SC212FavoriteListView"; // 次画面は「商品メニュー」

?>