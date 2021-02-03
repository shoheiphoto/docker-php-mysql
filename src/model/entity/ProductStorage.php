<?php
/**
 * ProductStorage.php
 * カート
 */
class ProductStorage{

    /** 消費税率 */
    private static $RITSU = 0.1;

    /** 商品リスト array(ProductItem) */
    private $productItemList;

    /** 合計数量 */
    private $sumQuantity;

    /** 合計金額 */
    private $sumMoney;

    /** 消費税 */
    private $orderTax;

    /** 受注日 */
    private $orderDate;

    /**
     * コンストラクタ
     */
    public function __construct(){
        $this->productItemList = array();
        $this->sumQuantity = 0;
        $this->sumMoney = 0;
        $this->orderTax = 0;
        $this->orderDate = date("Ymd");
    }

    /**
     * 商品リストに商品を追加する
     * @param $productItem $商品
     */
    public function addProduct($productItem){
        // 商品リスト内を検索し存在すれば数量を加算、しなければ商品を追加
        $hit = false; // 存在フラグ
        foreach ($this->productItemList as $key => $value){
            if($value->getProductGroupCode() == $productItem->getProductGroupCode()
            && $value->getCode() == $productItem->getCode()){
                // 存在すれば数量を加算
                $hit = true;
                $newStock = $value->getStock() + $productItem->getStock();
                $this->productItemList[$key]->setStock($newStock);
                // 数量 < 1 ならば削除する
                if($this->productItemList[$key]->getStock() < 1){
                    unset($this->productItemList[$key]);
                }
                break;
            }
        }
        if(!$hit){
            // 存在しなければ商品を追加(商品の数量>0の場合のみ)
            if($productItem->getStock() > 0){
                $this->productItemList[] = $productItem;
            }
        }
        $this->sumCalc(); // 合計数量・合計金額・消費税を計算する
    }

    /**
     * 商品リストの商品を削除する
     * @param $productGroupCode $商品グループコード
     * @param $productItemCode $商品コード
     */
    public function deleteProduct($productGroupCode, $productItemCode){
        $hit = false; // 存在フラグ
        foreach ($this->productItemList as $key => $value){
            if($value->getProductGroupCode() == $productGroupCode
            && $value->getCode() == $productItemCode){
                $hit = true;
                unset($this->productItemList[$key]);
                break;
            }
        }
        $this->sumCalc(); // 合計数量・合計金額・消費税を計算する
        return $hit;
    }

    /**
     * 商品Listの数量を更新する
     * @param $productGroupCode $商品グループコード
     * @param $productItemCode $商品コード
     * @param $quantity $数量
     */
    public function updateQuantity($productGroupCode, $productItemCode, $quantity){
        foreach ($this->productItemList as $key => $value){
            if($value->getProductGroupCode() == $productGroupCode
            && $value->getCode() == $productItemCode){
                if($quantity == 0){
                    // 数量 = 0 ならば削除する
                    unset($this->productItemList[$key]);
                }else{
                    $this->productItemList[$key]->setStock($quantity);
                }
                break;
            }
        }
        $this->sumCalc(); // 合計数量・合計金額・消費税を計算する
    }

    /**
     * 合計数量・合計金額・消費税を計算する
     */
    public function sumCalc(){
        $this->sumQuantity = 0;
        $this->sumMoney = 0;
        foreach($this->productItemList as $value){
            $this->sumQuantity += $value->getStock();
            $this->sumMoney += $value->getPrice() * $value->getStock();
        }
        // 内税計算
        $this->orderTax = $this->sumMoney / (1 + self::$RITSU * 100);

        /** 並べ替え */
//         $count = count($this->productItemList);
//         for($i=0 ; $i < $count-1 ; $i++){
//             $productItemI = $this->productItemList[$i];
//             $keyI = $productItemI->getProductGroupCode().$productItemI->getCode();
//             for($j=0 ; $j < $count ; $j++){
//                 $productItemJ = $this->productItemList[$j];
//                 $keyJ = $productItemJ->getProductGroupCode().$productItemJ->getCode();
//                 if($keyI > $keyJ){
//                     $wk = $this->productItemList[$i];
//                     $this->productItemList[$i] = $this->productItemList[$j];
//                     $this->productItemList[$j] = $wk;
//                 }
//             }
//         }
    }

    /**
     * 商品リストを設定する
     * @param $productItemList $商品リスト
     */
    public function setProductItemList($productItemList){
        $this->productItemList = $productItemList;
    }

    /**
     * 合計数量を設定する
     * @param $sumQuantity $合計数量
     */
    public function setSumQuantity($sumQuantity){
        $this->sumQuantity = $sumQuantity;
    }

    /**
     * 合計金額を設定する
     * @param $sumMoney $合計金額
     */
    public function setSumMoney($sumMoney){
        $this->sumMoney = $sumMoney;
    }

    /**
     * 消費税を設定する
     * @param $orderTax $消費税
     */
    public function setOrderTax($orderTax){
        $this->orderTax = $orderTax;
    }

    /**
     * 受注日を設定する
     * @param $orderDate  $受注日
     */
    public function setOrderDate($orderDate){
        $this->orderDate  = $orderDate;
    }

    /**
     * 消費税率を取得する
     * @return $消費税率
     */
    public function getRITSU(){
        return self::$RITSU;
    }

    /**
     * 商品リストを取得する
     * @return $商品リスト
     */
    public function getProductItemList(){
        return $this->productItemList;
    }

    /**
     * 合計数量を取得する
     * @return $合計数量
     */
    public function getSumQuantity(){
        return $this->sumQuantity;
    }

    /**
     * 合計金額を取得する
     * @return $合計金額
     */
    public function getSumMoney(){
        return $this->sumMoney;
    }

    /**
     * 消費税を取得する
     * @return $消費税
     */
    public function getOrderTax(){
        return $this->orderTax;
    }

    /**
     * 受注日を取得する
     * @return $受注日
     */
    public function getOrderDate(){
        return $this->orderDate;
    }

}
?>