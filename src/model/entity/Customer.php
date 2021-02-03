<?php
/**
 * Customer.php
 * 顧客エンティティ
 */
class Customer{

    /** メールアドレス */
    private $mail;

    /** パスワード */
    private $password;

    /** 名前かな */
    private $kana;

    /** 名前 */
    private $name;

    /** 電話番号 */
    private $telNo;

    /** 郵便番号 */
    private $postCode;

    /** 住所 */
    private $address;

    /** 生年月日 */
    private $birthday;

    /**
     * コンストラクタ
     * @param $mail     $メールアドレス
     * @param $password $パスワード
     * @param $kana     $名前かな
     * @param $name     $名前
     * @param $telNo    $電話番号
     * @param $postCode $郵便番号
     * @param $address  $住所
     * @param $birthday $生年月日
     */
    public function __construct(
        $mail = ""
        , $password = ""
        , $kana = ""
        , $name = ""
        , $telNo = ""
        , $postCode = ""
        , $address = ""
        , $birthday = ""
        ){
            $this->mail = $mail;
            $this->password = $password;
            $this->kana = $kana;
            $this->name = $name;
            $this->telNo = $telNo;
            $this->postCode = $postCode;
            $this->address = $address;
            $this->birthday = $birthday;
    }

    /**
     * メールアドレスを設定する
     * @param $mail $メールアドレス
     */
    public function setMail($mail){
        $this->mail = $mail;
    }

    /**
     * パスワードを設定する
     * @param $password $パスワード
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * 名前かなを設定する
     * @param $kana $名前かな
     */
    public function setKana($kana){
        $this->kana = $kana;
    }

    /**
     * 名前を設定する
     * @param $name $名前
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * 電話番号を設定する
     * @param $telNo $電話番号
     */
    public function setTelNo($telNo){
        $this->telNo = $telNo;
    }

    /**
     * 郵便番号を設定する
     * @param $postCode $郵便番号
     */
    public function setPostCode($postCode){
        $this->postCode = $postCode;
    }

    /**
     * 住所を設定する
     * @param $address $住所
     */
    public function setAddress($address){
        $this->address = $address;
    }

    /**
     * 生年月日を設定する
     * @param $birthday $会員生年月日
     */
    public function setBirthday($birthday){
        $this->birthday = $birthday;
    }

    /**
     * メールアドレスを取得する
     * @return $メールアドレス
     */
    public function getMail(){
        return $this->mail;
    }

    /**
     * パスワードを取得する
     * @return $パスワード
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * 名前かなを取得する
     * @return $名前かな
     */
    public function getKana(){
        return $this->kana;
    }

    /**
     * 名前を取得する
     * @return $名前
     */
    public function getName(){
        return $this->name;
    }

    /**
     * 電話番号を取得する
     * @return $電話番号
     */
    public function getTelNo(){
        return $this->telNo;
    }

    /**
     * 郵便番号を取得する
     * @return $郵便番号
     */
    public function getPostCode(){
        return $this->postCode;
    }

    /**
     * 住所を取得する
     * @return $住所
     */
    public function getAddress(){
        return $this->address;
    }

    /**
     * 生年月日を取得する
     * @return $生年月日
     */
    public function getBirthday(){
        return $this->birthday;
    }

}
?>