<?php
@session_start();
/**
 * SC201FavoriteFindLogic.php
 * 商品メニュー画面：検索ボタン(SC201FavoriteFind)押下
 */


/** ログイン情報を取得 */
$loginCustomer = unserialize($_SESSION["loginCustomer"]);

$cart = unserialize($_SESSION["cart"]);

// 送信データの取得
$findProductGroupCode = $_POST ["productGroup"];
$findKeyword = $_POST ["keyword"];


/** データベースを検索 */
$con = DBConnection::getConnection();
$productDAO = new ProductDAO($con);
$orderFavoriteDAO = new OrderFavoriteDAO($con);

/** 商品グループリストを検索 */
$productGroupList = $productDAO->findAllGroup();
$productGroup = new ProductGroup();
array_unshift($productGroupList, $productGroup); // リストの先頭に空を追加

/** 商品ビューリストを検索し、カート内数量・お気に入りを取得 */
$productList = $productDAO->findAny($findProductGroupCode, $findKeyword); // 商品ビューリストを取得
$vFavoriteList = $orderFavoriteDAO->findAnyCustomer($loginCustomer->getMail()); // お気に入りリストを取得
foreach($productList as $key => $vProduct){ // 商品ビューリストを繰返し検索
    $productList[$key]->getProductItem()->setStock(0); // 商品ビューの数量をクリア
    // カートを検索
    foreach($cart->getProductItemList() as $productItem){ // カートの商品リストを繰返し検索
        if($productItem->getProductGroupCode() == $vProduct->getProductGroup()->getCode() // 商品グループコードを比較
            && $productItem->getCode() == $vProduct->getProductItem()->getCode()){ // 商品コードを比較
               $productList[$key]->getProductItem()->setStock($productItem->getStock()); // 一致すればカート数量を設定
                break;
        }
    }
    $productList[$key]->getProductItem()->setCaption("　"); // 商品ビューの説明文をクリア
    // お気に入りを検索
    foreach($vFavoriteList as $vFavorite){
        if($vFavorite->getProductGroupCode() == $vProduct->getProductItem()->getProductGroupCode()
            && $vFavorite->getProductItemCode() == $vProduct->getProductItem()->getCode()){
            $productList[$key]->getProductItem()->setCaption("〇"); // 一致すれば説明文に設定
            break;
        }
    }
}

$con = null;


/** 次画面 */
$nextView = "SC201ProductSalesListView"; // 次画面は「商品メニュー」

?>