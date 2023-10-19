<?php 

    include '../aksi/koneksi.php';

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

             <!-- email -->
             <input type="email" name="email" required maxlength="50" 
             placeholder="enter your email" class="box">

            <!-- username -->
            <input type="text" name="username" required maxlength="50" 
            placeholder="enter your username" class="box">
            
            <!-- password -->
            <input type="password" name="password" required maxlength="50" 
            placeholder="enter your password" class="box">   

            <input type="submit" id="btn" name="signin" value="Sign in">

            <p class="link">Don't have an account? <a href="signup.php">Sign up now</a></p>   
        </form>
    </section>
</body>
</html>