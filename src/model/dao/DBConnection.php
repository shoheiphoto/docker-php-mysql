<?php
/**
 *
 * DBConnection.php
 *
 */

class DBConnection{
  /** データベース接続URL */
  private static $URL = "mysql:host=php_db;dbname=shoppingDBAbe;charset=utf8";
  /** ユーザー名 */
  private static $USER = "php_app";
  /** パスワード */
  private static $PASSWORD = "app_pass";

  /**
   * データベースの接続を取得する。
   * @return $DBコネクション
   */
  public static function getConnection(){
    $con = null;
    try {
      $con = new PDO(self::$URL, self::$USER, self::$PASSWORD);
    } catch(PDOException $e) {
      throw $e;
    }
    return $con;
  }

}

?>