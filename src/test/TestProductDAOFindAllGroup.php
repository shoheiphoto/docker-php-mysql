<?php
/*
 * TestProductDAOFindAllGroup.php
 * ProductDAO findAllGroup() テスト
 */

require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/ProductDAO.php");

print "ProductDAO findAllGroup() テスト<br>";

$con = DBConnection::getConnection();
$productDAO = new ProductDAO($con);
$productGroupList = $productDAO->findAllGroup();

if(count($productGroupList) > 0){
    foreach ($productGroupList as $productGroup) {
        print"group_code=".$productGroup->getCode();
        print", group_name=".$productGroup->getName();
        print", unitName=".$productGroup->getUnitName();
        print"<br>";
    }
}

$con = null;

?>