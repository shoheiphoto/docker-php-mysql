<?php
@session_start();
/**
 * SC002SessionCheckLogic.php
 * セッション存在チェック
 */

/** セッションチェック不要のボタンID配列 */
$unCheckButtonIDList =
    ["SC101Login", "SC101Regist", "SC102Regist", "SC102Return", "SC190Login"];
$unCheckButtonID = "";
$ok = true;
if(isset($_REQUEST["buttonID"])){
    $buttonID = $_REQUEST["buttonID"];
    foreach ($unCheckButtonIDList as $value) {
        if($value == $buttonID){
            $unCheckButtonID = $buttonID;
            break;
        }
    }
    if($unCheckButtonID == ""){
        if(!isset($_SESSION["loginCustomer"])){
            $ok = false;
            $message = "セッション情報が消滅しました。ログインからお願いします。";
            $nextView = "SC101CustomerLoginView";
        }
    }
}

?>