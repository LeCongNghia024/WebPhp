 <link rel="stylesheet" href="../style/detail_order">
<div class="done">
    <div class="table d-flex mt-3" style="justify-content: center;">
        <table style="width: 1200px;">
            <thead>
                <tr>
                    <td colspan="8">
                        <h2 style="color: red;" align="center">Thông Tin Hóa Đơn</h2>
                    </td>
                </tr>
                <tr align="center">
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Tên Người Nhận</th>
                    <th>SDT</th>
                    <th>Nơi Nhận</th>
                    <th>PT giao hang</th>
                    <th>Ngày Đặt</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                    <td>##</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="button2 d-flex" style="justify-content:center;">
        <form action="">
            <button class="btn btn-secondary">Hủy Đơn Hàng</button>
            <?php if (isset($_SESSION['status']) == 0) { ?>

                <button class="btn btn-success">Sửa Thông Tin</button>
            <?php } ?>
        </form>
    </div>
</div>

