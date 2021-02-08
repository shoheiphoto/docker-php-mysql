<?php
@session_start();
if(isset($_REQUEST["check"])){
    $_SESSION = [];
    $message = "セッションは破棄されています。";
}else{
    $message = "セッションを破棄するために「セッション破棄」をクリックしてください。";
}
if(isset($_SESSION)){
    $session = $_SESSION;
}else{
    $session = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>セッション破棄</title>
</head>

<body>
    <!-- 見出し -->
    <div align="center">
    	<h2>セッション破棄</h2>
    </div>
    <div align="center" style="color: red;">
    	<?=$message?>
    </div>
    <!-- フォーム -->
    <form action="SC901SessionDestroy.php" method="POST">
        <!-- ボタンID用フィールド -->
        <input type="hidden" name="check" value="" >
        <div align="center">
        	<?php
        	if(count($session) > 0){
        	?>
                <table border="1">
                    <tr>
                        <td align="center">Key</td>
                    </tr>
                    <?php
                    foreach($session as $key => $value){
                    ?>
                        <tr>
                            <td><?=$key?></td>
                        </tr>
                   <?php
                   }
                   ?>
                </table>
            <?php
            }else{
            ?>
            	セッションは空です。
            <?php
            }
            ?>
        </div><br><br>
        <div align="center">
            <input type="submit" value="セッション破棄" >
        </div>
    </form>
    </body>
</html>