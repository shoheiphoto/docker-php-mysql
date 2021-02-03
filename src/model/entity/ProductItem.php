<?php
/**
 * ProductItem.php
 * 商品ティティ
 */
class ProductItem{

    /** 商品グループコード */
    private $productGroupCode;

    /** コード */
    private $code;

    /** 商品名 */
    private $name;

    /** 単価 */
    private $price;

    /** 在庫数 */
    private $stock;

    /** 発注点 */
    private $orderPoint;

    /** 説明文 */
    private $caption;

    /**
     * コンストラクタ
     * @param $productGroup_code $商品グループコード
     * @param $code              $コード
     * @param $name              $商品名
     * @param $price             $単価
     * @param $stock             $在庫数
     * @param $orderPoint        $発注点
     * @param $caption           $説明文
     */
    public function __construct(
        $productGroup_code = ""
        , $code = ""
        , $name = ""
        , $price = 0
        , $stock = 0
        , $orderPoint = 0
        , $caption = ""
        ){
            $this->productGroup_code = $productGroup_code;
            $this->code = $code;
            $this->name = $name;
            $this->price = $price;
            $this->stock = $stock;
            $this->orderPoint = $orderPoint;
            $this->caption = $caption;
    }

    /**
     * 商品グループコードを設定する
     * @param $productGroup_code $商品グループコード
     */
    public function setProductGroupCode($productGroup_code){
        $this->productGroup_code = $productGroup_code;
    }

    /**
     * コードを設定する
     * @param $code $コード
     */
    public function setCode($code){
        $this->code = $code;
    }

    /**
     * 商品名を設定する
     * @param $name $商品名
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * 単価を設定する
     * @param $price  $単価
     */
    public function setPrice ($price ){
        $this->price  = $price ;
    }

    /**
     * 在庫数を設定する
     * @param $stock $在庫数
     */
    public function setStock($stock){
        $this->stock = $stock;
    }

    /**
     * 発注点を設定する
     * @param $orderPoint $発注点
     */
    public function setOrderPoint($orderPoint){
        $this->orderPoint = $orderPoint;
    }

    /**
     * 説明文を設定する
     * @param $caption $説明文
     */
    public function setCaption($caption){
        $this->caption = $caption;
    }

    /**
     * 商品グループコードを取得する
     * @return $商品グループコード
     */
    public function getProductGroupCode(){
        return $this->productGroup_code;
    }

    /**
     * コードを取得する
     * @return $コード
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * 商品名を取得する
     * @return $商品名
     */
    public function getName(){
        return $this->name;
    }

    /**
     * 単価を取得する
     * @return $単価
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * 在庫数を取得する
     * @return $在庫数
     */
    public function getStock(){
        return $this->stock;
    }

    /**
     * 発注点を取得する
     * @return $発注点
     */
    public function getOrderPoint(){
        return $this->orderPoint;
    }

    /**
     * 説明文を取得する
     * @return $説明文
     */
    public function getCaption(){
        return $this->caption;
    }

}
?>