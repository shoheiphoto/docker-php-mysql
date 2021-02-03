<?php
/*
 * TestCustomerDAOModifyOne.php
 * CustomerDAO modifyOne() テスト
 */

require_once ("../model/entity/Customer.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/CustomerDAO.php");

print "CustomerDAO modifyOne() テスト<br>";
$mail = "shingo@katori.com";
$password = "passshingo";
$kana = "かとりしんごちゃん";
$name = "香取慎吾ちゃん";
$telNo = "0323456789";
$postCode = "1066109";
$address = "東京都港区六本木2-3-4";
$birthday = "19770130";

$con = DBConnection::getConnection();
$customerDAO = new CustomerDAO($con);

print"処理前<br>";
$customer = $customerDAO->findOne($mail);
print"mail=". $customer->getMail();
print", password=". $customer->getPassword();
print", kana=". $customer->getKana();
print", name=". $customer->getName();
print", telNo=". $customer->getTelNo();
print", postCode=". $customer->getPostCode();
print", address=". $customer->getAddress();
print", birthday=". $customer->getBirthday();
print"<br><br>";

print"変更指示データ<br>";
$customer = new Customer($mail,$password,$kana,$name,$telNo,$postCode,$address,$birthday);
print"mail=". $customer->getMail();
print", password=". $customer->getPassword();
print", kana=". $customer->getKana();
print", name=". $customer->getName();
print", telNo=". $customer->getTelNo();
print", postCode=". $customer->getPostCode();
print", address=". $customer->getAddress();
print", birthday=". $customer->getBirthday();
print"<br><br>";

$result = $customerDAO->modifyOne($customer);
if($result){
    print"成功後データ<br>";
    $customer = $customerDAO->findOne($mail);
    print"mail=". $customer->getMail();
    print", password=". $customer->getPassword();
    print", kana=". $customer->getKana();
    print", name=". $customer->getName();
    print", telNo=". $customer->getTelNo();
    print", postCode=". $customer->getPostCode();
    print", address=". $customer->getAddress();
    print", birthday=". $customer->getBirthday();
    print"<br>";
}else{
    print"失敗<br>";
}

$con = null;

?>