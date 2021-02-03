<?php
@session_start();
/**
 * SC103CustomerModifyView.php
 * 会員登録情報を更新する
 */

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会員更新</title>

<script type="text/javascript">
function pushExecuteButton(){
    var result = confirm("この内容でよろしいですか？");
    return result;
}
</script>

</head>
<body>
<!-- 見出し -->
<div align="center">
<h2>会員更新</h2>
</div>
<div align="center" style="color: red;">

<?php
if (isset($errors)) {
    foreach ($errors as $error){
        echo $error. "<br>";
    }
    echo "<br>";
}
?>

</div>

<!-- フォーム -->
<form action="../controller/Go.php" method="POST">
	<!-- アクセス判定用フィールド -->
    <input type="hidden" name="SC102_check" value="1">
    <!-- ボタンID用フィールド -->
    <input type="hidden" name="buttonID" value="" >
    <div align="center">
    <table border="1">
        <tr>
            <td>
                メールアドレス
            </td>
            <td align="left"><input type="hidden" name="mail" maxLength="40" size="60"
                 value="<?=$loginCustomer->getMail()?>" readonly><?=$loginCustomer->getMail()?>
            </td>
        </tr>
        <tr>
            <td>
                会員パスワード
            </td>
            <td align="left">
                <input type="password" name="password1" maxLength="30" size="60"
                 value=""
                >
            </td>
        </tr>
        <tr>
            <td>
                会員パスワード(再)
            </td>
            <td align="left">
                <input type="password" name="password2" maxLength="30" size="60"
                 value=""
                >
            </td>
        </tr>
        <tr>
            <td>
                会員名(かな)
            </td>
            <td align="left">
                <input type="text" name="kana" maxLength="40" size="60"
                 value="<?=$loginCustomer->getKana()?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                会員名
            </td>
            <td align="left">
                <input type="text" name="name" maxLength="32" size="60"
                 value="<?=$loginCustomer->getName()?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                電話番号<br>（ハイフンなしで入力してください）
            </td>
            <td align="left">
                <input type="text" name="telNo" maxLength="13" size="60"
                 value="<?=$loginCustomer->getTelNo()?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                郵便番号<br>（ハイフンなしで入力してください）
            </td>
            <td align="left">
                <input type="text" name="postCode" maxLength="7" size="60"
                 value="<?=$loginCustomer->getPostCode()?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                住所
            </td>
                <td align="left">
                <input type="text" name="address" maxLength="50" size="60"
                 value="<?=$loginCustomer->getAddress()?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                生年月日<br>（ハイフンなしで西暦から8桁で入力してください。）<br>例：19800101
            </td>
                <td align="left">
                <input type="text" name="birthday" maxLength="8" size="60"
                 value="<?=$loginCustomer->getBirthday()?>"
                >
            </td>
        </tr>
    </table>
    </div><br>
    <div align="center">
        <input type="submit" value="更新"
         onClick="this.form.buttonID.value='SC103Modify';
         return pushExecuteButton();"
        >
        <input type="submit" value="戻る"
         onClick="this.form.buttonID.value='SC103Return';"
        >
        <input type="reset" value="クリア">
        <input type="submit" value="ログアウト"
        onClick="this.form.buttonID.value='SC103Logout';"
        >
    </div>
</form>
</body>
</html>