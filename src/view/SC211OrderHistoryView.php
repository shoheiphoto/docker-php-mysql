<?php
@session_start();
/**
 * SC204BuyResultView.php
 * 注文完了画面を出力する
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注文履歴</title>
	<link rel="stylesheet" href="../view/css/table.css" />
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>注文履歴</h2>
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
			<table border="1">
				<tr>
					<td align="center">カート<br>数量</td>
					<td align="right">
						<?= number_format($cart->getSumQuantity()); ?>
					</td>
					<td align="center">カート<br>金額</td>
					<td align="center">
						<?= number_format($cart->getSumMoney()); ?>
					</td>
				</tr>
			</table>
		</div>


		<div align="center">
			<input type="button" value="注文を続ける"
			 onclick="this.form.buttonID.value='SC211Buy'; this.form.submit();">
			 <?php
			$disabled = "";
			if(count($cart->getProductItemList()) <= 0){
			    $disabled = "disabled";
			}
			?>
			<input type="button" value="カートを見る" <?=$disabled ?>
			 onclick="this.form.buttonID.value='SC211CartFind'; this.form.submit();">
			<input type="button" value="ログアウト"
			 onclick="this.form.buttonID.value='SC211Logout'; this.form.submit();">
		</div>
		<div align="center">

			<table border="1">
				<tr>
					<td align="center">注文日</td>
					<td align="center">商品コード</td>
					<td align="center">商　品　名</td>
					<td align="center">単　価</td>
					<td align="center">カートに<br>入れる</td>
				</tr>
					<?php
					foreach ($ordersList as $vOrdersList) {
					?>
					<tr>
						<td align="center">
						<?= $vOrdersList->getOrderDate(); ?>
						</td>
						<td align="center">
						<?= $vOrdersList->getProductGroupCode() . $vOrdersList->getProductItemCode(); ?>
						</td>
						<td><?=$vOrdersList->getProductItemName()?></td>
						<td align="right">
							<?=number_format($vOrdersList->getProductItemPrice())?>
						</td>
						<td align="center">
							<input type="button" value="＋" name="add"
							 onclick="this.form.buttonID.value='SC211CartAdd';
							 this.form.productGroupCode.value='<?=$vOrdersList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrdersList->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrdersList->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrdersList->getProductItemPrice()?>';
							 this.form.submit();"
			 				>
						</td>
					</tr>
					<?php
					}
					?>

			</table>
		</div>
		<br>
	</form>
</body>
</html>