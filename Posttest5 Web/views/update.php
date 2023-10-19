<?php 
    
    @include "../aksi/koneksi.php";

    $id = $_GET['edit'];

    if(isset($_POST["update_product"])){
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_image = $_FILES["product_image"]["name"];
        $product_image_tmp_name = $_FILES["product_image"]["tmp_name"];
        $product_image_folder = '../uploaded_img/'.$product_image;

        if(empty($product_name) || empty ($product_price) || empty($product_image)){
            $message[] = "please fill out all";
        }else{
            $update = "UPDATE products SET nama='$product_name', harga='$product_price', gambar='$product_image'
            WHERE id = $id";
            $upload = mysqli_query($conn, $update);
            if($upload){
                move_uploaded_file($product_image_tmp_name, $product_image_folder);
            }else{
                $message[] = "could not add the product";
            }
        }
    };

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM products WHERE id=$id");
        header('location:add.php');
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../style//crud.css">
</head>
<body>
    
    <?php 
        

        if(isset($message)){
            foreach($message as $msg){
                echo '<span class="message">'.$message.'</span>';
            }
        }
    
    ?>

    <div class="container">
        <div class="product-container update">

        <?php
        
        $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
        while($row = mysqli_fetch_assoc($select)){
        
        ?>

            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>add new product</h3>
                <input type="text" placeholder="enter product name" name="product_name" value="<?php $row['nama']; ?>" class="box">
                <input type="number" placeholder="enter product price" name="product_price" value="<?php $row['harga']; ?>" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="update_product" value="update poduct">
                <a href="add.php" class="btn">go back</a>           
            </form>

            <?php }; ?>
        </div>
    </div>

</body>
</html>