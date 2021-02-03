<?php
/*
 * TestOrdersDAOInsertOrder.php
 * OrdersDAO insertOrder() テスト
 */

require_once ("../model/entity/ProductStorage.php");
require_once ("../model/entity/ProductItem.php");
require_once ("../model/entity/Customer.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/OrdersDAO.php");

print "OrdersDAO insertOrders() テスト<br>";

$loginCustomer = new Customer(
    "hanako@yamada.com"
    , "hanako"
    , "やまだはなこ"
    , "山田花子"
    , "0781001234"
    , "6511234"
    , "兵庫県神戸市中央区一宮町1-12-3"
    , "19750310"
    );
print"loginCustomer<br>";
print $loginCustomer->getMail().", ".$loginCustomer->getPassword().", ".$loginCustomer->getKana();
print ", ".$loginCustomer->getName().", ".$loginCustomer->getTelNo().", ".$loginCustomer->getPostCode();
print ", ".$loginCustomer->getAddress().", ".$loginCustomer->getBirthday()."<br><br>";

$cart = new ProductStorage();
$productItemList = array();
$productItemList[0] = new ProductItem("AW", "0001", "ミネラルウォータ（500ml）", 80, 1);
$productItemList[1] = new ProductItem("BW", "0001", "黄金にんにく・10日分", 1200, 2);
$productItemList[2] = new ProductItem("CW", "0001", "食べる納豆キナーゼ・10日分", 600, 3);
$cart->setProductItemList($productItemList);
$cart->setSumQuantity(6);
$cart->setSumMoney(4280);
$cart->setOrderTax(428);
$cart->setOrderDate("20210103");
print"cart<br>";
print "税率=".$cart->getRITSU()."<br>";
foreach ($cart->getProductItemList() as $productItem){
    print "groupCode=".$productItem->getProductGroup_code();
    print ", itemCode=".$productItem->getCode();
    print ", name=".$productItem->getName();
    print ", price=".$productItem->getPrice();
    print ", stock=".$productItem->getStock();
    print "<br>";
}
print "SumQuantity=".$cart->getSumQuantity();
print ", SumMoney=".$cart->getSumMoney();
print ", OrderTax=".$cart->getOrderTax();
print ", OrderDate=".$cart->getOrderDate();
print "<br>";

$con = DBConnection::getConnection();
$ordersDAO = new OrdersDAO($con);
$con->beginTransaction();
$result = $ordersDAO->insertOrder($loginCustomer, $cart);
if($result){
    print"成功<br>";
    $con->commit();
}else{
    print"失敗<br>";
    $con->rollback();
}

$con = null;

?>