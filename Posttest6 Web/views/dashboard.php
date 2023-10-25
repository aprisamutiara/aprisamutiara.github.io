<?php 

    @include "../aksi/koneksi.php";
   
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM products WHERE id=$id");
        header('location:dashboard.php');
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

    <?php
            $select = mysqli_query($conn, "SELECT * FROM products");
    ?>

   
        <div class="products-display">
            <?php date_default_timezone_set('Asia/Makassar'); echo date("h:i:s") ?><br>
            <?php echo date('l, d F Y')?>
            <a href="add.php"><button class="create-btn">Create</button></a>
            <a href="index.php"><button class="create-btn">Back</button></a>
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
                            
                            <a href="dashboard.php?delete=<?php echo $row['id']; ?>">
                            <button class="delete-btn"><img src="../image/delete.png">Delete</a></button> 
                        </td>
                    </tr>

                <?php }; ?>
            </table>

        </div>
    </div>
    
</body>
</html>