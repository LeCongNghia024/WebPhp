<?php
class item{

 public function getAllproduct()
    {
        $db = new Database();
        $statement = $db->pdo->prepare("SELECT * FROM product");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  public function getTime()
    {
      return (new DateTime())->getTimestamp();
    }


  public function getproduct($id)
    {
        $db = new Database();

        $statement = $db->pdo->prepare("SELECT * FROM product where :id = id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($itemU){
      $db = new Database();  
      // $item = new item();
      // $item2 = $item->getproduct($_GET['id']);
        // if(!empty($_FILES)){ 
    
        //     $file_name = $item->getTime() .$_FILES['upload']['name'];
        //     $permitted_extension = ['png','jpg','jpge','gif'];
            
        //     $destination_path = "image/$file_name";
    
        //     $file_extension = explode('.',$file_name) ;
    
        //     $file_extension= strtolower(end($file_extension));
    
        //     if(in_array($file_extension,$permitted_extension)){  
    
        //     move_uploaded_file($_FILES['upload']['tmp_name'], $destination_path);
        //     $file_name = $_FILES['upload']['name'];
        // }else{
        //     $imageURL = $item2['imageURL'];
        // }
        $statement = $db->pdo->prepare("UPDATE `product` SET `name`=:name, `imageURL`= :file_name,`price`=:price,
        `quantity`= :quantity, `description`=:description WHERE :id = id");
        
        $statement ->bindParam(':id', $itemU['id']);
        $statement ->bindParam(':name', $itemU['name']);
        $statement ->bindParam(':file_name',$itemU['file_name']);
        $statement ->bindParam(':price', $itemU['price']);
        $statement ->bindParam(':quantity', $itemU['quantity']);
        $statement ->bindParam(':description', $itemU['description']);
        $statement ->execute();
        echo '<script> alert("Success") </script>';
  }
  public function pagination(){
    $db = new Database();
    $item_per_page = 4;
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
}
?>