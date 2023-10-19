<?php 

    @include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Becdiys</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">Bec<span>diys</span></div>
        <ul class="nav-menu">
            <li><a href="index.php">Home</li></a>
            <li><a href="#products">Products</li></a>
            <li><a href="about.php">About me</li></a>
        </ul>
        <ul class="nav-logo">
            <a href="add.php"><img src="../image/shopping-bag.png" alt="" ></a>
            <a href="account.php"><img src="../image/user.png" alt=""></a>
                <img src="../image/moon.png" alt="" id="btn">
            <a href="signin.php"><button>Sign In</button></a>
        </ul>
    </div>
</body>
</html>