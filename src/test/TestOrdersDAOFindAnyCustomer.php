<?php
/*
 * TestOrdersDAOFindAnyCustomer.php
 * OrdersDAO findAnyCustomer() テスト
 */

require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/OrdersDAO.php");

print "OrdersDAO findAnyCustomer() テスト<br>";
$customerMail = "hanako@yamada.com";
print "customerMail=". $customerMail. "<br>";

$con = DBConnection::getConnection();
$ordersDAO = new OrdersDAO($con);
$vOrderList = $ordersDAO->findAnyCustomer($customerMail);

if(count($vOrderList) > 0){
    foreach ($vOrderList as $vOrders) {
        print"ordersNo=".          $vOrders->getOrdersNo();
        print", orderDate=".       $vOrders->getOrderDate();
        print", customerMail=".    $vOrders->getCustomerMail();
        print", customerName=".    $vOrders->getCustomerName();
        print", productGroupCode=".$vOrders->getProductGroupCode();
        print", productItemCode=". $vOrders->getProductItemCode();
        print", productItemName=". $vOrders->getProductItemName();
        print", quantity=".        $vOrders->getQuantity();
        print", unitName=".        $vOrders->getUnitName();
        print", productItemPrice=".$vOrders->getProductItemPrice();
        print", money=".           $vOrders->getMoney();
        print"<br>";
    }
}else{
    print "該当データなし<br>";
}

$con = null;

?>