<?php
class Cart{

  public function addCart($id ,$quantity){
    $db = new Database();

    $statement = $db->pdo->prepare('SELECT * FROM product WHERE id = :id');
    $statement->bindValue(':id',$id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cart'][$id])){
      $_SESSION['cart'][$id]['quantity'] += $quantity;

    }else{
    $item2 = array(
    'id' => $id,
    'name' => $result['name'],
    'image' => $result['imageURL'],
    'price' => $result['price'],
    'quantity' => $quantity,
    'description' => $result['description'],
    'total-quantity' => $result['quantity']
      );
      $_SESSION['cart'][$id] = $item2;
    } 
  }

 
  public static function subTotal()
  {
    $sum = 0;
    foreach ($_SESSION['cart'] as $item2) {
      $sum += $item2['price'] * $item2['quantity'];
    }
    return $sum;
  }
  public static function sumPrice($item2){
    $sumPrice=0;
    $sumPrice = $item2['price'] * $item2['quantity'];
    return $sumPrice;
  }

}


?>