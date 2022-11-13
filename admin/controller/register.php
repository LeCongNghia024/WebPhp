<?php

$action = $_GET['act'] ?? 'register';

switch ($action) {
  case 'register':
    require_once './view/register.php';
    break;
  case 'register_admin':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //   $name = $_POST['name'];
      $admin = new Admin();
      if($admin->checkEmail($_POST['email'] )){
        echo "<script>alert('Tai Khoan da ton tai')</script>";
        require_once './view/register.php';
      }else{
        $admin_name = $_POST['admin_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rule =$_POST['rule'];
        
        $admin->insertAdmin($admin_name,$email, $password, $rule);
        echo "<script>alert('Đăng kí thành công')</script>";
        require_once './view/loginadmin.php';
      }
    }
    break;
  default:
    require_once './view/register.php';
    break;
}