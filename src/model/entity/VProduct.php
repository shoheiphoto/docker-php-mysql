<?php
/**
 * VProduct.php
 * 商品ビューエンティティ
 */
require_once ("../model/entity/ProductGroup.php");
require_once ("../model/entity/ProductItem.php");

class VProduct{

    /** 商品グループ */
    private $productGroup;

    /** 商品リスト */
    private $productItem;

    /**
     * コンストラクタ
     */
    public function __construct(){
        $this->productGroup = new ProductGroup();
        $this->productItem = new ProductItem();
    }

    /**
     * 商品グループを設定する
     * @param $productGroup $商品グループ
     */
    public function setProductGroup($productGroup){
        $this->productGroup = $productGroup;
    }

    /**
     * 商品を設定する
     * @param $productItem $商品
     */
    public function setProductItem($productItem){
        $this->productItem = $productItem;
    }

    /**
     * 商品グループを取得する
     * @return $商品グループ
     */
    public function getProductGroup(){
        return $this->productGroup;
    }

    /**
     * 商品リストを取得する
     * @return $商品リスト
     */
    public function getProductItem(){
        return $this->productItem;
    }

}
?>