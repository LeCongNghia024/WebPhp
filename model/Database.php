<?php

class Database
{
  public \PDO $pdo;
  public static Database $db;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=shop.local;port=3306;dbname=shop_dragon','root', '');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    self::$db=$this;

    
  }
}
