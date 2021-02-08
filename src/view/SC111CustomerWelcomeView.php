<?php
@session_start();
/**
 * SC111CustomerWelcomeView.php
 * 会員ようこそ画面を出力する
 */
if(!isset($message)){
    $message = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ようこそ</title>
    <link rel="stylesheet" href="../view/css/table.css" />
</head>
<body>
    <!-- 見出し -->
    <div align="center">
        <h2>
            ようこそ<?=$loginCustomer->getName()?>様
            <br>
            まいどありがとうございます。
        </h2>
    </div>
    <div align="center" style="color: red;">
        <?=$message?>
    </div>
    <!-- フォーム -->
    <form action="../controller/Go.php" method="POST">
        <!-- ボタンID用フィールド -->
        <input type="hidden" name="buttonID" value="" >
        <div align="center">
             <input type="submit" value="注文に進む"
             onClick="this.form.buttonID.value='SC111Buy';" autofocus
             >
             <input type="submit" value="会員更新"
             onClick="this.form.buttonID.value='SC111Modify';"
             >
             <input type="submit" value="ログアウト"
             onClick="this.form.buttonID.value='SC111Logout';"
             >
        </div>
    </form>
</body>
</html>