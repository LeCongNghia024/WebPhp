<?php
$action = $_GET['act'] ?? "order";

switch ($action) {
  case 'order':
    require_once './views/component/order.php';
    break;
  case 'order_detail':
    $user = new User();
   
    $name_err = $fn_err= $phone_err = $address_err =$province_err= $district_err = $ward_err='';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $order = new order();
          $user_id = $_SESSION['user_id'];
          $name = $_POST['name'];
          $firstname = $_POST['firstname'];
          $phone = $_POST['phone'];
          $email = $_SESSION['email'];
          $address = $_POST['address'] .$_POST['ward'] .$_POST['district'] .$_POST['province']; 
          $note = $_POST['note'];
          $delivery = $_POST['delivery'];
          $pay = $_POST['pay'];
          $receive = $_POST['receive'];
          $total = $_SESSION['total'];

          $id_order =$order->saveinfo($user_id, $name, $firstname, $email, $phone,  $address, $note,$pay, $delivery,  $receive);


          foreach($_SESSION['cart'] as $product){
            $order->saveOderdetail(['product_id' => $product['id'] ,'quantity' => $product['quantity'],'id_order' => $id_order['id']]);
          } 
          $_SESSION['id_order'] = $id_order['id'];
          echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=done"/>';
          
        }

      echo '<meta http-equiv="refresh" content="0;url=../index.php?action=order"/>';
      break;
    }
    