<?php 
    $action = $_GET['act'] ?? "detail";

    switch ($action){
        case 'detail':
            require_once './views/component/detail.php';
            break;
        case 'detail_comment':
        $item = new item();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id_product = $_GET['id'];

            $rate = $_POST['rate'];
            $comment = $_POST['comment'];

            $id_rate = $item->rateProduct($id_product,$rate,$comment);
            echo '<script>alert("Đánh giá thành công")</script>';
            echo '<meta http-equiv="refresh" content="0;url=' .$_SERVER["HTTP_REFERER"].'"/>';
        }

        break;
        default:
        require_once './views/component/detail  .php';  
         break;
    }