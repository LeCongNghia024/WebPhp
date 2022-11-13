<?php

$action = $_GET['act'] ?? 'home';

switch ($action) {
  case 'home':
    require_once './views/component/products.php';
    break;
  //client controller  
       case 'products':
        require_once './views/component/products.php';
         break;
      case 'create':
        require_once './admin/view/create.php';
        break;
      case 'cart':
        require_once './views/component/shopping-cart.php';
        break;
      case 'blog':
        require_once './views/component/blog.php';
        break;
        case 'detail':
          require_once './views/component/detail.php';
          break;
      case 'login':
          require_once './views/component/login.php';
          break;
      case 'signup':
          require_once './views/component/register.php';
          break;
      case 'updatepass':
          require_once './views/component/updatepass.php';
          break;
      case 'order':
          require_once './views/component/order.php';
          break;
      case 'detail_order':
          require_once './views/component/detail_order.php';
          break;
      case 'done':
          require_once './views/component/done.php';
          break;
      case 'contact':
          require_once './views/component/contact.php';
          break;

            // ADMIN controller  

    case 'delete':
        require_once './admin/view/delete.php';
        break;
    case 'loginadmin':
          require_once './admin/view/loginadmin.php';
          break;
    case 'edit':
          require_once './admin/view/edit.php';
          break;

      
  default:
    require_once './views/component/products.php';
    break;
}
