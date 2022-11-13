<link rel="stylesheet" href="../style/header.css">

<div class="header " >
    <nav class="navbar d-flex">
        <div class="container-fluid"style="height: 100px;">
            <div class="left-header ">
                <a class="navbar-brand">
                    <img class="image-con" src="./image/logo/logocn.jpg" style="height: 50px; background:none;">
                    <p class="text" align="center" style="font-size: 10px;font: bold; color:black; ">CN SHOP</p>
                </a>
                <nav class="nav mt-3">
                    <a class="nav-link active" style="color:black;font-size:20px" href="index.php?action=home">PAGE</a>
                    <a class="nav-link" style="color:black;font-size:20px" href="#">ABOUT</a>
                    <a class="nav-link" style="color:black;font-size:20px" href="index.php?action=home&act=blog">BLOG</a>
                    <a class="nav-link" style="color:black;font-size:20px" href="index.php?action=home&act=contact">CONTACT</a>
                    <?php if(!isset($_SESSION['user_id'])){ ?>
                    <a class="nav-link" style="color:black; font-size:20px" href="index.php?action=home&act=signup">REGISTER</a>
                    <a class="nav-link" style="color:black; font-size:20px" href="index.php?action=home&act=login">LOGIN</a>
                    <a class="nav-link" style="color:black; font-size:20px" href="index.php?action=home&act=loginadmin">ADMIN</a>
                    <?php }?>
                </nav>

            </div>
            <div class="wrapper-right">   
            <?php if(isset($_SESSION['user_id'])){?>            
                <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle d-flex" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <img class="img-profile rounded-circle"
                            src="image/login.png">
                        </a>
                        <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <h5 align = center> <?php echo $_SESSION['user_name'] ?></h5>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="index.php?action=home&act=updatepass">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?action=login&act=logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        <?php }?>
                    </li>      
            </div>
        </div>
    </nav>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>                                   
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php?action=login&act=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

