<?php
@include "../aksi/koneksi.php";
session_start();

if (!isset($_SESSION['login'])) {
    header('location: signin.php');
}

if (isset($_GET['logout'])) {
    unset($_SESSION['login']);
    session_destroy();
    header('location: signin.php');
    exit;
}

if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['login'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('Query failed');

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    } else {
        echo 'User data not found.';
    }
} else {
    echo 'User data not found.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../style/crud.css">
</head>
<body>
    <div class="containers">
        <div class="profile">
        <?php 
        if (isset($fetch['image']) && $fetch['image'] == '') {
            echo '<img src="../image/FOTO-KOSONG.jpg">'; 
        } elseif (isset($fetch['image'])) {
            echo '<img src="../uploaded_img/' . $fetch['image'] . '">';
        }

        echo '<h3>' . $fetch['username'] . '</h3>';
        ?>

            <a href="updateprofile.php" class="btn">Update profile</a>
            <a href="signin.php?logout=<?= $user_id ?>" class="btn" id="logout-button">Logout</a>
            <p>New <a href="signin.php">Sign in</a> or <a href="signup.php">Sign up</a> or <a href="index.php">Go back</a></p>
        </div>
    </div>

    <script>
    const logoutButton = document.getElementById("logout-button");
    logoutButton.addEventListener("click", function (e) {
        e.preventDefault();

        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "signin.php?logout=<?= $user_id ?>";
        }
    });
    </script>
</body>
</html>
