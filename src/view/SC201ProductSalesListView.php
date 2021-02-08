<?php
@session_start();
/**
 * SC201ProductSalesListView.php
 * 商品メニュー画面を出力する
 */

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品メニュー</title>

	<link rel="stylesheet" href="../view/css/table.css" />

</head>
<body>
	<?=$loginCustomer->getMail()?>
	<?=$loginCustomer->getName()?>様
	<!-- 見出し -->
	<div align="center">
		<h2>商品メニュー</h2>
		<table border="1">
			<tr>
				<td>カート数量</td>
				<td width="70" align="center">
					<?=number_format($cart->getSumQuantity())?>
				</td>
				<td>カート金額</td>
				<td width="100" align="center">
					<?=number_format($cart->getSumMoney())?>
				</td>
			</tr>
		</table>
	</div>
	<div align="center" style="color: red;">
		<?=$message?>
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
					<td>
						商品グループ
					</td>
					<td>
						<select NAME="productGroup">
							<?php
							foreach($productGroupList as $productGroup){
							    $selected = "";
							    if($productGroup->getCode() == $findProductGroupCode){
							        $selected = "selected";
							    }
							?>
							    <option value="<?=$productGroup->getCode()?>"
							     <?=$selected?>
							    >
							    	<?=$productGroup->getName()?>
							    </option>
							<?php
							}
							?>
						</select>
					</td>
					<td>
						検索キーワード
					</td>
					<td>
						<input type="text" name="keyword"
						 value="<?=$findKeyword?>" maxLength="30" size="30" autofocus >
					</td>
					<td>
						<input type="text" name="dummy" style="display:none;">
						<input type="button" value="検索" autofocas
						 onclick="this.form.buttonID.value='SC201Find'; this.form.submit();">
					</td>
				</tr>
			</table>
			<br>
		</div>
		<div align="center">
			<input type="button" value="注文履歴を見る"
			 onclick="this.form.buttonID.value='SC201HistoryFind'; this.form.submit();">
			<input type="button" value="お気に入りを見る"
			 onclick="this.form.buttonID.value='SC201FavoriteFind'; this.form.submit();">
			<?php
			$disabled = "";
			if(count($cart->getProductItemList()) <= 0){
			    $disabled = "disabled";
			}
			?>
			<input type="button" value="カートを見る"  <?=$disabled ?>
			 onclick="this.form.buttonID.value='SC201CartFind'; this.form.submit();">
			<input type="button" value="戻る"
			 onclick="this.form.buttonID.value='SC201Return'; this.form.submit();">
			<input type="button" value="ログアウト"
			 onclick="this.form.buttonID.value='SC201Logout'; this.form.submit();">
		</div>
		<div align="center">
			<table border="1">
				<tr>
					<td align="center">商品コード</td>
					<td align="center">商　品　名</td>
					<td align="center">単　価</td>
					<td align="center">カートに<br>入れる</td>
					<td align="center">カート内<br>数量</td>
					<td align="center">お気に<br>入り</td>
				</tr>
					<?php
					foreach($productList as $vProduct){
					?>
						<tr>
						<td align="center">
						<?=$vProduct->getProductGroup()->getCode().$vProduct->getProductItem()->getCode()?>
						</td>
						<td><?=$vProduct->getProductItem()->getName()?></td>
						<td align="right">
							<?=number_format($vProduct->getProductItem()->getPrice())?>
						</td>
						<td>
							<input type="button" value="＋" name="add"
							 onclick="this.form.buttonID.value='SC201CartAdd';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroup()->getCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getProductItem()->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getProductItem()->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getProductItem()->getPrice()?>';
							 this.form.submit();"
			 				>
			 				<?php
			 				$disabled = "";
			 				if($vProduct->getProductItem()->getStock() <= 0){
			 				    $disabled = "disabled";
			 				}
			 				?>
			 				<input type="button" value="－"
			 				<?=$disabled?>
							 onclick="this.form.buttonID.value='SC201CartSubtract';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroup()->getCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getProductItem()->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getProductItem()->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getProductItem()->getPrice()?>';
							 this.form.submit();"
			 				>
						</td>
						<td align="right">
							<?php
							if($vProduct->getProductItem()->getStock() > 0){
							?>
							<?=number_format($vProduct->getProductItem()->getStock())?>
							<?php
							}
							?>
						</td>
						<td align="center">
							<input type="button" value="<?=$vProduct->getProductItem()->getCaption()?>"
							 onclick="this.form.buttonID.value='SC201Favorite';
							 this.form.productGroupCode.value='<?=$vProduct->getProductGroup()->getCode()?>';
							 this.form.productItemCode.value='<?=$vProduct->getProductItem()->getCode()?>';
							 this.form.productItemName.value='<?=$vProduct->getProductItem()->getName()?>';
							 this.form.productItemPrice.value='<?=$vProduct->getProductItem()->getPrice()?>';
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