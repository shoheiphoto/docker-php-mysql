<?php
@session_start();
/**
 * SC102CustomerRegistView.php
 * 会員登録画面を表示する
 */

// if(!isset($errors)){
//     $message = "";
// }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会員登録</title>
<link rel="stylesheet" href="../view/css/table.css" />

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
<h2>会員登録</h2>
</div>
<div align="center" style="color: red;">

<?php
if (isset($errors)) {
errorMessage($errors);
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
            <td align="left">
                <input type="text" name="mail" maxLength="50" size="60"
                 value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>" autofocus
                >
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
                 value="<?php if(isset($_POST['kana'])){ echo $_POST['kana']; } ?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                会員名
            </td>
            <td align="left">
                <input type="text" name="name" maxLength="32" size="60"
                 value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                電話番号<br>（ハイフンなしで入力してください）
            </td>
            <td align="left">
                <input type="text" name="telNo" maxLength="13" size="60"
                 value="<?php if(isset($_POST['telNo'])){ echo $_POST['telNo']; } ?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                郵便番号<br>（ハイフンなしで入力してください）
            </td>
            <td align="left">
                <input type="text" name="postCode" maxLength="7" size="60"
                 value="<?php if(isset($_POST['postCode'])){ echo $_POST['postCode']; } ?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                住所
            </td>
                <td align="left">
                <input type="text" name="address" maxLength="50" size="60"
                 value="<?php if(isset($_POST['address'])){ echo $_POST['address']; } ?>"
                >
            </td>
        </tr>
        <tr>
            <td>
                生年月日<br>（ハイフンなしで西暦から8桁で入力してください。）<br>例：19800101
            </td>
                <td align="left">
                <input type="text" name="birthday" maxLength="8" size="60"
                 value="<?php if(isset($_POST['birthday'])){ echo $_POST['birthday']; } ?>"
                >
            </td>
        </tr>
    </table>
    </div><br>
    <div align="center">
        <input type="submit" value="登録"
         onClick="this.form.buttonID.value='SC102Regist';
         return pushExecuteButton();"
        >
        <input type="submit" value="戻る"
         onClick="this.form.buttonID.value='SC102Return';"
        >
        <input type="reset" value="クリア">
    </div>
</form>
</body>
</html>