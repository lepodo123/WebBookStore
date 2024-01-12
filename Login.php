<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleLogin.css">
</head>

<body>
    <div class="list_cart"></div>
    <div class="header">
        <div class="box_header">
            <a href="index.php"><img class="img_header" src="image/banner/logo.png" alt=""></a>
            <div class="box_search">
                <input type="text" name="" id="search_item" placeholder="What are you looking for ? ">
                <button class="button_search"><img src="image/icon/search_icon.png" alt="" width="70%"></button>
            </div>
        </div>
        <div class="bar_item">
            <div class="list_img">
                <a class="img_link" href=""><img src="image/icon/icon_mail.png" alt=""></a>
                <a class="img_link" href=""><img src="image/icon/icon_facebook.png" alt=""></a>
                <a class="img_link" href=""><img src="image/icon/icon_instagram.png" alt=""></a></a>
                <a class="img_link" href=""><img src="image/icon/icon_pinterest.png" alt=""></a></a>
            </div>
            <div class="info_item">
                <div><a href="" class="login"><img src="image/icon/icon_person.png" alt="" width="30px" style="margin-right: 10%;">Login</a></div>
                <div><a href=""><img src="image/icon/icon_cart.png" alt="" width="30px"></a></div>
            </div>
        </div>
    </div>

    <div class="topnav">
        <a href="index.php">TRANG CHỦ</a>
        <a href="index.php#outstanding">NỔI BẬT</a>
        <a href="#">PHỔ BIẾN</a>
        <a href="#">ĐỀ XUẤT</a>
        <a href="#">BÀI VIẾT</a>
    </div>
    <div style="width: 100%;">
        <div class="form_login">
            <form action="#" method="get">
                <h1 style="text-align: center;">Login</h1>
                <input class="input" type="text" name="username" id="" placeholder="Email"><br>
                <input class="input" type="password" name="password" id="" placeholder="Password">
                <div class="box_signin">
                    <div><input type="submit" class="button_signin input" value="Đăng nhập"></div>

                    <div>
                        <span>New Customer?</span><a href="Register.php"> Create account</a><br>
                        <a href="">Forgot your password?</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <?php
    error_reporting(0);
    include_once("User.php");
    function indexPost($index, $value = "")
    {
        if (isset($_GET[$index])) return $_GET[$index];
        return $value;
    }

    $username = indexPost("username");
    $password = indexPost("password");
    if (isset($username) && isset($password)) {
        $user = checkAccount($username, $password);
        if (isset($user)) {
            if ($user["taikhoan"] == "admin") {
    ?>
                <META http-equiv="refresh" content="0;URL=BookManager.php?id=<?php echo $user["makh"] ?>">
            <?php
            } else {
            ?>
                <META http-equiv="refresh" content="0;URL=index.php?id=<?php echo $user["makh"] ?>">
    <?php
            }
        } else if ($username != "" && $password != "") {
            echo "<p style = 'text-align: center; color:red;'>Tài khoản hoặc mật khẩu không chính xác!</p>";
        }
    }

    ?>
    <footer class="footer">
        <div class="box_footer">
            <div>
                <h3>Shop</h3>
                <a href="">New Arrival</a><br>
                <a href="">Best Selling</a><br>
                <a href="">Shop Pokemon</a><br>
                <a href="">Shop Sanrio</a>
                <a href="">Japan Beauty</a>
            </div>
            <div>
                <h3>Company</h3>
                <a href="">About Japan Figure</a><br>
                <a href="">Contact Us</a><br>
                <a href="">Terms of Service</a><br>
                <a href="">Privacy Policy</a>
            </div>
            <div>
                <h3>Customer Care</h3>
                <a href="">Shipping Policy</a><br>
                <a href="">Returns & Refund Policy</a><br>
                <a href="">Customs Process</a><br>
                <a href="">Special Deals & Offers</a><br>
                <a href="">Customer's Reviews</a>
            </div>
            <div>
                <h3>Follow us</h3>
                <div class="follow_icon">
                    <a href="">
                        <div class="zoom"><img src="image/icon/icon_mail.png" alt=""></div>
                    </a>
                    <a href="">
                        <div class="zoom"><img src="image/icon/icon_facebook.png" alt=""></div>
                    </a>
                    <a href="">
                        <div class="zoom"><img src="image/icon/icon_instagram.png" alt=""></div>
                    </a>
                    <a href="">
                        <div class="zoom"><img src="image/icon/icon_pinterest.png" alt=""></div>
                    </a>
                </div>
            </div>
    </footer>
    <a href="" class="cart_icon"><img src="image/icon/icon_cart.png" alt=""></a>
</body>

</html>