<?php
@session_start();
/**
 * SC103ModifyLogic.php
 * 会員更新画面：更新ボタン(SC103Modify)押下
 */

$loginCustomer = unserialize($_SESSION["loginCustomer"]);


/** セッションを取得 */
$mail = $_REQUEST["mail"];
$password = $_REQUEST["password1"];
$password2 = $_REQUEST["password2"];
$kana = $_REQUEST["kana"];
$name = $_REQUEST["name"];
$telNo = $_REQUEST["telNo"];
$postCode = $_REQUEST["postCode"];
$address = $_REQUEST["address"];
$birthday = $_REQUEST["birthday"];


$errors = [];

/** OKフラグ */
$ok = true;

/** 入力漏れや入力形式をチェック */

if($password == ""){
    $ok = false;
    $errors[] = "会員パスワードは入力が必須です。";
}

if($password2 == ""){
    $ok = false;
    $errors[] = "会員パスワード（再）は入力が必須です。";
}

if($password !== $password2){
    $ok = false;
    $errors[] = "会員パスワードと会員パスワード（再）の値が異なっています。";
}

if($kana == ""){
    $ok = false;
    $errors[] = "会員名（かな）は入力が必須です。";
}

if($name == ""){
    $ok = false;
    $errors[] = "会員名は入力が必須です。";
}

if($telNo == ""){
    $ok = false;
    $errors[] = "電話番号は入力が必須です。";
}

if($telNo !== "" && is_numeric($telNo) == false){
    $ok = false;
    $errors[] = "電話番号の入力形式が不正です。正しい形式で入力してください。";
}

if($postCode == ""){
    $ok = false;
    $errors[] = "郵便番号は入力が必須です。";
}

if($postCode !== "" && is_numeric($postCode) == false){
    $ok = false;
    $errors[] = "郵便番号の入力形式が不正です。正しい形式で入力してください。";
}

if($address == ""){
    $ok = false;
    $errors[] = "住所は入力が必須です。";
}

if($birthday == ""){
    $ok = false;
    $errors[] = "生年月日は入力が必須です。";
}



// すでに登録されているデータかどうかをチェックする。
// 完成してないかも
// if($ok){
//     /** データベース：顧客テーブルを検索 */
//     $con = DBConnection::getConnection();
//     $customerDAO = new CustomerDAO($con);
//     $searchTelNo = $customerDAO->findOneTelNo($telNo);
//     $con = null;

//     if(isset($searchTelNo)){
//         $ok = false;
//         $errors[] = "入力いただいた電話番号はすでに登録済みです。";
//     }
// }



$customer = new Customer($mail, $password, $kana, $name, $telNo, $postCode, $address, $birthday);

$con = DBConnection::getConnection();
$customerDAO = new CustomerDAO($con);
$result = $customerDAO->modifyOne($customer);
$con = null;







/** チェック状態により処理を振り分ける */

if($ok){
    $message = "会員登録情報を更新しました";
    $_SESSION["loginCustomer"] = serialize($customer); // ログイン情報をセッションに格納
    $loginCustomer = unserialize($_SESSION["loginCustomer"]);
    $nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」
}else{
    $nextView = "SC103CustomerModifyView"; // 次画面は「会員ログイン」
}

?>