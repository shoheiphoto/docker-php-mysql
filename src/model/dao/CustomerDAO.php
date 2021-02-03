<?php
/**
 * CustomerDAO.php
 * 顧客テーブル DAO
 */
require_once ("../model/dao/DBConnection.php");
require_once ("../model/entity/Customer.php");

class CustomerDAO{

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
     * 顧客を1件検索する
     *
     * @param $mail $メールアドレス
     */
    public function findOne($mail){
        $customer = null;
        $sql = " SELECT * FROM customer WHERE mail=? ";

        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $mail);
            $stmt->execute();
            if ($stmt != null && $stmt->rowCount() > 0) {
                foreach ($stmt as $rec) {
                    $customer = new Customer();
                    $customer->setMail($rec["mail"]);
                    $customer->setPassword($rec["password"]);
                    $customer->setKana($rec["kana"]);
                    $customer->setName($rec["name"]);
                    $customer->setTelNo($rec["telNo"]);
                    $customer->setPostCode($rec["postCode"]);
                    $customer->setAddress($rec["address"]);
                    $customer->setBirthday($rec["birthday"]);
                    break;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $customer;
    }

    /**
     * 顧客を1件検索する（電話番号）
     *
     * @param $telNo $電話番号
     */
    public function findOneTelNo($telNo){
        $customer = null;
        $sql = " SELECT * FROM customer WHERE telNo=? ";

        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $telNo);
            $stmt->execute();
            if ($stmt != null && $stmt->rowCount() > 0) {
                foreach ($stmt as $rec) {
                    $customer = new Customer();
                    $customer->setMail($rec["mail"]);
                    $customer->setPassword($rec["password"]);
                    $customer->setKana($rec["kana"]);
                    $customer->setName($rec["name"]);
                    $customer->setTelNo($rec["telNo"]);
                    $customer->setPostCode($rec["postCode"]);
                    $customer->setAddress($rec["address"]);
                    $customer->setBirthday($rec["birthday"]);
                    break;
                }
            }
        } catch (PDOException $e) {
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $customer;
    }

    /**
     * 顧客を1件追加する
     *
     * @param $customer $顧客エンティティ
     */
    public function insertOne($customer){
        $result = false;
        try{
            // テーブル追加
            $sql = " INSERT INTO customer VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";
            $mail = $customer->getMail();
            $password = $customer->getPassword();
            $kana = $customer->getKana();
            $name = $customer->getName();
            $telNo = $customer->getTelNo();
            $postCode = $customer->getPostCode();
            $address = $customer->getAddress();
            $birthday = $customer->getBirthday();
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $mail);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $kana);
            $stmt->bindParam(4, $name);
            $stmt->bindParam(5, $telNo);
            $stmt->bindParam(6, $postCode);
            $stmt->bindParam(7, $address);
            $stmt->bindParam(8, $birthday);
            $stmt->execute();
            if($stmt->rowCount() <= 0){
                return $result;
            }
            $result = true;
        }catch(PDOException $e){
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $result;
    }

    /**
     * 顧客を1件変更する
     *
     * @param $customer $顧客エンティティ
     */
    public function modifyOne($customer){
        $count = 0;
        try{
            // テーブル変更
            $sql = " UPDATE customer "
                . " SET password=? "
                . " , kana=? "
                . " , name=? "
                . " , telNo=? "
                . " , postCode=? "
                . " , address=? "
                . " , birthday=? "
                . " WHERE mail=? ";
            $mail = $customer->getMail();
            $password = $customer->getPassword();
            $kana = $customer->getKana();
            $name = $customer->getName();
            $telNo = $customer->getTelNo();
            $postCode = $customer->getPostCode();
            $address = $customer->getAddress();
            $birthday = $customer->getBirthday();
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(8, $mail);
            $stmt->bindParam(1, $password);
            $stmt->bindParam(2, $kana);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $telNo);
            $stmt->bindParam(5, $postCode);
            $stmt->bindParam(6, $address);
            $stmt->bindParam(7, $birthday);
            $stmt->execute();
            $count = $stmt->rowCount();
        }catch(PDOException $e){
            print $e->getMessage(). "<br>";
            throw $e;
        }
        return $count;
    }

}
?>