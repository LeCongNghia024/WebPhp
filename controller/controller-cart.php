<?php
$cart = new Cart();
$action = $_GET['act'] ?? "cart";


  if(!isset($_SESSION['cart'])){

    $_SESSION['cart'] = array();

}
switch ($action) {
  case 'cart':
    require_once './views/component/shopping-cart.php';
    break;
  case 'addCart':
    if (isset($_POST['id']) && isset($_POST['quantity'])) {  
        if(isset($_SESSION['cart'][$_POST['id']])){
          if($_SESSION['cart'][$_POST['id']]['quantity'] + $_POST['quantity'] > $_POST['total-quantity']){
            echo '<script>alert("San Pham trong kho khong du")</script>';
            echo '<meta http-equiv="refresh" content="0;url=/index.php?action=home&act=cart"/>';

          }else{
            $cart->addCart($_POST['id'], $_POST['quantity']);
            echo '<meta http-equiv="refresh" content="0;url=/index.php?action=home&act=cart"/>';
          }
     }else{
      $cart->addCart($_POST['id'], $_POST['quantity']);
      echo '<meta http-equiv="refresh" content="0;url=/index.php?action=home&act=cart"/>';
     }
    }
    break;

  case 'delete_item':
    if (isset($_GET['id'])) {
      unset($_SESSION['cart'][$_GET['id']]);
    }
    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=cart"/>';
    break;
  case 'edit':
    if (isset($_POST['submit'])){
      if($_POST['quantity'] > $_SESSION['cart'][$_POST['id']]['total-quantity'] ){
          echo '<script> alert("Số lượng trong kho hiện tại không đủ")</script>';
      } else{
        if($_POST['quantity'] == 0){
          unset($_SESSION['cart'][$_POST['id']]);
        }else{

          $_SESSION['cart'][$_POST['id']]['quantity'] = $_POST['quantity'];
        }
      }
    }
    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=cart"/>';
    break;
} 