<?php
@session_start();
/**
 * SC202CartUpdateViewView.php
 * カート画面を出力する
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>カート</title>
	<link rel="stylesheet" href="../view/css/table.css" />
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>カート</h2>
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
			<input type="button" value="注文を続ける"
			 onclick="this.form.buttonID.value='SC202Buy'; this.form.submit();">
			<input type="button" value="注文確認"
			 onclick="this.form.buttonID.value='SC202Confirm'; this.form.submit();">
			<input type="button" value="ログアウト"
			 onclick="this.form.buttonID.value='SC202Logout'; this.form.submit();">
		</div>
		<div align="center">

			<table border="1">
				<tr>
					<td align="center">商品コード</td>
					<td align="center">商　品　名</td>
					<td align="center">単　価</td>
					<td align="center" colspan="2">数　量</td>
					<td align="center">金額</td>
					<td align="center">削除</td>
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
						<td>
							<input type="button" value="＋"
							 onclick="this.form.buttonID.value='SC202CartAdd';
							 this.form.productGroupCode.value='<?=$vProductItemList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProductItemList->getCode()?>';
							 this.form.productItemName.value='<?=$vProductItemList->getName()?>';
							 this.form.productItemPrice.value='<?=$vProductItemList->getPrice()?>';
							 this.form.submit();"
			 				>
			 				<?php
			 				$disabled = "";
			 				if($vProductItemList->getStock() <= 0){
			 				    $disabled = "disabled";
			 				}
			 				?>
			 				<input type="button" value="－"
			 				<?=$disabled?>
							 onclick="this.form.buttonID.value='SC202CartSubtract';
							 this.form.productGroupCode.value='<?=$vProductItemList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProductItemList->getCode()?>';
							 this.form.productItemName.value='<?=$vProductItemList->getName()?>';
							 this.form.productItemPrice.value='<?=$vProductItemList->getPrice()?>';
							 this.form.submit();"
			 				>
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
						<td align="center">
							<input type="button" value="×"
							 onclick="this.form.buttonID.value='SC202CartDelete';
							 this.form.productGroupCode.value='<?=$vProductItemList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vProductItemList->getCode()?>';
							 this.form.productItemName.value='<?=$vProductItemList->getName()?>';
							 this.form.productItemPrice.value='<?=$vProductItemList->getPrice()?>';
							 this.form.submit();"
			 				>
						</tr>
					<?php
					}
					?>
						<tr>
						<td colspan="3" align="center">合　計</td>
						<td align="center" colspan="2">
							<?= number_format($cart->getSumQuantity()); ?>
						</td>
						<td align="right">
							<?= number_format($cart->getSumMoney()); ?>
						<td align="right"></td>
						</tr>
			</table>
		</div>
		<br>
	</form>
</body>
</html>