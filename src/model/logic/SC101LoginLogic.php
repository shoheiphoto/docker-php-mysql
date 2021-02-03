<?php
@session_start();
/**
 * SC101LoginLogic.php
 * 会員ログイン画面：ログインボタン(SC101Login)押下
 */

/** セッションを取得 */
$loginMail = $_REQUEST["loginMail"];
$loginPassword = $_REQUEST["loginPassword"];

/** OKフラグ */
$ok = true;

/** クライアントメッセージをチェック */
if($loginMail == null || $loginMail == ""){
    $ok = false;
    $message = "メールアドレスを入力してください。";
}
if($loginPassword == null || $loginPassword == ""){
    $ok = false;
    $message = "パスワードを入力してください。";
}

if($ok){
    /** データベース：顧客テーブルを検索 */
    $con = DBConnection::getConnection();
    $customerDAO = new CustomerDAO($con);
    $customer = $customerDAO->findOne($loginMail);
    $con = null;

    /** ログインチェック */
    if($customer == null){
        $ok = false;
        $message = "メールアドレスまたはパスワードが間違っています。";
    }else if($customer->getPassword() != $loginPassword){
        $ok = false;
        $message = "メールアドレスまたはパスワードが間違っています。";
    }
}
/** チェック状態により処理を振り分ける */
if($ok){
    $_SESSION["loginCustomer"] = serialize($customer); // ログイン情報をセッションに格納
    $loginCustomer = unserialize($_SESSION["loginCustomer"]);
    $nextView = "SC111CustomerWelcomeView"; // 次画面は「ようこそ」
}else{
    $nextView = "SC101CustomerLoginView"; // 次画面は「会員ログイン」
}

?>