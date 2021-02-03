<?php
/*
 * TestProductDAOFindAny.php
 * ProductDAO findAny() テスト
 */

require_once ("../model/dao/DBConnection.php");
require_once ("../model/dao/ProductDAO.php");

print "ProductDAO findAny() テスト<br>";
$productGroup_code = "";
$keyword = "基";
print "productGroup_code=". $productGroup_code. ", keyword=". $keyword. "<br>";

$con = DBConnection::getConnection();
$productDAO = new ProductDAO($con);
$productList = $productDAO->findAny($productGroup_code, $keyword);

if(count($productList) > 0){
    foreach ($productList as $vProduct) {
        print"group_code=".$vProduct->getProductGroup()->getCode();
        print", group_name=".$vProduct->getProductGroup()->getName();
        print", unitName=".$vProduct->getProductGroup()->getUnitName();
        print", item_code=".$vProduct->getProductItem()->getCode();
        print", item_name=".$vProduct->getProductItem()->getName();
        print", price=".$vProduct->getProductItem()->getPrice();
        print", stock=".$vProduct->getProductItem()->getStock();
        print", orderPoint=".$vProduct->getProductItem()->getOrderPoint();
        print", caption=".$vProduct->getProductItem()->getCaption();
        print"<br>";
    }
}

$con = null;

?>