<?php
/**
 * OrdersDAO.php
 * 注文テーブルDAO
 */
require_once ("../model/entity/VOrders.php");

class OrdersDAO{

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
     * 指定得意先の受注情報を検索する
     * @param $customerMail $顧客メールアドレス
     * @return $注文ビューリスト
     */
    public function findAnyCustomer($customerMail){
        $vOrdersList = array(); // 注文ビューリストの初期化
        $sql = " SELECT orderDate, productGroup_code, productItem_code "
            . "       , MIN(productItem_name) AS productItem_name "
            . "       , MIN(productItem_price) AS productItem_price "
            . " FROM v_orders "
            . " WHERE customer_mail=? "
            . " GROUP BY orderDate, productGroup_code, productItem_code "
            . " ORDER BY orderDate DESC, productGroup_code, productItem_code ";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $customerMail);
            $stmt->execute();
            if($stmt != null && $stmt->rowCount() > 0) {
                $count = 0; // 配列キーを初期化
                foreach ($stmt as $rec) {
                    $vOrders = new VOrders(); // 注文ビューの初期化
//                     $vOrders->setOrdersNo($rec["orders_no"]);
                    $vOrders->setOrderDate($rec["orderDate"]);
//                     $vOrders->setCustomerMail($rec["customer_mail"]);
//                     $vOrders->setCustomerName($rec["customer_name"]);
                    $vOrders->setProductGroupCode($rec["productGroup_code"]);
                    $vOrders->setProductItemCode($rec["productItem_code"]);
                    $vOrders->setProductItemName($rec["productItem_name"]);
//                     $vOrders->setQuantity($rec["quantity"]);
//                     $vOrders->setUnitName($rec["unitName"]);
                    $vOrders->setProductItemPrice($rec["productItem_price"]);
//                     $vOrders->setMoney($rec["money"]);
                    $vOrdersList[] = $vOrders; // 注文ビューリストへ追加
                    $count++;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $vOrdersList;
    }

    /**
     * 注文を追加する
     * @param $loginCustomer $ログイン情報
     * @param $cart $カート
     */
    public function insertOrder($loginCustomer, $cart){
        $result = false;
        try{
            // 注文テーブルのMAX注文番号を取得
            $maxNo = 0;
            $sql1 = " SELECT MAX(no) AS maxNo FROM orders";
            $stmt = $this->con->prepare($sql1);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                foreach ($stmt as $rec) {
                    $maxNo = $rec["maxNo"];
                    break;
                }
            }
            // 注文テーブル追加
            $sql2 = " INSERT INTO orders VALUES(?, ?, ?, ?, ?) ";
            $maxNo++;
            $mail = $loginCustomer->getMail();
            $orderTax = $cart->getOrderTax();
            $orderDate = $cart->getOrderDate();
            $sendDate = "00000000";
            $stmt = $this->con->prepare($sql2);
            $stmt->bindParam(1, $maxNo);
            $stmt->bindParam(2, $mail);
            $stmt->bindParam(3, $orderTax);
            $stmt->bindParam(4, $orderDate);
            $stmt->bindParam(5, $sendDate);
            $stmt->execute();
            if($stmt->rowCount() <= 0){
                return $result;
            }

            // 注文テーブル明細追加
            $sql3 = " INSERT INTO orderDetails VALUES(?, ?, ?, ?, ?, ?) ";
            $stmt = $this->con->prepare($sql3);
            $count = 1;
            foreach($cart->getProductItemList() as $productItem){
                $productGroupCode = $productItem->getProductGroupCode();
                $productItemCode = $productItem->getCode();
                $quantity = $productItem->getStock();
                $price = $productItem->getPrice();
                $stmt->bindParam(1, $maxNo);
                $stmt->bindParam(2, $count);
                $stmt->bindParam(3, $productGroupCode);
                $stmt->bindParam(4, $productItemCode);
                $stmt->bindParam(5, $quantity);
                $stmt->bindParam(6, $price);
                $stmt->execute();
                if($stmt->rowCount() <= 0){
                    return $result;
                }
                $count++;
            }
            $result = true;
        }catch(PDOException $e){
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $result;
    }

}
?>