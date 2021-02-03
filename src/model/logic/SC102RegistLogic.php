<?php
@session_start();
/**
 * SC102RegistLogic.php
 * 会員登録画面：会員登録ボタン(SC102Regist)押下
 */

// if (isset($_POST['mail'])) {
//     $_SESSION['RegistMail'] = $_POST['mail'];//入力された値をセッションに代入する
// }


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
if($mail == ""){
    $ok = false;
    $errors[] = "メールアドレスは入力が必須です。";
}

if($mail !== "" && strpos($mail, '@') == false){
    $ok = false;
    $errors[] = "メールアドレスの入力形式が不正です。正しい形式で入力してください。";
}

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
if($ok){
    /** データベース：顧客テーブルを検索 */
    $con = DBConnection::getConnection();
    $customerDAO = new CustomerDAO($con);
    $searchMail = $customerDAO->findOne($mail);
    $searchTelNo = $customerDAO->findOneTelNo($telNo);
    $con = null;

    if(isset($searchMail)){
        $ok = false;
        $errors[] = "入力いただいたメールアドレスはすでに登録済みです。";
    }
    if(isset($searchTelNo)){
        $ok = false;
        $errors[] = "入力いただいた電話番号はすでに登録済みです。";
    }
}


if($ok){
$customer = new Customer($mail, $password, $kana, $name, $telNo, $postCode, $address, $birthday);

$con = DBConnection::getConnection();
$customerDAO = new CustomerDAO($con);
$result = $customerDAO->insertOne($customer);
$con = null;
}


// エラーメッセージを表示
function errorMessage($errors){
    foreach ($errors as $error){
        echo $error. "<br>";
    }
    echo "<br>";
}


/** チェック状態により処理を振り分ける */

if($ok){
    $_SESSION["loginCustomer"] = serialize($customer); // ログイン情報をセッションに格納
    $loginCustomer = unserialize($_SESSION["loginCustomer"]);
    $nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」
}else{
    $nextView = "SC102CustomerRegistView"; // 次画面は「会員ログイン」
}
?>