<?php
require_once('./views/component/cart.php');
$db= new Database();

$items = new item();
$showproduct = [];
$showproduct = $items->pagination();
$pagination = new pagination();

if(isset($_POST['sub'])){ 
    $search = ($_POST['search']) ;
    $showproduct = $items->getAllproduct($search);
    if(count($showproduct) == 0){
        echo " <script>alert('NOT FOUND')</script>";
        echo '<meta http-equiv="refresh" content="0;url=/index.php?action=home"/>';
    }
}

?>

<link rel="stylesheet" href="../style/products.css">

<div class="wrapper">
<div class="container container2">
    <div class="fa-sidebars">
        <form  method= "post">
            <div class="slide-bar" width="100vw">
                <input class="form-control mr-2 " type="search" name="search" placeholder="Search" aria-label="Search">
                <button type="submit" name="sub">SEARCH</button>
            </div>
        </form>
    </div>
    <h3 class="title-product">TOP</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 product" style=" margin-top:10px;">
        <?php
                foreach ($showproduct as $row) : ?>
            <div class="card-item col-3">
                <div class="card">
                    <form action="index.php?action=controller-cart&act=addCart" method="POST" class="form-product" enctype="multipart/form-data">
                            <div style="max-height:250px; overflow:hidden; display:flex;justify-content:center; height:200px">
                                <a style="margin-top: 40px;" href="index.php?action=home&act=detail&id=<?php echo $row['id']?>"><img class="card-img-top" src="./image/product/<?php echo $row['imageURL']?>" style="max-width:190px;" ></a>
                            </div>
                        <div class="card-body " style="flex:1;">
                            <h5 class="text-center"> <?=  number_format($row['price']) ?> vnđ</h5>
                            <h5 class="text-title d-flex"> 
                                 <b><?= $row['name'] ?></b>
                            </h5>
                            Quantity: <input type="number" name="quantity" value="1" min="1"  max="<?php echo $row['quantity']?>" class="input-form">
                        </div>
                        <button class="btn btn-secondary add-button" style="width: 100%;color:#00FA9A;" type="submit" name="addCart">ADD TO CART</button>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name= "total-quantity" value="<?php echo $row['quantity']?>">
                        </form>
                </div>
            </div>  
            <?php endforeach ?>
            <div class="fa-phantrang" style="width: 100%;">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pagination->getTotalPage($items->totalProduct(),8); $i++) : ?>
                                <li class="
                                <?php
                                if (isset($_GET['page'])) {
                                    if ($i == $_GET['page']) echo 'active';
                                } else {
                                    if ($i == 1) echo 'active';
                                }?>">
                                    <a href="index.php?action=home&act=product&page=<?php echo $i ?>"class = "btn btn-primary active1"><?php echo $i ?></a>
                                </li>
                            <?php endfor ?>
                        </ul>
                    </div>
                </div>
    </div>

 </div>
