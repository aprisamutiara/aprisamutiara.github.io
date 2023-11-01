<?php
@include '../aksi/koneksi.php';

if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_img/' . $image;

    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Confirm password not matched!';
        } elseif ($image_size > 10000000) {
            $message[] = 'Image size is too large!';
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $insert = mysqli_query($conn, "INSERT INTO users (email, username, password, image) 
                VALUES ('$email', '$name', '$pass', '$image')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                echo "
                    <script>
                        alert('Registration successful!');
                        document.location.href ='signin.php';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Registration failed!');
                        document.location.href ='signup.php';
                    </script>";
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
    <title>Sign up</title>
    <link rel="stylesheet" href="../style/php.css">
</head>
<body>

    <!-- html form -->
    <section class="form">
    
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Sign up Bec<span>diys</span></h2>
            <?php 
            if(isset($message)){
                foreach($message as $msg){
                    echo '<div class "message">'.$msg.'</div>';
                }
            }
            ?>
            <!-- email -->
            <input type="email" name="email" required maxlength="50" 
            placeholder="enter your email" class="box" >
            
            <!-- username -->
            <input type="text" name="username" required maxlength="50" 
            placeholder="enter your username" class="box">

            <!-- password -->
            <input type="password" name="password" required maxlength="50" 
            placeholder="enter your password" class="box">
            
            <!-- konformasi password -->
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            
            <!-- foto profil -->
            <input type="file" name= "image" accept="image/jpg, image/jpg, image/png" class="box">
            
            <div class="remember">
                <input type="checkbox" name="remember" value="true">
                <label for="remember">remember username</label>
            
            <input type="submit" id="btn" name="signup" value="Sign up">

            <p class="link">Already have an account? <a href="signin.php">Sign in now</a></p>
            
        </form>
    </section>
</body>
</html>