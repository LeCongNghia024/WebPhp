<?php

$action = $_GET['act'] ?? 'home';

switch ($action) {
  case 'home':
    if (isset($_SESSION['admin_id'])){
    require_once './view/content.php';
    }
    break;
      case 'delete':
      require_once './model/delete.php';
      break;
      case 'loginadmin':
        require_once './view/loginadmin.php';
        break;
      case 'list':
        require_once './view/listproduct.php';
        break;
      case 'table':
        require_once './view/table.php';
        break;
      case 'content':
        require_once './view/content.php';
        break;
      case 'chart':
        require_once './view/chart.php';
        break;
      case 'card':
        require_once './view/card.php';
        break;
      case 'button':
        require_once './view/button.php';
        break;
      case 'listorder':
        require_once './view/list_order.php';
        break;
      case 'register':
        require_once './view/register.php';
        break;
      case 'forgotpassword':
        require_once './view/forgotpassword.php';
        break;
      case 'post':
        require_once './view/post.php';
        break;
          
      case 'managepost':
        require_once './view/managepost.php';
        break;
          
      case 'create':
        require_once './view/create.php';
        break;
      case 'edit':
        require_once './view/edit.php';
        break;  
  default:
  require_once './index.php';
   break;
 }
            