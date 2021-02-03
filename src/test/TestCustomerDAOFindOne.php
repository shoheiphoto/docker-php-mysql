<?php
/*
 * TestCustomerDAOFindOne.php
 * CustomerDAO findOne() テスト
 */

require_once ("../model/entity/Customer.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/CustomerDAO.php");

$date = date("Ymd");
print "CustomerDAO findOne() テスト" . $date . "<br>";
$mail = "hanako@yamada.com";
print "mail=". $mail. "<br>";

$con = DBConnection::getConnection();

$customerDAO = new CustomerDAO($con);
$customer = $customerDAO->findOne($mail);

print"mail=". $customer->getMail();
print", password=". $customer->getPassword();
print", kana=". $customer->getKana();
print", name=". $customer->getName();
print", telNo=". $customer->getTelNo();
print", postCode=". $customer->getPostCode();
print", address=". $customer->getAddress();
print", birthday=". $customer->getBirthday(). "<br>";

$con = null;

?>