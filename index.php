<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylebuy.css">
    <script src="quickorder.js"></script>
</head>

<body>
    <?php

    error_reporting(0);
    include_once "DB.php";
    include_once "User.php";
    include_once "Book.php";
    include_once("Category.php");
    include_once "Function.php";
    global $book;
    ?>
    <div id="quick_order_page">
        <div class="quick_order_box">
            <button onclick="cancel_page()" id="cancel_quick_order"><img src="image/icon/cancel_icon.png" alt="" class="cancel_butoon"></button>
            <div class="quick_order_flex__box">
                <div><img id="img_product" src="" alt=""></div>
                <div class="box_content" style="margin-top: 3%;">
                    <p class="title_product" id="quick_name">Shadowverse Evolve Booster Pack 4Th Tensei Myth Box</p>
                    <p>Thể loại:
                        <a class="company" href="" id="quick_category">Bushiroad</a>
                    </p>
                    <p>Availability: <span style="color: #3c9342;">5+ in stock</span></p>
                    <p style="font-size: 1.4rem; color: red" id="quick_price">1.493.000₫</p>
                    <div class="quantily_product">
                        <input type="text" name="input_quantity" id="" class="combobox" placeholder="Số lượng">
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
        </div>
    </div>
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
                <div><a href="Login.php" class="login"><img src="image/icon/icon_person.png" alt="" width="30px" style="margin-right: 10%;">
                        <span>
                            <?php
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                $user = findUser($_SESSION["role"]);
                                foreach ($user as $key => $value) {
                                    echo $value["hoten"];
                                }
                            } else {
                                echo "Login";
                            }
                            ?>
                        </span></a></div>
                <div style="width: 100px;"><a href="CartWeb.php?id=<?php echo $id ?>"><img src="image/icon/icon_cart.png" alt="" width="30px"> <span>(0)</span></a></div>
            </div>
        </div>
    </div>
    <div class="topnav">
        <a href="index.php">TRANG CHỦ</a>
        <a href="#outstanding">NỔI BẬT</a>
        <a href="#">PHỔ BIẾN</a>
        <a href="#">ĐỀ XUẤT</a>
        <a href="#">BÀI VIẾT</a>
    </div>

    <div class="banner">
        <div class="banner_left">
            <img src="image/banner/banner1.jpg" alt="" width="80%">
            <img src="image/banner/banner4.jpg" alt="" width="80%">
        </div>
        <div class="banner_right">
            <img src="image/banner/banner2.jpg" alt="" width="80%">
            <img src="image/banner/banner3.jpg" alt="" width="80%">
        </div>
    </div>
    <div class="see_more"><a href="">Xem thêm</a></div>
    <div style="margin-left: 10%; margin-right: 7%;">
        <ul class="list_item" style="list-style-type: none;">
            <?php
            $arr = findAllBook();
            $id = "";

            foreach ($arr as $k => $v) {
                $arrChude = $v->chude;
            ?>
                <li class="item">
                    <a href="buy_product.php?userId=<?php echo $_GET["id"] ?>&bookId=<?php echo $v->id ?>" class="link_item">
                        <div class="border_box">
                            <img src="<?php echo $v->image ?>" alt="">
                        </div>
                        <div class="infomation_product">
                            <p class="price"><?php echo number_format($v->gia) . "đ" ?></p>
                            <a href="buy_product.php?userId=<?php echo $_GET["id"] ?>&bookId=<?php echo $v->id ?>" class="link_item"><?php echo $v->tensach ?></a><br>
                            <span>Tags:</span>

                            <?php
                            $tenchude = "";
                            foreach ($arrChude as $key => $chude) {
                                $tenchude .= $chude["tenchude"];
                                if ($key == sizeof($arrChude)) {
                                    $tenchude .= ".";
                                } else {

                                    $tenchude .= ",";
                                }
                            }
                            echo "<a href='' class='link_item' style='font-size: 0.8rem;'>$tenchude</a>";
                            ?>


                        </div>
                        <div class="order">
                            <button onclick="quickorder_page('<?php echo $v->tensach ?>','<?php echo number_format($v->gia) ?>','<?php echo $tenchude  ?>','<?php echo $v->image ?>')" name="button_item<?php echo $v->id ?>">Quick Shop</button>
                            <a href=""><button>Add to Cart</button></a>
                        </div>
                    </a>
                </li>

            <?php
                if ($k == 9) {
                    break;
                }
                $book = $v->id;
            }
            ?>

        </ul>
    </div>
    <div id="outstanding">
        <p class="title_pokemon">Nổi bật</p>
    </div>
    <div class="box_pokemon_items">
        <?php
        $arr = findAllBook();
        foreach ($arr as $k => $v) {
            if ($k % 2 == 0 && $k < 9) {
        ?>
                <div class="border_item item">
                    <div class="border_img_item"><img src="<?php echo $v->image ?>" alt="" width="90%"></div>
                    <div class="describe">
                        <p class="price"><?php echo number_format($v->gia) . "đ" ?></p>
                        <a href="" class="link_item"><?php echo $v->tensach ?></a><br>
                        <a href="" class="link_item" style="font-size: 0.8rem;">
                            <?php

                            $tenchude = "";
                            foreach ($arrChude as $key => $chude) {
                                $tenchude = $chude["tenchude"];
                                if ($key == sizeof($arrChude)) {
                                    $tenchude .= ".";
                                    echo "<a href='' class='link_item' style='font-size: 0.8rem;'>$tenchude</a>";
                                } else {
                                    $tenchude .= ",";
                                    echo "<a href='' class='link_item' style='font-size: 0.8rem;'>$tenchude</a>";
                                }
                            }
                            ?></a>
                        <div class="order">
                            <button onclick="quickorder_page('<?php echo $v->tensach ?>','<?php echo number_format($v->gia) ?>','<?php echo $tenchude  ?>','<?php echo $v->image ?>')" name="button_item_nb<?php echo $v->id ?>">Quick Shop</button>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>
        <?php
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
    <a href="#" class="cart_icon" onclick="quickorder_page()"><img src="image/icon/icon_cart.png" alt=""></a>
</body>

</html>