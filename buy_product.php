<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylebuy.css">
    <link rel="stylesheet" href="style.css">
    <title>Book Store</title>
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
        <a href="index.php">TRANG CHỦ</a>
        <a href="index.php#outstanding">NỔI BẬT</a>
        <a href="#">PHỔ BIẾN</a>
        <a href="#">ĐỀ XUẤT</a>
        <a href="#">BÀI VIẾT</a>
    </div>
    <div class="box_product">
        <?php
        $bookId = $_GET["bookId"];
        $book = findOneBookById($bookId);
        ?>
        <div class="img_product"><img src="<?php echo $book->image ?>" alt=""></div>
        <div class="box_content">
            <p class="title_product"><?php echo $book->tensach ?></p>
            <p>by
                <a class="company" href="">
                    <?php
                    echo toStringCategory($book->chude);
                    ?></a>
            </p>
            <p>Availability: <span style="color: #3c9342;">5+ in stock</span></p>
            <p style="font-size: 1.4rem; color:red"><?php echo number_format($book->gia) ?>đ</p>
            <div class="quantily_product">
                <input type="text" name="input_quantity" id="" class="combobox">
                <a href="" class="pre_order">Add to Cart</a>
            </div>
            <div class="shop_pay">
                <a href="">Buy with Shop Pay</a>

            </div>
            <div class="payment">
                <a href="" class="payment_option">More payment options</a>
            </div>
            <div>
                <a href="" class="wishlist"><img src="image/icon/heart-icon.png" alt="">ADD TO WISHLIST</a>
            </div>
        </div>
    </div>
    <div class="title_also_like">
        <p>You may also like</p>
        <?php

        ?>
    </div>
    <div class="item_pokemon">
        <?php
        $arrBook = findAllBook();
        $count = 0;
        foreach ($arrBook as $k => $b) {
            if ($count == 5) break;
            if ($b->id != $bookId) {

        ?>

                <div class="border_item item">
                    <div class="border_img_item"><img src="<?php echo $b->image ?>" alt=""></div>
                    <div class="describe">
                        <p class="price"><?php echo number_format($b->gia) ?>đ</p>
                        <a href="" class="link_item"><?php echo $b->tensach ?></a><br>
                        <a href="" class="link_item" style="font-size: 0.8rem;"><?php echo toStringCategory($b->chude) ?></a>
                        <div class="order">
                            <button>Quick Shop</button>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>

        <?php
                $count++;
            }
        }

        ?>
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