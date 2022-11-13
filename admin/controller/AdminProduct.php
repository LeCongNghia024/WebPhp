<?php
$item = new item();
$product = $item->getAllproduct();
$action = $_GET['act'] ?? "list";

switch ($action) {
  case 'create':
    require_once './view/create.php';
    break;
  case 'add':
    // $item = new item();
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //   $item = [];
    //   if ($_FILES['image'] && $_FILES['image']['name']) {
    //     $imagePath = '../image/acc/' . basename($_FILES['image']['name']);
    //     move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    //   }
    //   $acc['cost'] = $_POST['cost'];
    //   $acc['accname'] = $_POST['accname'];
    //   $acc['password'] = $_POST['password'];
    //   $acc['image'] = $_FILES['image']['name'];
    //   $acc['type'] = $_POST['type'];
    //   $acc['rank'] = $_POST['rank'];
    //   $acc['skin'] = $_POST['skin'];
    //   $acc['char'] = $_POST['char'];
    //   $acc['description'] = $_POST['description'];
    //   if ($account->updateAcc($acc)) {
    //     require_once "./view/home.php";
    //   } else {
    //     header("Location: /shopacc-master/admin.php?action=accgame");
    //   }
    // }
    break;
  case 'delete':
    if (isset($_GET['id'])) {
      unset($_SESSION[$product][$_GET['id']]);
      echo '<meta http-equiv="refresh" content="0; url=/index.php?act=list"/>';
    }
    break;

  case 'edit':
    $db = new Database();
    $item = new item();
    $image_err='';
        if(!empty($_FILES)){ 

          $file_name =$item->getTime() .$_FILES['upload']['name'];

          $permitted_extension = ['png','jpg','jpge','gif'];
          
          $destination_path = "../image/product/$file_name";
  
          $file_extension = explode('.',$file_name) ;
  
          $file_extension= strtolower(end($file_extension));
  
          if(in_array($file_extension,$permitted_extension)){  
  
          move_uploaded_file($_FILES['upload']['tmp_name'], $destination_path);

          $file_name = $item->getTime() .$_FILES['upload']['name'];
  
          $image_err = '<p style = "color:green">Uploaded</p>';
          
          }else{
              $image_err= 'Invalid file type';
          }
        }else{
          $file_name = $_GET['id']['imageURL'];
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $itemU=[];
        $itemU['id'] = $_GET['id']; 
        $itemU['name'] = $_POST['name']; 
        $itemU['file_name'] = $file_name; 
        $itemU['price'] = $_POST['price']; 
        $itemU['quantity'] = $_POST['quantity']; 
        $itemU['description'] = $_POST['description']; 
        if ($item->update($itemU)) {
 
          header('Location: index.php?act=home');
          echo '<script> alert("Success") </script>';
        }
      } else {
        header("Location: index.php?action=AdminProduct&act=edit&id=" . $_GET['id'] . "");
      }
    break;
} 