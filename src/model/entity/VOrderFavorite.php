<?php
/**
 * VOrderFavorite.php
 * 注文ビューエンティティ
 */

class VOrderFavorite{

    /** 顧客メール */
    private $customerMail;

    /** 顧客名 */
    private $customerName;

    /** 商品グループコード */
    private $productGroupCode;

    /** 商品グループ名 */
    private $productGroupName;

    /** 単位名 */
    private $unitName;

    /** 商品コード */
    private $productItemCode;

    /** 商品名 */
    private $productItemName;

    /** 単価 */
    private $productItemPrice;

    /** 登録年月日 */
    private $registDate;

    /**
     * コンストラクタ
     */
    public function __construct(
        $customerMail = ""
        , $customerName = ""
        , $productGroupCode = ""
        , $productGroupName = ""
        , $unitName = ""
        , $productItemCode = ""
        , $productItemName = ""
        , $productItemPrice = 0
        , $registDate = "00000000"
    ){
        $this->customerMail = $customerMail;
        $this->customerName = $customerName;
        $this->productGroupCode = $productGroupCode;
        $this->productGroupName = $productGroupName;
        $this->unitName = $unitName;
        $this->productItemCode = $productItemCode;
        $this->productItemName = $productItemName;
        $this->productItemPrice = $productItemPrice;
        $this->registDate = $registDate;
    }

    /**
     * 顧客メールを設定する
     * @param $customerMail $顧客メール
     */
    public function setCustomerMail($customerMail){
        $this->customerMail = $customerMail;
    }

    /**
     * 顧客名を設定する
     * @param $customerName $顧客名
     */
    public function setCustomerName($customerName){
        $this->customerName = $customerName;
    }

    /**
     * 商品グループコードを設定する
     * @param $productGroupCode $商品グループコード
     */
    public function setProductGroupCode($productGroupCode){
        $this->productGroupCode = $productGroupCode;
    }

    /**
     * 商品グループ名を設定する
     * @param $productGroupName $商品グループ名
     */
    public function setProductGroupName($productGroupName){
        $this->productGroupName = $productGroupName;
    }

    /**
     * 単位を設定する
     * @param $unitName $単位
     */
    public function setUnitName($unitName){
        $this->unitName = $unitName;
    }

    /**
     * 商品コードを設定する
     * @param $productItemCode $商品コード
     */
    public function setProductItemCode($productItemCode){
        $this->productItemCode = $productItemCode;
    }

    /**
     * 商品名を設定する
     * @param $productItemName $商品名
     */
    public function setProductItemName($productItemName){
        $this->productItemName = $productItemName;
    }

    /**
     * 単価を設定する
     * @param $productItemPrice $単価
     */
    public function setProductItemPrice($productItemPrice){
        $this->productItemPrice = $productItemPrice;
    }

    /**
     * 登録年月日を設定する
     * @return $登録年月日
     */
    public function setRegistDate($registDate){
        $this->registDate = $registDate;
    }

    /**
     * 顧客メールを取得する
     * @return $顧客メール
     */
    public function getCustomerMail(){
        return $this->customerMail;
    }

    /**
     * 顧客名を取得する
     * @return $顧客名
     */
    public function getCustomerName(){
        return $this->customerName;
    }

    /**
     * 商品グループコードを取得する
     * @return $商品グループコード
     */
    public function getProductGroupCode(){
        return $this->productGroupCode;
    }

    /**
     * 商品グループ名を取得する
     * @return $商品グループ名
     */
    public function getProductGroupName(){
        return $this->productGroupName;
    }

    /**
     * 単位を取得する
     * @return $単位
     */
    public function getUnitName(){
        return $this->unitName;
    }

    /**
     * 商品コードを取得する
     * @return $商品コード
     */
    public function getProductItemCode(){
        return $this->productItemCode;
    }

    /**
     * 商品名を取得する
     * @return $商品名
     */
    public function getProductItemName(){
        return $this->productItemName;
    }

    /**
     * 単価を取得する
     * @return $単価
     */
    public function getProductItemPrice(){
        return $this->productItemPrice;
    }

    /**
     * 登録年月日を取得する
     * @return $登録年月日
     */
    public function getRegistDate(){
        return $this->registDate;
    }

}
?>