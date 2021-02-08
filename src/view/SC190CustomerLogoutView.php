<?php
@session_start();
/**
 * SC190CustomerLogoutView.php
 * 会員ログアウト画面を表示する
 */

if(!isset($message)){
    $message = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>会員ログアウト</title>
    <link rel="stylesheet" href="../view/css/table.css" />
</head>

<body>
    <!-- 見出し -->
    <div align="center">
    	<h2><?=$message?></h2>
    </div>
    <!-- フォーム -->
    <form action="../controller/Go.php" method="POST">
    <!-- ボタンID用フィールド -->
    <input type="hidden" name="buttonID" value="" >
        <div align="center">
        <input type="submit" value="ログイン"
         onClick="this.form.buttonID.value='SC190Login';"
        >
        </div>
    </form>
    </body>
</html>