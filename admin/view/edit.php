<?php
$items= new item();
$show =[];
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $show = $items->getproduct($id);
}
?>
    <body>
        <div class="container">
        
        <h1>EDIT PRODUCT (<?php echo $show['id'] ?>)</h1> 
        <form action="index.php?action=AdminProduct&act=edit&id=<?= $show['id']?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Name</label> 
                <input class="input" type="text" name="name" placeholder=" <?php echo $show["name"] ?>">
            </div> 
            
            <div>
                <label for="">Image</label><br>
                <input class="input-image" type="file" accept="image/*" name="upload" placeholder="Choice image">
            </div>
            
            <div>
                <label for="">Price</label>
                <input class="input"  name="price" type="float">
            </div>
            
            <div>
                <label for="">Quantity</label>
                <input class="input" name="quantity" type="float">
            </div>
            <div>
                <label for="">Description</label>
                <textarea class="textarea" name="description" type="text" rows="10"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name = "submit">EDIT</button>
            <a href="/" class="btn btn-success">CANCLE</a>
        </form>
    </div>
</body>
</html>
<style>
    .input-image{
    height: 50%;
    width: 30%;
    padding: 0 20px;
    }
    .input{
    border-radius: 6px;
    width: 100%;
    height: 60px;
    padding: 0 20px;
    transition: .25s ease;
}
input:focus{
    border-color: #9f96f2;
}
label{
    font-weight: bold;
    color: #999;
    transition: 0.25s ease;
}
.textarea{
    border-radius: 6px;
    width: 100%;
}

</style>