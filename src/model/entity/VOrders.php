<?php
/**
 * VOrders.php
 * 注文ビューエンティティ
 */

class VOrders{

    /** 注文番号 */
    private $ordersNo;

    /** 受注日 */
    private $orderDate;

    /** 顧客メール */
    private $customerMail;

    /** 顧客名 */
    private $customerName;

    /** 商品グループコード */
    private $productGroupCode;

    /** 商品コード */
    private $productItemCode;

    /** 商品名 */
    private $productItemName;

    /** 数量 */
    private $quantity;

    /** 単位 */
    private $unitName;

    /** 単価 */
    private $productItemPrice;

    /** 金額 */
    private $money;

    /**
     * コンストラクタ
     */
    public function __construct(
        $ordersNo = 0
        , $orderDate = "00000000"
        , $customerMail = ""
        , $customerName = ""
        , $productGroupCode = ""
        , $productItemCode = ""
        , $productItemName =""
        , $quantity = 0
        , $unitName = ""
        , $productItemPrice = 0
        , $money = 0
    ){
        $this->ordersNo = $ordersNo;
        $this->orderDate = $orderDate;
        $this->customerMail = $customerMail;
        $this->customerName = $customerName;
        $this->productGroupCode = $productGroupCode;
        $this->productItemCode = $productItemCode;
        $this->productItemName = $productItemName;
        $this->quantity = $quantity;
        $this->unitName = $unitName;
        $this->productItemPrice = $productItemPrice;
        $this->money = $money;
    }

    /**
     * 注文番号を設定する
     * @param $ordersNo $注文番号
     */
    public function setOrdersNo($ordersNo){
        $this->ordersNo = $ordersNo;
    }

    /**
     * 受注日を設定する
     * @param $orderDate $受注日
     */
    public function setOrderDate($orderDate){
        $this->orderDate = $orderDate;
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
     * 数量を設定する
     * @param $quantity $数量
     */
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    /**
     * 単位を設定する
     * @param $unitName $単位
     */
    public function setUnitName($unitName){
        $this->unitName = $unitName;
    }

    /**
     * 単価を設定する
     * @param $productItemPrice $単価
     */
    public function setProductItemPrice($productItemPrice){
        $this->productItemPrice = $productItemPrice;
    }

    /**
     * 金額を設定する
     * @param $money $金額
     */
    public function setMoney($money){
        $this->money = $money;
    }

    /**
     * 注文番号を取得する
     * @return $注文番号
     */
    public function getOrdersNo(){
        return $this->ordersNo;
    }

    /**
     * 受注日を取得する
     * @return $受注日
     */
    public function getOrderDate(){
        return $this->orderDate;
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
     * 数量を取得する
     * @return $数量
     */
    public function getQuantity(){
        return $this->quantity;
    }

    /**
     * 単位を取得する
     * @return $単位
     */
    public function getUnitName(){
        return $this->unitName;
    }

    /**
     * 単価を取得する
     * @return $単価
     */
    public function getProductItemPrice(){
        return $this->productItemPrice;
    }

    /**
     * 金額を取得する
     * @return $金額
     */
    public function getMoney(){
        return $this->money;
    }

}
?>