<?php
/**
 * ProductDAO.php
 * 商品ビューDAO
 */
require_once ("../model/entity/VProduct.php");

class ProductDAO{

    /**
     * コネクション
     */
    private $con = null;

    /**
     * コンストラクタ
     *
     * @param $con $コネクション
     */
    public function __construct($con){
        $this->con = $con;
    }

    /**
     * 商品ビューを複数件検索する
     * @param  $productGroupCode $商品グループコード
     * @param  $keyword           $キーワード
     * @return $vProductList      $商品ビューリスト
     */
    public function findAny($productGroupCode, $keyword){
        $vProductList = array(); // 商品ビューリストの初期化
        $sql1 = " SELECT * FROM v_product WHERE ";
        $sql2 = " productGroup_code LIKE '%".$productGroupCode."%' AND (";
        $sql3 = " productItem_code LIKE '%".$keyword."%' "
            ." OR productItem_name LIKE '%".$keyword."%' "
            ." OR unitName         LIKE '%".$keyword."%' "
            ." OR caption          LIKE '%".$keyword."%' ";
        $sql4 = ") ";
        $sql = $sql1.$sql2.$sql3.$sql4;
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            if ($stmt != null && $stmt->rowCount() > 0) {
                $count = 0; // 配列キーを初期化
                foreach ($stmt as $rec) {
                    $productGroup = new ProductGroup(); // 商品グループの初期化
                    $productGroup->setCode($rec["productGroup_code"]);
                    $productGroup->setName($rec["productGroup_name"]);
                    $productGroup->setUnitName($rec["unitName"]);
                    $productItem = new ProductItem(); // 商品の初期化
                    $productItem->setProductGroupCode($rec["productGroup_code"]);
                    $productItem->setCode($rec["productItem_code"]);
                    $productItem->setName($rec["productItem_name"]);
                    $productItem->setPrice($rec["price"]);
                    $productItem->setStock($rec["stock"]);
                    $productItem->setOrderPoint($rec["orderPoint"]);
                    $productItem->setCaption($rec["caption"]);
                    $vProduct = new VProduct(); // 商品ビューの初期化
                    $vProduct->setProductGroup($productGroup);
                    $vProduct->setProductItem($productItem);
                    $vProductList[$count] = $vProduct; // 商品ビューリストへ追加
                    $count++;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $vProductList;
    }

    /**
     * 商品グループを全件検索する
     * @return $productGroupList $商品グループリスト
     */
    public function findAllGroup(){
        $productGroupList = array(); // 商品グループリストの初期化
        $sql = " SELECT * FROM v_productGroup ORDER BY productGroup_code ";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            if ($stmt != null && $stmt->rowCount() > 0) {
                $count = 0; // 配列キーを初期化
                foreach ($stmt as $rec) {
                    $productGroup = new ProductGroup(); // 商品グループの初期化
                    $productGroup->setCode($rec["productGroup_code"]);
                    $productGroup->setName($rec["productGroup_name"]);
                    $productGroup->setUnitName($rec["unitName"]);
                    $productGroupList[$count] = $productGroup; // 商品グループリストへ追加
                    $count++;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $productGroupList;
    }

}
?>