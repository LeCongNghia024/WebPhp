
<link rel="stylesheet" href="../style/done.css">
<div class="done">

<?php
  if (!isset($_SESSION['id_order'])) : ?>
  <div class="content mt-5" style="justify-content:center;">
    <div class="content d-flex" style="justify-content:center;">
        <h2 > Pay Your Order   </h2>
    </div>
    <div class="button" align ="center">
        <a href="index.php?action=home&act=order" class="btn btn-danger">PAYMENT</a>
    </div>
</div>
  <?php else : ?>
    <div class="header-order">
        <div class="header-order-child">
            <a href="index.php?action=home&act=cart" class="active1">
                <h3>SHOPPING CART</h3>
            </a>
            <i class="fas fa-chevron-right fa-2x"></i>
            <a href="index.php?action=home&act=order" class="active2">
                <h3>PAYMENT</h3>
            </a>
            <i class="fas fa-chevron-right fa-2x"></i>
            <a href="index.php?action=home&act=done">
                <h3>DONE</h3>
            </a>
        </div>
    </div>
    <div class="table d-flex mt-3" style="justify-content: center;">
        <div class ="thongbao" >
            <div class="check-icon" >
                <img src="./image/check.png" width="80px" height="80px">
            </div>
            <h4 class="title" style="align-items:center;" >Bạn Đã Thanh Toán Thành Công</h4>
        </div>
    </div>
    <div class=" d-flex mt-3" style="justify-content: center;">
            <a class="btn btn-success" href="#">Xem chi tiết</a>
        </div>
    <div> 
    </div>
    <?php endif?>
</div>


