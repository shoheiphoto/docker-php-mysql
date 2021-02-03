<?php @session_start();

require_once ("../model/entity/Customer.php");


?>

<!DOCTYPE html>
<html>
<head>
<title>サンプル</title>
</head>
<body>

<h2>店内のご案内</h2>
<hr/>

<?php

if(!isset($_SESSION["e"])){
    $customer = new Customer("hanako");
    $_SESSION["e"] = serialize($customer);

}
else{


}

require_once("Sample61.php");
?>

