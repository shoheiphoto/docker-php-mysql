<?php
@session_start();
/**
 * Go.php
 * クライアントからのリクエスト(buttonID)により処理を振り分ける
 */

/** entityのinclude */
require_once("../model/entity/Customer.php");
require_once("../model/entity/ProductGroup.php");
require_once("../model/entity/ProductItem.php");
require_once("../model/entity/ProductStorage.php");
require_once("../model/entity/VOrderFavorite.php");
require_once("../model/entity/VOrders.php");
// require_once("../model/entity/Vproduct.php");
require_once("../model/entity/PropertyDefine.php");

/** DAOのinclude */
require_once("../model/dao/DBConnection.php");
require_once("../model/dao/CustomerDAO.php");
require_once("../model/dao/ProductDAO.php");
require_once("../model/dao/OrdersDAO.php");
require_once("../model/dao/OrderFavoriteDAO.php");

/** ボタンIDを取得、設定 */
if(isset($_REQUEST["buttonID"])){
    $buttonID = $_REQUEST["buttonID"]; // リクエストのボタンIDを設定
}else{
    $buttonID = $initialButtonID; // 初期リクエスト時のボタンIDを設定
}

/** ボタンIDからLogic名を決定、include */
$logicName = $buttonID. "Logic.php"; // Logic名=ボタンID."Logic.php"
require_once("../model/logic/". $logicName); // $nextViewが決定される

/** $nextViewからView名を決定、include */
$viewName = $nextView. ".php"; // View名=$nextView.".php"
require_once("../view/".$viewName); // レスポンスするHTMLが作成される

?>