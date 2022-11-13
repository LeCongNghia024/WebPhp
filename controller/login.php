<?php

$action = $_GET['act'] ?? 'login';

switch ($action) {
  case 'login':
    require_once './views/components/login.php';
    break;
  case 'login_action':
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $email = $_POST['email'];
      $password = $_POST['password'];
    //   $cypt = md5($password);
      $user = new User();
      
      $log = $user->getUser($email,$password);
  
      if ($log) {
        $_SESSION['user_id'] = $log['user_id'];
        $_SESSION['user_name'] = $log['user_name'];
        $_SESSION['email'] = $log['email'];
        $_SESSION['phone'] = $log['phone'];
        $_SESSION['date']  =$log['date'];
        $_SESSION['password']  =$log['password'];
      
        echo '<script>alert("Đăng nhập thành công")</script>';
        
        echo '<meta http-equiv="refresh" content="0;url=/"/>';
      } else {  
        echo '<script>alert("Đăng nhập không thành công")</script>';
        require './views/component/login.php';
      }
 }
    break;
    case 'updatepass':
      if($_SERVER['REQUEST_METHOD'] === "POST"){
        $password = $_POST['password'];
        $newpass = $_POST['newpass'];
        $newpassrepeat = $_POST['newpass-repeat'];

        $user= new User();
  
        $check= $user->checkpass($password);
        
        if($check){
          if( $newpass == $newpassrepeat){
          $newpassword = $newpass;
          $user->updatepass($newpassword);
          echo '<script>alert("Cập Nhật Thành Công")</script>';
          echo '<meta http-equiv="refresh" content="0;url=' .$_SERVER["HTTP_REFERER"].'"/>';
         }else{
          echo '<script>alert("Xác Nhận Mật Khẩu Chưa Đúng")</script>';
          echo '<meta http-equiv="refresh" content="0;url=' .$_SERVER["HTTP_REFERER"].'"/>';
         }

        }else{
          echo '<script>alert("Mật Khẩu Cũ Không Đúng")</script>';
          echo '<meta http-equiv="refresh" content="0;url=' .$_SERVER["HTTP_REFERER"].'"/>';
          
        }

      }
      break;
  case 'logout':
    if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
      session_destroy();
      echo '<meta http-equiv="refresh" content="0;url=/index.php?action=home"/>';
    }

    break;
  default:
    require_once './views/component/login.php';
    break;
}
