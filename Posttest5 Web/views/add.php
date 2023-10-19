<?php 

    @include "../aksi/koneksi.php";
   
    if(isset($_POST["add_product"])){
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_image = $_FILES["product_image"]["name"];
        $product_image_tmp_name = $_FILES["product_image"]["tmp_name"];
        $product_image_folder = '../uploaded_img/'.$product_image;

        if(empty($product_name) || empty ($product_price) || empty($product_image)){
            $message[] = "please fill out all";
        }else{
            $insert = "INSERT INTO products(nama, harga, gambar) VALUES('$product_name', '$product_price', 
            '$product_image')";
            $upload = mysqli_query($conn, $insert);
            if($upload){
                move_uploaded_file($product_image_tmp_name, $product_image_folder);
                $message[] = "new product added succesfully";
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
    <title>Add</title>
    <link rel="stylesheet" href="../style/crud.css">
</head>
<body>

<?php

    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }

?>

    <div class="container">
        <div class="product-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <h3>add new product</h3>
                <input type="text" placeholder="enter product name" name="product_name" class="box">
                <input type="number" placeholder="enter product price" name="product_price" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="add poduct">
                <a href="index.php" class="btn">go back</a>  
            </form>
        </div>

        <?php
            $select = mysqli_query($conn, "SELECT * FROM products");
        ?>

        <div class="products-display">
            <table class="products-table">
                <thead>
                    <tr>
                        <td>Products Image<img src="../uploaded_img/>?php $row['gambar'];?>" alt=""></td>
                        <td>Products name</td>
                        <td>Products price</td>
                        <td>Action</td>
                    </tr>
                </thead>
               
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="../uploaded_img/<?php echo $row['gambar'];?>" height="100" alt=""></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['harga']; ?></td>
                        <td>
                            <a href="update.php?edit=<?php echo $row['id']; ?>">
                            <button class="edit-btn"><img src="../image/edit.png">Edit</a></button>
                            
                            <a href="add.php?delete=<?php echo $row['id']; ?>">
                            <button class="delete-btn"><img src="../image/delete.png">Delete</a></button> 
                        </td>
                    </tr>

                <?php }; ?>
            </table>

        </div>
    </div>
    
</body>
</html>