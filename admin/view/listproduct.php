<?php

$items = new item();
$showproduct = [];
$showproduct = $items->pagination();
$pagination = new pagination();

?>



<div class="container-fluid con1">
    <div class="card">
        <div class="card-header">
            <h1 align=center style="color: blue;"> PRODUCT LIST</h1>
        </div>
        <div class="card-body">
            <table border=1 class="table tb3">
                <thead class="thead-dark" align="center">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($showproduct as $row) : ?>
                        <tr align="center">
                            <td> <?php echo $i++; ?></td>
                            <td><b><?php echo $row['name'] ?></b></td>

                            <td style="width: 150px;">
                                <img style="width:150px" src="../image/product/<?php echo $row['imageURL']; ?>" alt="">
                            </td>

                            <td> <?php echo $row['price'] ?> $</td>
                            <td style="width:200px;"><?php echo $row['quantity'] ?></td>
                            <td style="width:400px;" align="left"><?php echo $row['description'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="index.php?act=edit&id=<?php echo $row['id']; ?>">Update</a>
                                <a class="btn btn-secondary" onclick="return Del('<?php echo $row['id']; ?>')" href="index.php?act=delete&id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="fa-phantrang">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $pagination->getTotalPage($items->totalProduct(),4); $i++) : ?>
                        <li class="
                        <?php
                        if (isset($_GET['page'])) {
                            if ($i == $_GET['page']) echo 'active';
                        } else {
                            if ($i == 1) echo 'active';
                        }?>">
                            <a href="index.php?action=home&act=list&page=<?php echo $i ?>"class = "btn btn-primary active1"><?php echo $i ?></a>
                        </li>
                    <?php endfor ?>
                </ul>
            </div>
            <a href="index.php?act=create"><button class="btn btn-danger add" style="float: right;">ADD</button></a>
        </div>
    </div>
</div>
<script>
    function Del(name) {
        return confirm("Bạn muốn xóa" + name + "?");
    }
</script>
<style>
    .phantrang {
        display: flex;
        justify-content: space-between;
        padding-left: 50px;
        width: 300px;
    }

    .fa-phantrang {
        text-align: center;
    }
    .active .active1{
        background: red;
        
    }
</style>