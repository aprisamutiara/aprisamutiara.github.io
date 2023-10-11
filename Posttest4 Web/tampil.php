<?php
require 'koneksi.php';

$ambildata = mysqli_query($koneksi, "select * from user_db")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
<div class="container">
    <div class="content">
        <h3>Welcome!</h3>
        <p>Nice to see you joining becdiys. May your days always be happy :)</p>
        <p>Email : </p>
        <p>Name : </p>
        <p>Username : </p>
        <p>No. Phone : </p>
        <p>Address : </p>
        <p>Password : </p>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

</body>
</html>