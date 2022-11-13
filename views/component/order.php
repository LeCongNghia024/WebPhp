<link rel="stylesheet" href="../style/order.css">
<div class="table-responsive cart-list">
  <?php if (!isset($_SESSION['user_id']) || count($_SESSION['cart']) === 0) :
    echo '<script> alert("Vui lòng Đăng Nhập")</script>';
    echo '<meta http-equiv="refresh" content="0;url=index.php?action=home&act=login"/>';
  ?>

    <?php else :
    $order = new Order();
    $cart = new Cart();
    $total = $cart->subTotal();
    if (isset($_SESSION['order_id'])) :
      $userOrder = $order->getOrderUser($_SESSION['order_id']);
      
      $allOrder = $order->getOrder($_SESSION['order_id']);

    ?>
    <?php endif ?>
    <div class="form-order">
      <div class="wrapper">
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
        <div class="discount">
          <div class="header-order2 border1">
            <div class="header-order-child2">
              <input type="text" placeholder="Code" class="input-code">
              <button class="btn btn-success ">Add</button>
            </div>
          </div>
        </div>
        <form class="form" action="index.php?action=order&act=order_detail" method="post" enctype="multipart/form-data">
          <div class="row form-order3">
            <h2 align=center class="m-2"> Thông Tin Thanh Toán</h2>
            <center>
              <hr style="width: 50%; height:3px;">
            </center>
            <div class="col-6 left-form">
              <div class="nhanhang" style="background:#CDCDB4; width:100%; display:flex; margin-left:5px;" >
                <input type="radio" name="receive" id="receive1" value="1" class=" m-1" checked><label for="receive1" >Địa chỉ giao hàng</label>
                <input type="radio" name="receive" id="receive2" value="2" class="ml-2 m-1"><label for="receive2 ">Trực tiếp tại cửa hàng</label>
              </div>
              <label for=""> Name</label>
              <input type="text" name="name" class="input" value="<?php echo $_SESSION['user_name']?>" required>

              <label for="">First Name</label>
              <input type="text" name="firstname" class="input" required>

              <label for="">Phone</label>
              <input type="number" name="phone" class="input" value="<?php echo $_SESSION['phone']?>" required>
              <div>
                <select class="form-select  mt-3" name="province" id="city" aria-label=".form-select-sm">
                  <option value="" selected>Chọn tỉnh thành</option>
                </select>

                <select class="form-select mt-3" name="district" id="district" aria-label=".form-select-sm">
                  <option value="" selected>Chọn quận huyện</option>
                </select>

                <select class="form-select mt-3" name="ward"  id="ward" aria-label=".form-select-sm">
                  <option value="" required selected>Chọn phường xã</option>
                </select>
              </div>
              <label for="">Address</label>
              <input type="text" name="address" class="input" style="width: 100%;" required>
              <div>
                <label for="">Note:</label>
                <textarea name="note" cols="60" rows="5" style="max-height: 200px;min-height: 120px;"></textarea>
              </div>
            </div>

            <div class="col-6 right-form">
              <h5> Tạm tính: <b><?php echo number_format($total) ?> vnđ</b></h5>
              <hr style="width: 100%;">
              <div class="giaohang">
                <div class="d-flex">
                  <input type="radio" name="delivery" id="delivery1" value="1" required><label class="ml-1" for="delivery1"> Giao Ngay (TP HCM)</label>
                </div>
                <div class="d-flex">
                  <input type="radio" name="delivery" id="delivery2" value="2" required> <label class="ml-1" for="delivery2"> Từ 1 - 3 ngày</label>
                </div>
              </div>
              <hr>

              <div class="thanhtoan">
                <div class="d-flex">
                  <input type="radio" name="pay" id="1" value="1" required> <label class="ml-1" for="1">Thanh Toán Online</label>
                </div>
                <div class="d-flex">
                  <input type="radio" name="pay" id="2" value="2" required> <label class="ml-1" for="2">Thanh Toán Khi nhận Hàng</label>
                </div>
              </div>
              <hr>
              <h5 style="">Tổng Tiền: <b style="color:red"><?php echo number_format(Cart::subTotal()) ?> vnđ</h5>
              <button class="btn btn-primary btn-lg mt-3" type="submit" style="float: right;"> Thanh Toán</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endif ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
  var citis = document.getElementById("city");
  var districts = document.getElementById("district");
  var wards = document.getElementById("ward");
  var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
  };
  var promise = axios(Parameter);
  promise.then(function(result) {
    renderCity(result.data);
  });

  function renderCity(data) {
    for (const x of data) {
      citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function() {
      district.length = 1;
      ward.length = 1;
      if (this.value != "") {
        const result = data.filter(n => n.Id === this.value);

        for (const k of result[0].Districts) {
          district.options[district.options.length] = new Option(k.Name, k.Id);
        }
      }
    };
    district.onchange = function() {
      ward.length = 1;
      const dataCity = data.filter((n) => n.Id === citis.value);
      if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

        for (const w of dataWards) {
          wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
      }
    };
  }
</script>

