<?php

class order
{
  function saveOderdetail($Oderdetail)
  {
  
  // echo '<pre>';
  // var_dump($Oderdetail);
  // echo '</pre>';
  // exit;
  
    $db = new Database();
    $statement = $db->pdo->prepare("INSERT INTO list_order(list_order_id ,product_id,quantity) 
    VALUES (:id_order, :product_id, :quantity)");
    $statement->bindValue(':id_order', $Oderdetail['id_order']);
    $statement->bindValue(':product_id',$Oderdetail['product_id']);
    $statement->bindValue(':quantity', $Oderdetail['quantity']);
    $statement->execute();

  }

  function saveinfo( $user_id, $name, $firstname, $email, $phone,  $address, $note, $pay, $delivery,  $receive)
  {
    $db = new Database();
    $statement = $db->pdo->prepare("INSERT INTO info_client(user_id, name, firstname, phone, email, address, note, date, pay, delivery, receive, status) 
    VALUES (:user_id, :name, :firstname, :phone, :email, :address, :note, :date, :pay, :delivery, :receive, :status)");

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':address', $address);  
    $statement->bindValue(':note', $note);  
    $statement->bindValue(':pay', $pay);
    $statement->bindValue(':delivery', $delivery);
    $statement->bindValue(':receive', $receive);
   
    $statement->bindValue(':date', date('Y-m-d'));
    $statement->bindValue(':status', 0);
  

    $statement->execute();

    $statement = $db->pdo->prepare("SELECT id_oder AS id FROM info_client ORDER BY id_oder DESC LIMIT 1");

    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  function updateSumOrder($orderId)
  {
    $db = new Database();
    $cart = new Cart();

    $statement = $db->pdo->prepare("UPDATE BILL 
    SET SUM_MONNEY= :sum_monney
    WHERE BILL_ID = :bill_id");
    $statement->bindValue(':sum_monney', $cart->subTotal());
    $statement->bindValue(':bill_id', $orderId);
    $statement->execute();
  }


  function getOrderUser($orderId)
  {
    $db = new Database();
    $statement = $db->pdo->prepare("SELECT B.BILL_ID, B.DATE_ORDER, UA.NAME, UA.PHONE FROM bill B 
    JOIN user_acc UA ON B.USER_ID = UA.USER_ID WHERE B.BILL_ID = :orderId");
    $statement->bindValue(':orderId', $orderId);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  function getOrder($orderId)
  {
    $db = new Database();
    $statement = $db->pdo->prepare("SELECT AG.ACC_ID, AG.IMAGE, AG.ACC_NAME, AG.ACC_PASS, BD.COST FROM acc_game AG 
    JOIN bill_detail BD ON AG.ACC_ID = BD.ACC_ID WHERE BD.BILL_ID = :orderId");
    $statement->bindValue(':orderId', $orderId);
    $statement->execute();
    return $statement->fetchALL(PDO::FETCH_ASSOC);
  }
}
