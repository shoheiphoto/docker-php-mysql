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
</head>

<body>
    <!-- 見出し -->
    <div align="center" style="color: red;">
    	<?=$message?>
    </div>
    <!-- フォーム -->
    <form action="../controller/Go.php" method="POST">
    <!-- ボタンID用フィールド -->
    <input type="hidden" name="buttonID" value="" >
    <div align="center">
        <table>
            <tr>
                <td>会員コード</td>
                <td align="left" width="300">
                    <input type="text" name="loginMail"
                     value="<?=$loginMail?>"
                     autofocus
                    >
                </td>
            </tr>
            <tr>
                <td>会員パスワード</td>
                <td align="left" width="300">
                    <input type="password" name="loginPassword">
                </td>
            </tr>
        </table>
    </div><br><br>
    <div align="center">
        <input type="submit" value="ログイン"
         onClick="this.form.buttonID.value='SC101Login';"
        >
         <input type="submit" value="会員登録"
         onClick="this.form.buttonID.value='SC101Regist';"
         >
        <input type="reset" value="クリア">
        </div>
    </form>
    </body>
</html>