<?php
@session_start();
/**
 * SC204BuyResultView.php
 * カート画面を出力する
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注文完了</title>
	<link rel="stylesheet" href="../view/css/table.css" />
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>注文完了</h2>
		<p>この内容で注文が完了しました。</p>
	</div>
	<!-- フォーム -->
	<form action="../controller/Go.php" method="POST" name="inform">
		<!-- ボタンID用フィールド -->
		<input type="hidden" name="buttonID" value="">
		<!-- 送信用商品フィールド -->
		<input type="hidden" name="productGroupCode" value="">
		<input type="hidden" name="productItemCode" value="">
		<input type="hidden" name="productItemName" value="">
		<input type="hidden" name="productItemPrice" value="">

		<div align="center">
			<input type="button" value="再度注文をする"
			 onclick="this.form.buttonID.value='SC204Buy'; this.form.submit();">
			<input type="button" value="ログアウト"
			 onclick="this.form.buttonID.value='SC204Logout'; this.form.submit();">
		</div>
		<div align="center">

			<table border="1">
				<tr>
					<td align="center">商品コード</td>
					<td align="center">商　品　名</td>
					<td align="center">単　価</td>
					<td align="center">数　量</td>
					<td align="center">金額</td>
				</tr>
					<?php
					foreach ($cart->getProductItemList() as $vProductItemList) {
					?>
					<tr>
						<td align="center">
						<?= $vProductItemList->getProductGroupCode() . $vProductItemList->getCode(); ?>
						</td>
						<td><?=$vProductItemList->getName()?></td>
						<td align="right">
							<?=number_format($vProductItemList->getPrice())?>
						</td>
						<td align="right">
							<?php
							if($vProductItemList->getStock() > 0){
                                echo number_format($vProductItemList->getStock());
							}
							?>
						</td>
						<td width="100" align="right">
							<?php
                                echo number_format($vProductItemList->getPrice() *
                                $vProductItemList->getStock());
                            ?>
						</td>
						</tr>
					<?php
					}
					?>
						<tr>
						<td colspan="3" align="center">合　計</td>
						<td align="right">
							<?= number_format($cart->getSumQuantity()); ?>
						</td>
						<td align="right">
							<?= number_format($cart->getSumMoney()); ?>
						</tr>
			</table>
		</div>
		<br>
	</form>
</body>
</html>