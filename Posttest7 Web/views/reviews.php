<?php
include '../aksi/koneksi.php';

if (isset($_POST["submit"])) {
    $user_id = ""; // You need to define $user_id, which is not defined in your code.
    if ($user_id != "") {
        $id = create_unique_id();
        $title = $_POST["title"];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $description = $_POST["description"];
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $rating = $_POST["rating"];
        $rating = filter_var($rating, FILTER_SANITIZE_STRING);

        $verify_review = $conn->prepare("SELECT * FROM reviews WHERE post_id = ? AND user_id = ?");
        $verify_review->execute([$get_id, $user_id]);

        if ($verify_review->rowCount() > 0) {
            // Review already exists
            echo "Review already exists.";
        } else {
            // Insert the review into the database
            // You need to add the code to insert the review here
            echo "Review added successfully!";
        }
    } else {
        echo "Gagal menambahkan review!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/reviews.css">
</head>
<body>
    <section class="account-form">
        <form action="" method="post">
            <h3>Post your review</h3>
            <p class="placeholder">Review title <span>*</span></p>
            <input type="text" name="title" required maxlength="50" placeholder="Enter review title" class="box">
            <p class="placeholder">Review description</p>
            <textarea name="description" required maxlength="1000" placeholder="Enter review description" class="box" cols="30" rows="10"></textarea>
            <p class="placeholder">Rating<span>*</span></p>
            <select name="rating" class="box" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" value="Submit Review" name="submit" class="btn">
            <a href="index.php?get_id" class="option-btn">Go back</a>
        </form>
    </section>
</body>
</html>
