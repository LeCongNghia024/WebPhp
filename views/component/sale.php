<?php
require_once('./views/component/cart.php');


$items = new item();
$showproduct = [];
$showproduct = $items->pagination();
$pagination = new pagination();
?>

<div class="container container-sale mt-4" style="width:100vw;">
    <h3 class="title-product2">SALE %</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 product" style=" margin-top:10px;">
        <?php
                foreach ($showproduct as $row) : ?>
            <div class="card-item col-3">
                <div class="card">
                    <form action="index.php?aguction=controller-cart&act=addCart" method="POST" class="form-product" enctype="multipart/form-data">
                            <div style="max-height:250px; overflow:hidden; display:flex;justify-content:center; height:200px">
                                <a style="margin-top: 40px;" href="index.php?action=home&act=detail&id=<?php echo $row['id']?>"><img class="card-img-top" src="./image/product/<?php echo $row['imageURL']?>" style="max-width:160px;" ></a>
                            </div>
                        <div class="card-body " style="flex:1;">
                            <h5 class="text-center"> <?= $row['price'] ?> <img src="./image/dimond.png" width="10%" height="10%" ></h5>
                            <h5 class="text-title d-flex"> 
                                 <b><?= $row['name'] ?></b>
                            </h5>
                            Quantity: <input type="number" name="quantity" value="1" min="1" max="<?php echo $row['quantity']?>" class="input-form">
                        </div>
                        <button class="btn btn-secondary add-button" style="width: 100%;color:#00FA9A;" type="submit" name="addCart">ADD TO CART</button>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        </form>
                </div>
            </div>
            <?php endforeach ?>
            <div class="fa-phantrang" style="width: 100%;">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pagination->getTotalPage($items->totalProduct(),5); $i++) : ?>
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
<style> 
.title-product2{
    position: absolute;
    top: -19px;
    background: #aaeeec;
}
.pagination {
    display: flex;
    justify-content: center;
}
.active1{
    padding-top: 10;
    margin:10px 0 0 5px;
}
.form-product{
    justify-self:end;

}
.card-text{
display: -webkit-box;

-webkit-line-clamp: 1;

-webkit-box-orient: vertical;

overflow: hidden;

text-overflow: ellipsis;

word-break: break-word;

}

.form-control{
    width: 400px;

}

.fa-sidebars{
    width: 100%;
    display: flex;
    justify-content: end;
}

.card{
        border-radius: 15px;
        overflow: hidden;
        height: 370px;
        background: fixed;
}

.slide-bar{   
        display: flex;
        padding: 5px 0;
}

.card-img-top{
       background-color: #999999;
        padding: 5px;
        border-radius: 40px;
        width: 90px;
        height: 90px;
        transition: 0.5s;
        box-shadow: 10px 0px 20px  black , -10px 0px 20px black ;
        
}
.card-img-top:hover{
    transform: scale(1.75);
}

.input-form{
    scroll-behavior: auto;
    width: 20%;
    text-align: center;    
}
.container-sale{
    position: relative;
}
.text-title{
    justify-content: space-between;
}
</style>