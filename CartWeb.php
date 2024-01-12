<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylebuy.css">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
</head>

<body>
    <?php
    error_reporting(0);
    include_once "DB.php";
    include_once "User.php";
    include_once "Book.php";
    include_once "Category.php";
    ?>
    <div class="list_cart"></div>
    <div class="header">
        <div class="box_header">
            <a href="index.php"> <img class="img_header" src="image/banner/logo.png" alt=""></a>

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
                <div><a href="Login.php" class="login"><img src="image/icon/icon_person.png" alt="" width="30px" style="margin-right: 10%;"><span>
                            <?php
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $user = findUser($id);
                                foreach ($user as $key => $value) {
                                    echo $value["hoten"];
                                }
                            } else {
                                echo "Login";
                            }
                            ?></span></a></div>
                <div><a href=""><img src="image/icon/icon_cart.png" alt="" width="30px"></a></div>
            </div>
        </div>
    </div>
    <div class="topnav">
        <a href="#">TRANG CHỦ</a>
        <a href="BookManager.php">SÁCh</a>
        <a href="#">KHÁCH HÀNG</a>
        <a href="#">CHỦ ĐÈ</a>
        <a href="#">BÀI VIẾT</a>
    </div>
    <table border="1" cellspacing="1" style="text-align: center; margin-top: 5%;">
        <tr>
            <td>ID</td>
            <td>Ảnh</td>
            <td>Tên sách</td>
            <td>Giá</td>
            <td>Số lượng </td>
        </tr>
        <?php
        $books = findAllBook();
        foreach ($books as $k => $b) {
        ?>
            <tr>
                <td><?php echo $b->id ?></td>
                <td style="text-align: center; width:10%"><img src="<?php echo $b->image ?>" alt="" style="width: 80%; height: 5%"></td>
                <td style="width:40%"><?php echo $b->tensach ?></td>
                <td><?php echo number_format($b->gia) ?>đ</td>
                <td><button style="margin-right: 20px;">+</button>1<button style="margin-left: 20px;">+</button></td>
            </tr>
        <?php
        }
        ?>

    </table>

    </div>
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
</body>

</html>