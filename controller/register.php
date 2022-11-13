<?php

$action = $_GET['act'] ?? 'register';

switch ($action) {
  case 'register':
    require_once './views/component/register.php';
    break;
  case 'register_action':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //   $name = $_POST['name'];
      $user = new User();
      if($user->checkEmail($_POST['email'] )){
        echo "<script>alert('Tai Khoan da ton tai')</script>";
        require_once './views/component/register.php';
      }else{
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $password_repeat = $_POST['passrepeat'];
          // echo '<pre>';
          // var_dump($_POST);
          // echo '</pre>';
          // exit;

        if($_POST['password'] != $_POST['passrepeat']){
          echo "<script>alert('Xac nhan mat khau chua dung')</script>";
          echo '<meta http-equiv="refresh" content="0;url=' .$_SERVER["HTTP_REFERER"].'"/>';
          exit;
        }else{
          $user->insertUser($user_name, $email,$phone,$address,  $password);
          echo "<script>alert('Đăng kí thành công')</script>";
          require_once './views/component/login.php';
        }
      }
    }
    break;
  default:
    require_once './views/component/register.php';
    break;
}