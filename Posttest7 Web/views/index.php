<?php 

    @include "../aksi/koneksi.php";
    @include "../views/navbar.php";

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

    <script>
        let btn = document.getElementById("btn");

        btn.onclick = function(){
            document.body.classList.toggle("dark-theme");
        }
    </script>

    <div class="hero">
        <img src="../image/bg.png" alt="">
        <div class="hero-text">
            <p>“Something  handmade is  something special”</p>
        </div>
    </div>


    <h1 id="products">Products</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="../image/phonecharm.jpeg" alt="">
                <div class="icon">
                    <a href="cart.php" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>phone charm</h3>
                <div class="price">22.000 IDR</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../image/gelang.jpeg" alt="">
                <div class="icon">
                    <a href="" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>smile bracelet</h3>
                <div class="price">8.000 IDR</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../image/tas.jpeg" alt="">
                <div class="icon">
                    <a href="" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>bag</h3>
                <div class="price">250.000 IDR</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../image/flower1.jpg" alt="">
                <div class="icon">
                    <a href="" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>bucket pink</h3>
                <div class="price">200.000 IDR</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../image/cincin.jpg" alt="">
                <div class="icon">
                    <a href="" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>ring</h3>
                <div class="price">5.000 IDR</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../image/Fruit Crochet Shoulder Bag  Handmade Crochet Tote Top Bag.jpg" alt="">
                <div class="icon">
                    <a href="" class="cart-btn">Add to cart</a>
                    <a href=" "><img src="../image/share.png" alt=""></a>
                </div>
            </div>
            <div class="content">
                <h3>Fruit Crochet Shoulder Bag</h3>
                <div class="price">350.000 IDR</div>
            </div>
        </div>
    </div>
       
    <footer>
        <h3>@copyright designed Becdiys 2023</h3>  
        <div class="information">
            <a href="https://instagram.com/becdiys?igshid=MzMyNGUyNmU2YQ==">instagram</a>
        </div>
    </footer>

</body>
</html>