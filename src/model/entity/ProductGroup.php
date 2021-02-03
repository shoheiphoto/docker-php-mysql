<?php
/**
 * ProductGroup.php
 * 商品グループティティ
 */
class ProductGroup{

    /** 商品グループコード */
    private $code;

    /** 商品グループ名 */
    private $name;

    /** 単位名 */
    private $unitName;

    /**
     * コンストラクタ
     * @param $code $商品グループコード
     * @param $name $商品グループ名
     * @param $unitName          $単位名
     */
    public function __construct(
        $code = ""
        , $name = ""
        , $unitName = ""
        ){
            $this->code = $code;
            $this->name = $name;
            $this->unitName = $unitName;
    }

    /**
     * 商品グループコードを設定する
     * @param $code $商品グループコード
     */
    public function setCode($code){
        $this->code = $code;
    }

    /**
     * 商品グループ名を設定する
     * @param $name $商品グループ名
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * 単位名を設定する
     * @param $unitName $単位名
     */
    public function setUnitName($unitName){
        $this->unitName = $unitName;
    }

    /**
     * 商品グループコードを取得する
     * @return $商品グループコード
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * 商品グループ名を取得する
     * @return $商品グループ名
     */
    public function getName(){
        return $this->name;
    }

    /**
     * 単位名を取得する
     * @return $単位名
     */
    public function getUnitName(){
        return $this->unitName;
    }

}
?>