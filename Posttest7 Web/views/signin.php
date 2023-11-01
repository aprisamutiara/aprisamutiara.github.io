<?php
session_start();
@include "../aksi/koneksi.php";

if (isset($_POST['signin'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$name'") or die('Query failed');

    if (mysqli_num_rows($select) >0) {
        $row = mysqli_fetch_assoc($select);
        $hashed_password = $row['password'];

        if (password_verify($pass, $hashed_password)) {
            $_SESSION['login'] = $row['id']; 
            echo "
                <script>
                    alert('Login successfully!');
                    document.location.href ='account.php';
                </script>";
            exit;
        } else {
            $message = 'Incorrect username or password!';
        }
    } else {
        $message = 'User not found!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="../style/php.css">
</head>
<body>
    <section class="form">
        <form action="" method="post">
            <h2>Sign in bec<span>diys</span></h2>
            <?php 
            if (isset($message)) {
                echo '<div class="message">' . $message . '</div>';
            }
            ?>
             <!-- username -->
             <input type="text" name="username" required maxlength="50" 
             placeholder="Enter your username" class="box">

            <!-- password -->
            <input type="password" name="password" required maxlength="50" 
            placeholder="Enter your password" class="box">

            <input type="submit" id="btn" name="signin" value="Sign in">

            <p class="link">Don't have an account? <a href="signup.php">Sign up now</a></p>   
        </form>
    </section>
</body>
</html>
