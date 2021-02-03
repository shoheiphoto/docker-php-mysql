<?php
/*
 * TestOrderFavoriteDAOFindAnyCustomer.php
 * OrderFavoriteDAO findAnyCustomer() テスト
 */

require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/OrderFavoriteDAO.php");
require_once ("../model/entity/VOrderFavorite.php");

print "OrderFavoriteDAO findAnyCustomer() テスト<br>";
$customerMail = "hanako@yamada.com";
print "customerMail=". $customerMail. "<br>";

$con = DBConnection::getConnection();
$orderFavoriteDAO = new OrderFavoriteDAO($con);
$vOrderFavoriteList = $orderFavoriteDAO->findAnyCustomer($customerMail);

if(count($vOrderFavoriteList) > 0){
    foreach ($vOrderFavoriteList as $vOrderFavorite) {
        print"customerMail=". $vOrderFavorite->getCustomerMail();
        print", productGroupCode=". $vOrderFavorite->getProductGroupCode();
        print", productItemCode=". $vOrderFavorite->getProductItemCode();
        print", registDate=". $vOrderFavorite->getRegistDate();
        print"<br>";
    }
}else{
    print "該当データなし<br>";
}

$con = null;

?>