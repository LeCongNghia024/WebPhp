<?php
require_once "./model/Database.php";

$db = new Database();
$item = new item();

$name_err = $image_err= $price_err = $quantity_err ='';

if (isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $name_err = 'Name is required';
    }else{
        $name = $_POST['name'];
    }
    if(empty($_POST['price'])){
        $price_err = 'Price is required';
    }else{
        $price = $_POST['price'];
    }
    if(empty($_POST['quantity'])){
        $quantity_err = 'quantity is required';
    }else{
        $quantity = $_POST['quantity'];
    } 
    if(empty($_POST['description'])){
        $description_err = 'Name is required';
    }else{
        $description = $_POST['description'];
    }
        if(!empty($_FILES)){ 
            $file_name = $item->getTime() .$_FILES['upload']['name'];
            $permitted_extension = ['png','jpg','jpge','gif'];
            
            $destination_path = "../image/product/$file_name";

            $file_extension = explode('.',$file_name) ;

            $file_extension= strtolower(end($file_extension));

            if(in_array($file_extension,$permitted_extension)){  

            move_uploaded_file($_FILES['upload']['tmp_name'],$destination_path);

            $file_name = $item->getTime() .$_FILES['upload']['name'];

            $image_err = '<p style = "color:green">Uploaded</p>';
            }else{
                $image_err= 'Invalid file type';
            }
        }else{
            $image_err = 'No Image selected';
        }

    $validate_success = empty($name_err)
                        &&empty($price_err)
                        &&empty($quantity_err);
    if($validate_success){
        
    $statement = $db->pdo->prepare("INSERT INTO `product`(`name`, `imageURL`, `price`, `quantity`, `description`)
     VALUES (:name,:file_name,:price,:quantity,:description)");
    $statement ->bindParam(':name', $name);
    $statement ->bindParam(':file_name',$file_name);
    $statement ->bindParam(':price', $price);
    $statement ->bindParam(':quantity', $quantity);
    $statement ->bindParam(':description', $description);
    $statement ->execute();
    echo '<script> alert("Success") </script>';
    
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
        <h1>Create Product</h1> 

        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="">Name</label>
                <input class="input" type="text" name="name" placeholder="Name Dragon">
                <p class="text-danger"><?php echo $name_err ?></p>
            </div>
            
            <div>
                <label for="">Image</label><br>
                <input class="input-image" type="file" accept="image/*" name="upload" placeholder="Choice image">
                <p class="text-danger"><?php echo $image_err ?></p>
            </div>
            
            <div>
                <label for="">Price</label>
                <input class="input"  name="price" type="float">
                <p class="text-danger"><?php echo $price_err ?></p>
            </div>
            
            <div>
                <label for="">Quantity</label>
                <input class="input" name="quantity" type="float">
                <p class="text-danger"><?php echo $quantity_err ?></p>
            </div>
            <div>
                <label for="">Description</label>
                <textarea class="textarea" name="description" type="text" rows="10"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name = "submit">Create</button>
            <a href="index.php?action=home" class="btn btn-success">Back</a>
        </form>
    </div>
</body>
</html>

