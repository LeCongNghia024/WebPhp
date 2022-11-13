<?php 
    $action = $_GET['act'] ?? "contact";

    switch ($action){
        case 'contact':
            require_once './views/component/contact.php';
            break;
        case 'sendmail':
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                var_dump($_POST);
                exit();

            }
        break;
        default:
        require_once './views/component/detail  .php';  
         break;
    }