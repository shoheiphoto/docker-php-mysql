<?php
/*
 * TestOrderFavoriteDAOInsertOrder.php
 * OrderFavoriteDAO insertOrder() テスト
 */

require_once ("../model/entity/VOrderFavorite.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/OrderFavoriteDAO.php");

print "OrderFavoriteDAO insertOrder() テスト<br>";
$customerMail = "hanako@yamada.com";
$productGroupCode = "EW";
$productItemCode = "0002";
$registDate = "20210101";

$vOrderFavorite = new VOrderFavorite();
$vOrderFavorite->setCustomerMail($customerMail);
$vOrderFavorite->setProductGroupCode($productGroupCode);
$vOrderFavorite->setProductItemCode($productItemCode);
$vOrderFavorite->setRegistDate($registDate);

print $vOrderFavorite->getCustomerMail()
.", ".$vOrderFavorite->getProductGroupCode()
.", ".$vOrderFavorite->getProductItemCode()
.", ".$vOrderFavorite->getRegistDate()
."<br>";

$con = DBConnection::getConnection();
$orderFavoriteDAO = new OrderFavoriteDAO($con);
$result = $orderFavoriteDAO->insertOrder($vOrderFavorite);
if($result){
    print"成功<br>";
}else{
    print"失敗<br>";
}

$con = null;

?>