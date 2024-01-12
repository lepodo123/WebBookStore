<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylebuy.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleLogin.css">
    <title>Admin</title>
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
                            if (isset($_GET["userId"])) {
                                $id = $_GET["userId"];
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
    <div class="form_login">
        <form action="" method="post" enctype="multipart/form-data">
            <h1 style="text-align: center;">
                <?php
                $id = $_GET["userId"];
                $idBook = $_GET["id"];
                if (isset($id)) {
                    echo "Sửa sách";
                } else {
                    echo "Thêm sách";
                }
                if (isset($id)) {
                    $book = findOneBookById($idBook);

                }
                ?>
            </h1>
            <input class="input" type="text" name="tensach" id="" placeholder="Tên sách" value="<?php echo $book->tensach ?>"><br>
            <input class="input" type="text" name="gia" id="" placeholder="Giá" value="<?php echo $book->gia ?>"><br>
            <input class="input" type="text" name="soluong" id="" placeholder="Số lượng" value="<?php echo $book->soluong ?>"><br>
            <input class="input" type="text" name="ngayphathanh" id="" placeholder="Ngày phát hành" value="<?php $date = date_create($book->ngaycapnhat);
                                                                                                            echo date_format($date, "d-m-Y"); ?>"><br>
            <input class="input" type="file" name="anh" value="D:\Repositories\wamp\www\ThiGk\WebFigure/<?php echo $book->image ?>">
            <label for="">Chủ đề:</label><br>
            <?php
            $categories = findAllCategory();
            foreach ($categories as $k => $c) {
                $value = "";
                if (isset($id)) {
                    foreach ($book->chude as $key => $v) {
                        if ($v["machude"] == $c["machude"]) {
                            $value = "checked";
                            break;
                        }
                    }
                }
            ?>
                <label for=""><?php echo $c["tenchude"] ?></label><input style="margin-right: 20px;" type="checkbox" name="categories[]" id="" value="<?php echo $c["machude"] ?>" <?php echo $value ?>>

            <?php
                if ($k != 0 && $k % 3 == 0) {
                    echo "<br>";
                }
            }
            ?>
            <div style="text-align: center; margin-top: 20px; height:50px;"><input style="height: 100%" type="submit" class="button_signin" value="<?php
                                                                                                                                                    if (isset($id)) {
                                                                                                                                                        echo "Sửa";
                                                                                                                                                    } else {
                                                                                                                                                        echo "Thêm";
                                                                                                                                                    }
                                                                                                                                                    ?>"></div>
        </form>
    </div>
    <?php
    error_reporting(0);
    function indexPost($index, $value = "")
    {
        if (isset($_POST[$index])&&trim($_POST[$index])!="") return $_POST[$index];
        return $value;
    }
    $tensach = indexPost("tensach");
    $gia = indexPost("gia");
    $soluong = indexPost("soluong");
    $ngayphathanh = indexPost("ngayphathanh");
    $categories = indexPost("categories");
    $arrImg = array("image/png", "image/jpeg", "image/bmp");
    $err = "";
    $nameimg = "";
    if (isset($id)) {
        $img = $book->image;
    } else {
        $img = "image/img_item/";
    }
    if ($tensach == "") $err .= "Phải nhập tên sachs <br>";
    if ($gia == "") $err .= "Phải nhập giá <br>";
    if ($soluong == "") $err .= "Phải nhập số lượng <br>";
    if ($ngayphathanh == "") $err .= "Phải nhập ngày phát hành<br>";

    $errFile = $_FILES["anh"]["error"];
    if ($errFile > 0)
        $err .= "Lỗi file hình <br>";
    else {
        $type = $_FILES["anh"]["type"];
        if (!in_array($type, $arrImg))
            $img = "image/img_item/";
        else {
            $temp = $_FILES["anh"]["tmp_name"];
            $nameimg = $_FILES["anh"]["name"];
            print_r($nameimg);
            if (!move_uploaded_file($temp, "image/img_item/" . $nameimg))
                $err .= "Không thể lưu file<br>";
                $img = "image/img_item/" . $nameimg;
        }
    }

    
    if ($tensach != "" && $gia != "" && $soluong != "" && $ngayphathanh != "" && $img != "" && $img != "image/img_item/" && $categories != "") {
        try {
            $book->tensach = $tensach;
            $book->gia = $gia;
            $book->soluong = $soluong;
            $book->image = $img;
            $date = date_create($ngayphathanh);
            $book->ngaycapnhat = date_format($date, "Y-m-d");
            print_r($book);
            if (isset($id)) {
                $book->id = $idBook;
                
                if (updateBook($book, $categories)) {
                    echo "Sửa thành công";
                }
                else{
                    echo "Sửa thất bại";
                }
            } else {
                if (addBook($book, $categories)) {
                    echo "Thêm thành công";
                }
                else{
                    echo "Thên thất bại";
                }
            }
        } catch (Exception $ex) {
            if (isset($id)) {

                echo "Sửa thành công";
            } else {

                echo "Thêm thành công";
            }
        }
    }
    else if($img == "image/img_item/"){
        echo "Sửa thất bại";
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
</body>

</html>