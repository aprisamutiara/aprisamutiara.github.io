<?php
@include '../aksi/koneksi.php';
session_start();

$login = $_SESSION['login'];

if (isset($_POST['updateprofile'])) {
    $updatename = mysqli_real_escape_string($conn, $_POST['updatename']);
    $updateemail = mysqli_real_escape_string($conn, $_POST['updateemail']);

    $oldpass = mysqli_real_escape_string($conn, $_POST['updatepass']);
    $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);

    if (!empty($newpass)) {
        $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$login'") or die('Query failed');

        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
            $old_password_hash = $fetch['password'];

            if (password_verify($oldpass, $old_password_hash)) {
                // Password lama sesuai, hash password baru
                $new_password_hash = password_hash($newpass, PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE users SET username = '$updatename', email = '$updateemail', 
                password = '$new_password_hash' WHERE id = '$login'") or die('Query failed');
                $message[] = 'Password updated successfully!';
            } else {
                // Password lama tidak sesuai
                $message[] = 'Old password not matched!';
            }
        }
    } else {
        // Tidak ada pengubahan password
        mysqli_query($conn, "UPDATE users SET username = '$updatename', email = '$updateemail' WHERE id = '$login'") or die('Query failed');
    }
}

// Periksa apakah ada file gambar yang diunggah
if (isset($_FILES['updateimage'])) {
    $updateimage = $_FILES['updateimage']['name'];
    $updateimage_size = $_FILES['updateimage']['size'];
    $updateimage_tmp_name = $_FILES['updateimage']['tmp_name'];
    $updateimage_folder = '../uploaded_img/' . $updateimage;

    if (!empty($updateimage)) {
        if ($updateimage_size > 10000000) {
            $message[] = 'Image size is too large!';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE users SET image = '$updateimage' WHERE id = '$login'") or die('Query failed');
            if ($image_update_query) {
                move_uploaded_file($updateimage_tmp_name, $updateimage_folder);
                $message[] = 'Image updated successfully!';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../style/crud.css">
</head>
<body>

    <div class="updateprof">
        <?php
            $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$login'") or die ('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
                if($fetch ['image'] == ''){
                    echo '<img src="../image/FOTO-KOSONG.jpg">';
                }else{
                    echo '<img src="../uploaded_img/'.$fetch ['image'].'">';
                }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>username: </span>
                    <input type="text" name="updatename" value="<?php echo $fetch['username']?>" class="box">
                    <span>your email: </span>
                    <input type="email" name="updateemail" value="<?php echo $fetch['email']?>" class="box">
                    <span>update your pict: </span>
                    <input type="file" name="updateimage" accept="image/jpg, image/jpg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="oldpass" value="<?php echo $fetch['password']?>">
                    <span>old password: </span>
                    <input type="password" name="updatepass" placeholder="enter previous password" class="box">
                    <span>new password: </span>
                    <input type="password" name="newpass" placeholder="enter new password" class="box">
                    <span>confirm password: </span>
                    <input type="password" name="confirmpass" placeholder="confirm new password" class="box">
                </div>
            </div>
            <input type="submit" value="update profile" name="updateprofile" class="btn">
            <a href="index.php" class="btn">go back</a>
        </form>
        
    </div>
    
</body>
</html>