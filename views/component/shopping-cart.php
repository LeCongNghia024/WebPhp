
<div class="table-responsive cart-list body-cart" style="display:flex; justify-content:center;">
  <?php
  if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) : ?>
    <div class="content" style="justify-content:center;">
      <h2> Buy some thing?</h2>
    </div>
    <div class="button" >
      <a href="index.php?action=home" class="btn btn-danger">SHOPPING</a>
    </div>
  <?php else : ?>
    <table class="table table-bordered table-hover"  style="width: 1080px; margin-top:15px;">
      <thead>
        <tr>
          <td colspan="8">
            <h2 style="color: red;" align= "center">Cart</h2>
          </td>
        </tr>
        <tr class="table-success">
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="child-table" border = 1 >
        <?php
        $i = 0;
        foreach ($_SESSION['cart'] as $item2) :
          $i++;

        ?>
          <tr class="text-center">
            <td><?php echo $i ?></td>
            <td class="img-cart1 d-flex justify-content-center">
              <img class="img-cart" width="150px" height="150px" src="./image/product/<?= $item2['image']?>">
            </td>
            <td><b><?php echo $item2['name'] ?></b></td>
            <td><b><?php echo $item2['price'] ?></b>$</td>
            <td>
              <form action="index.php?action=controller-cart&act=edit" method="POST" enctype="multipart/form-data">
                <input class="input-quantity" min="0" type="number" name="quantity" value="<?php echo $item2['quantity'] ?>">
                <input type="hidden" name="id" value="<?php echo $item2['id'] ?>">
                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
              </form>
            </td>
            
            <td> <p><?php echo number_format(Cart::sumPrice($item2)) ?> $ </p></td>
            <td> <?php echo $item2['description']?> </td>
            <td>
              <a href="index.php?action=controller-cart&act=delete_item&id=<?php echo $item2['id']?>">
                <button type="button" class="btn btn-danger">Xóa</button>
              </a>
            </td>
          </tr>
          <?php endforeach ?>
          <tr>
          <td colspan="5">
            <h3>SubTotal  </h3>
          </td>
          <td>
            <b style="float: right;"><?php echo number_format(Cart::subTotal()) ?> $</b>
          </td >
          <td></td>
          <td>
          <a class="btn btn-primary" style="width:100%; float:right;  " href="index.php?action=home&act=order">Thanh toán</a>
          </td>
        </tr>
      </tbody>
    </table>
  <?php endif ?>
</div>
<style>
  .input-quantity{
    width: 50px;
  }
      .body-cart{
        min-height: 73vh;
    } 
   .img-cart1{
    background: white;
   }
   
    </style>