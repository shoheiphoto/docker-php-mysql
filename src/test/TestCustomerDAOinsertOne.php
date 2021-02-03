<?php
/*
 * TestCustomerDAOInsertOne.php
 * CustomerDAO insertOne() テスト
 */

require_once ("../model/entity/Customer.php");
require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/CustomerDAO.php");

print "CustomerDAO insertOne() テスト<br>";
$mail = "shingo@katori.com";
$password = "shingo";
$kana = "かとりしんご";
$name = "香取慎吾";
$telNo = "0312345678";
$postCode = "1066108";
$address = "東京都港区六本木1-2-3";
$birthday = "19770131";
print"mail=". $mail;
print", password=". $password;
print", kana=". $kana;
print", name=". $name;
print", telNo=". $telNo;
print", postCode=". $postCode;
print", address=". $address;
print", birthday=". $birthday;
print"<br>";

$customer = new Customer($mail,$password,$kana,$name,$telNo,$postCode,$address,$birthday);

$con = DBConnection::getConnection();
$customerDAO = new CustomerDAO($con);
$result = $customerDAO->insertOne($customer);
if($result){
    print"成功<br>";
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