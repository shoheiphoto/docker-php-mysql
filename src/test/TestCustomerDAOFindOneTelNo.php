<?php
/*
 * TestCustomerDAOFindOneTelNo.php
 * CustomerDAO findOneTelNo() テスト
 */

require_once ("../model/entity/Customer.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/CustomerDAO.php");

print "CustomerDAO findOneTelNo() テスト<br>";
$telNo = "0781001000";
print "telNo=". $telNo. "<br>";

$con = DBConnection::getConnection();

$customerDAO = new CustomerDAO($con);
$customer = $customerDAO->findOneTelNo($telNo);
if($customer == null){
    print"該当なし<br>";
}else{
    print"該当あり<br>";
    print"mail=". $customer->getMail();
    print", password=". $customer->getPassword();
    print", kana=". $customer->getKana();
    print", name=". $customer->getName();
    print", telNo=". $customer->getTelNo();
    print", postCode=". $customer->getPostCode();
    print", address=". $customer->getAddress();
    print", birthday=". $customer->getBirthday(). "<br>";
}

$con = null;

?>