<?php

$items = new item();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $item = $items->getItem($id);
}
?>

<link rel="stylesheet" href="../style/detail.css">
<div class="wrapper">
    <section class=" header-detail">
        <div class="container card-item3"> 
        <form action="index.php?action=controller-cart&act=addCart" method="post" class="d-flex form-detail">
            <div class="col-5 left-detail">
                <div class="row">
                    <div class="col">
                        <img class="img-detail" src="./image/product/<?php echo $item['imageURL']?>" style="width: 300px;">
                    </div>
                </div>
            </div>
            <div class="col-6 right-detail">
                <div class="info-pay">
                    <h2 class="text-title mt-1"><?php echo $item['name']?></h2>
                    <p>Quantity: <input type="number" name="quantity" value="1" min="1" class="input-form"></p>
                    <h5 class="price"> Price: <?php echo $item['price'] ?> $</h5>
                    <div class="choce-color">
                        <h5 class="text-check ">Color</h5>
                        <div class="color d-flex">
                            <a href="" class="check-color">
                                <span  class="check rounded-circle">

                                </span>
                                <span class="text1">
                                    Red
                                </span>
                            </a>
                            <a href="" class="check-color">
                                <span  class="check1 rounded-circle">

                                </span>
                                <span class="text1 ">
                                    Blue
                                </span>
                            </a>
                            <a href="" class="check-color">
                                <span  class="check2 rounded-circle">
                                </span>
                                <span class="text1">
                                    Black
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="choce-size">
                        <h5 class="text-check ">Size</h5>
                        <div class="color d-flex">
                            <div class="ml-2">
                                <input type="radio" name="size" id="m" value="m" required>
                                <label for="size">M</label>
                            </div>
                            <div class="ml-2">
                                <input type="radio" name="size" id="s" value="s" required>
                                <label for="size">S</label>
                            </div>

                            <div class="ml-2">
                                <input type="radio" name="size" id="l" value="l" required>
                                <label for="size">L</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="description">
                            <h4> Information:</h4>
                            <p> <?php echo $item['description']?></p> 
                </div>
                    <button class="btn btn-primary add-button" style="width: 49%; margin-right: 2px; float:right" type="submit" name="addCart">ADD TO CART</button>
                    <input type="hidden" name="id"  value="<?php echo $item['id']?>">
                    <a class="btn btn-success btn-block" style="width:49%;" href="index.php?action=home&act=order"> <i>Buy Now</i> </a>
      
            </div>
        </form>
        </div>
    </section> 
    <div>
        <!-- <div class="container">
            <div class="wrapper">
                
            </div>
        </div> -->
     <center> <hr style="width: 50%;"> </center>
     <?php if(isset($_SESSION['user_id'])){?>
    <div class="form-rate">
        <form class="cmt" action="index.php?action=detail&act=detail_comment&id=<?php echo $_GET['id'] ?>" method="post">
            <h5> Hãy đánh giá cho sản phẩm "<?php echo $item['name']?>"</h5>
            <div class="d-flex" > 
                <div class="rate">
                    <input type="radio" value="1" name="rate" id="1" required>
                    <label for="1"><i class="fas fa-star"></i></label>
                </div>
                <div class="rate">
                    <input type="radio" value="2" name="rate" id="2">
                    <label for="2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="rate">
                    <input type="radio" value="3" name="rate" id="3">
                    <label for="3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="rate">
                    <input type="radio" value="4" name="rate" id="4">
                    <label for="4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="rate">
                    <input type="radio" value="5"  name="rate" id="5" >
                    <label for="5">
                    <i class="fas fa-star" ></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </label>
                </div>
                    
            </div>
            <p>Nhận xét *</p> 
            <textarea id="" cols="60"  rows="6" max-width ="300px" max-height="200px" name="comment"></textarea><br>
            <button class="btn btn-primary" type="submit" name="submit">Send</button>
            <button class="btn btn-secondary"> Cancle</button>
        </form>
    </div>  
    <?php } ?>
    </div>
    <!-- <section class="like">
        <div class ="may-like">
        <h4>You may like?</h4>
        <img src="./image/icon.jpg" width="250px" alt="">
        </div>
    </section> -->
</div>
<style>
   
</style>