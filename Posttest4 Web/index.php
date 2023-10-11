<?php

require 'koneksi.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$query_sql = "SELECT * FROM userform
        WHERE username = '$username' AND password = '$pass'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0){
    header("Location: index.html");
} else{
    echo "error";
}

?>
