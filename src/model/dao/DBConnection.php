<?php
/**
 *
 * DBConnection.php
 *
 */

class DBConnection{
  /** データベース接続URL */
  private static $URL = "mysql:host=localhost;dbname=shoppingDBAbe;charset=utf8";
  /** ユーザー名 */
  private static $USER = "root";
  /** パスワード */
  private static $PASSWORD = "";

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