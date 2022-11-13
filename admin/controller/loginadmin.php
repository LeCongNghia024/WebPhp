<?php

$action = $_GET['act'] ?? 'loginadmin';

switch ($action) {
  case 'loginadmin':
    require_once './view/loginadmin.php';
    break;
  case 'login_admin':
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //   $cypt = md5($password);
      $admin = new Admin();

      $logadmin = $admin->getAdmin($email, $password);
  
      if ($logadmin) {
        $_SESSION['admin_id'] = $logadmin['admin_id'];
        $_SESSION['admin_name'] = $logadmin['admin_name'];
        $_SESSION['email']=$logadmin['email'];
        $_SESSION['rule'] = $logadmin['rule'];  
        echo '<script>alert("Đăng nhập thành công")</script>';
        echo '<meta http-equiv="refresh" content="0;url=/admin/index.php"/>';
      }else {
        echo '<script>alert("Đăng nhập không thành công")</script>';
        echo '<meta http-equiv="refresh" content="0;url=/index.php?act=home"/>';
      }
    }
    break;
  case 'logout_admin':
    if (isset($_SESSION['admin_id']) && isset($_SESSION['email'])) {
      session_destroy();
      echo '<meta http-equiv="refresh" content="0;url=/">';
    } 
    break;
  default:
    require_once './view/loginadmin.php';
    break;
}
