<?php
@session_start();
/**
 * SC212FavoriteListView.php
 * お気に入り画面を出力する
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>お気に入り</title>
	<link rel="stylesheet" href="../view/css/table.css" />
</head>

<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>お気に入り</h2>
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
			 onclick="this.form.buttonID.value='SC212Buy'; this.form.submit();">
			<input type="button" value="カートを見る"
			 onclick="this.form.buttonID.value='SC212CartFind'; this.form.submit();">
			<input type="button" value="ログアウト"
			 onclick="this.form.buttonID.value='SC212Logout'; this.form.submit();">
		</div>
		<div align="center">

			<table border="1">
				<tr>
					<td align="center">登録日</td>
					<td align="center">商品コード</td>
					<td align="center">商　品　名</td>
					<td align="center">単　価</td>
					<td align="center">カートに<br>入れる</td>
					<td align="center">お気に<br>入り</td>
				</tr>
					<?php
					foreach ($orderFavoriteList as $vOrderFavoriteList) {
					?>
					<tr>
						<td><?=$vOrderFavoriteList->getRegistDate()?></td>
						<td align="center">
						<?= $vOrderFavoriteList->getProductGroupCode() . $vOrderFavoriteList->getProductItemCode(); ?>
						</td>
						<td><?=$vOrderFavoriteList->getProductItemName()?></td>
						<td align="right">
							<?=number_format($vOrderFavoriteList->getProductItemPrice())?>
						</td>
						<td align="center">
							<input type="button" value="＋" name="add"
							 onclick="this.form.buttonID.value='SC212CartAdd';
							 this.form.productGroupCode.value='<?=$vOrderFavoriteList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrderFavoriteList->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrderFavoriteList->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrderFavoriteList->getProductItemPrice()?>';
							 this.form.submit();"
			 				>
						</td>
						<td align="center">
							<input type="button" value="×"
							 onclick="this.form.buttonID.value='SC212FavoriteDelete';
							 this.form.productGroupCode.value='<?=$vOrderFavoriteList->getProductGroupCode()?>';
							 this.form.productItemCode.value='<?=$vOrderFavoriteList->getProductItemCode()?>';
							 this.form.productItemName.value='<?=$vOrderFavoriteList->getProductItemName()?>';
							 this.form.productItemPrice.value='<?=$vOrderFavoriteList->getProductItemPrice()?>';
							 this.form.submit();"
			 				>
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