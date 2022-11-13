<?php
class item{
 public function getAllproduct($search)
    {
        $db = new Database();
        if($search){
          $statement = $db->pdo->prepare("SELECT * FROM product WHERE name LIKE :search ");
          $statement->bindValue(':search', "%$search%");
        }else{
          $statement = $db->pdo->prepare("SELECT * FROM product");
        }

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTime()
  {
    return (new DateTime())->getTimestamp();
  }

  public function getItem($id)
  {
    $db = new Database();
    $statement = $db->pdo->prepare("SELECT * FROM product WHERE :id = id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function pagination(){
    $db = new Database();
    $item_per_page = 8 ;
    $current_page= $_GET['page'] ?? 1;
    $offset= ($current_page - 1) * $item_per_page;

    $statement = $db->pdo->prepare("SELECT * FROM `product` ORDER BY `id` ASC LIMIT ".$item_per_page." OFFSET ".$offset." "); 
    $statement ->execute();
    return $statement->fetchALl(PDO::FETCH_ASSOC);
    
} 

public function totalProduct(){
  $db = new Database();
  $statement = $db->pdo->prepare("SELECT COUNT(*) as 'total-product' FROM product");
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC)['total-product'];
}

public function rateProduct($id_product, $rate, $comment){
  $db= new Database();
  $statement = $db->pdo->prepare("INSERT INTO rate_product(`id_product`, `rate`, `comment`, `date`) 
  VALUES (:id_product,:rate,:comment,:date) ");

  $statement->bindValue('id_product', $id_product);
  $statement->bindValue('rate',$rate);
  $statement->bindValue('comment',$comment);
  $statement->bindValue('date', date('Y-m-d'));

  $statement->execute();

}


}
?>