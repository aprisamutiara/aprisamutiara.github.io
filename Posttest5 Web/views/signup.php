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
    
        <form action="Register.php" method="post">
            <h2>Sign up Bec<span>diys</span></h2>

            <!-- email -->
            <input type="email" name="email" required maxlength="50" 
            placeholder="enter your email" class="box" >

            <!-- username -->
            <input type="text" name="username" required maxlength="50" 
            placeholder="enter your username" class="box">

            <!-- no hp -->
            <input type="number" name="nohp" required maxlength="50" 
            placeholder="enter your phone number" class="box">

            <!-- alamat rumah -->
            <input type="text" name="alamat" required maxlength="50" 
            placeholder="enter your house adress" class="box">

            <!-- password -->
            <input type="password" name="password" required maxlength="50" 
            placeholder="enter your password" class="box">

            <input type="submit" id="btn" name="signup" value="Sign up">

            <p class="link">Already have an account? <a href="signin.php">Sign in now</a></p>
            
        </form>
    </section>
</body>
</html>