<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="css" href="./sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image" href="./image/short.png">    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <title>MARKET</title>
</head>
<body id="page-top">
    <div class="wrapper">

    
    <?php
    session_start();

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';  
    // session_destroy();
    // exit;
    set_include_path(get_include_path() . PATH_SEPARATOR . './model/');
    spl_autoload_extensions('.php');
    spl_autoload_register();

    require_once('./views/component/header.php');
    $ctr = $_GET['action'] ?? "home";
    require_once './controller/' . $ctr . '.php';
    // require_once('./views/component/sidebars.php');
    ?>
</div>  
<?php
require_once('./views/component/footer.php');
?> 





<!-- Page level plugins -->


<!-- Page level custom scripts -->


<script src="./admin/vendor/jquery/jquery.min.js"></script>
<script src="./admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./admin/js/sb-admin-2.min.js"></script>
</body>
</html>
<style>
    .wrapper{
        min-height: 74vh;
    }
    body{
        background-color: #aaeeec;
    }
</style>
 