<?php
/**
 * OrderFavoriteDAO.php
 * お気に入りDAO
 */

class OrderFavoriteDAO{

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
     * 指定得意先のお気に入りを検索する
     * @param $customerMail $顧客メールアドレス
     * @return $お気に入りビューリスト
     */
    public function findAnyCustomer($customerMail){
        $vOrderFavoriteList = array(); // お気に入りビューリストの初期化
        $sql = " SELECT * "
            . " FROM v_orderFavorite "
            . " WHERE customer_mail=? "
            . " ORDER BY registDate DESC, productGroup_code, productItem_code ";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $customerMail);
            $stmt->execute();
            if($stmt != null && $stmt->rowCount() > 0) {
                $count = 0; // 配列キーを初期化
                foreach ($stmt as $rec) {
                    $vOrderFavorite = new VOrderFavorite(); // $お気に入りビューの初期化
                    $vOrderFavorite->setCustomerMail($rec["customer_mail"]);
                    $vOrderFavorite->setCustomerName($rec["customer_name"]);
                    $vOrderFavorite->setProductGroupCode($rec["productGroup_code"]);
                    $vOrderFavorite->setProductGroupName($rec["productGroup_name"]);
                    $vOrderFavorite->setUnitName($rec["unitName"]);
                    $vOrderFavorite->setProductItemCode($rec["productItem_code"]);
                    $vOrderFavorite->setProductItemName($rec["productItem_name"]);
                    $vOrderFavorite->setProductItemPrice($rec["productItem_price"]);
                    $vOrderFavorite->setRegistDate($rec["registDate"]);
                    $vOrderFavoriteList[] = $vOrderFavorite; // お気に入りビューリストへ追加
                    $count++;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $vOrderFavoriteList;
    }

    /**
     * お気に入りテーブルに追加または削除する
     * @param $vOrderFavorite $お気に入りビューエンティティ
     */
    public function insertDeleteOrder($vOrderFavorite){
        $customerMail = $vOrderFavorite->getCustomerMail();
        $productGroupCode = $vOrderFavorite->getProductGroupCode();
        $productItemCode = $vOrderFavorite->getProductItemCode();
        $registDate = $vOrderFavorite->getRegistDate();

        try{
            // お気に入りテーブルを削除
            $sql1 = " DELETE FROM orderFavorite "
                . "     WHERE customer_mail=? "
                . "       AND productGroup_code=? "
                . "       AND productItem_code=? ";
            $stmt = $this->con->prepare($sql1);
            $stmt->bindParam(1, $customerMail);
            $stmt->bindParam(2, $productGroupCode);
            $stmt->bindParam(3, $productItemCode);
            $stmt->execute();

            if($stmt->rowCount() == 0){
                // お気に入りテーブル追加（上記の更新が不可の場合のみ）
                $sql2 = " INSERT INTO orderFavorite VALUES(?, ?, ?, ?) ";
                $stmt = $this->con->prepare($sql2);
                $stmt->bindParam(1, $customerMail);
                $stmt->bindParam(2, $productGroupCode);
                $stmt->bindParam(3, $productItemCode);
                $stmt->bindParam(4, $registDate);
                $stmt->execute();
            }
        }catch(PDOException $e){
            print $e->getMessage(). "<br>";
            throw $e;
        }
    }

}
?>