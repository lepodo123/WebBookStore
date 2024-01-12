<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleLogin.css">
</head>

<body>
    <?php error_reporting(0);?>
    <div class="list_cart"></div>
    <div class="header">
        <div class="box_header">
            <a href="index.php" ><img class="img_header" src="image/banner/logo.png" alt=""></a>
          
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
                <div><a href="Login.php" class="login"><img src="image/icon/icon_person.png" alt="" width="30px"
                            style="margin-right: 10%;">Login</a></div>
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
            <form action="#" method="post">
                <h1 style="text-align: center">Đăng ký</h1>
                <input class="input" type="text" name="username" id="username" value="" placeholder="Tài khoản" value="<?php echo $username?>"><br>
                <input class="input" type="password" name="password" id="password" value="" placeholder="Mật khẩu" ><br>
                <input class="input" type="password" name="repassword" id="repassword" value="" placeholder="Nhập lại mật khẩu"><br>
                <input class="input" type="text" name="name" id="name" value="" placeholder="Họ tên" value="<?php echo $name?>"><br>
                <input class="input" type="text" name="birthday" id="birthday" placeholder="Ngày sinh" value="<?php echo $birthday?>"><br>
                <input class="input" type="email" name="email" id="email" placeholder=" Email" value="<?php echo $email?>"><br>
                <input class="input" type="text" name="address" id="address" placeholder="Địa chỉ" value="<?php echo $address?>"><br>
                <input class="input" type="text" name="phonenumber" id="phonenumber" placeholder="Số điện thoại" value="<?php echo $phonenumber?>"><br>
                <input class="input button_signin" type="submit" value="Đăng ký"><br>
        </form>
        <?php
        include("User.php");
            function indexPost($index, $value = "" ){
                if(isset($_POST[$index])) return $_POST[$index];
                return $value;
            }
            
            $username = indexPost("username");
            $password = indexPost("password");
            $repassword = indexPost("repassword");
            $name = indexPost("name");
            $birthday = indexPost("birthday");
            $email = indexPost("email");
            $address = indexPost("address");
            $phonenumber = indexPost("phonenumber");
            if($username!=""&&
            $password!=""&&
            $repassword!=""&&
            $name!=""&&
            $birthday!=""&&
            $email!=""&&
            $address!=""&&
            $phonenumber!=""
            ){
                if(checkUsername($username)==false){
                    if($password===$repassword){
                        $user = new User();
                        $user->username = $username;
                        $user->password = $password;
                        $user->name = $name;
                        $user->email = $email;
                        $user->birthday = $birthday;
                        $user->address = $address;
                        $user->phone = $phonenumber;
                        $noti = "Đăng ký thành công";
                        addUser($user);   
                    }else{
                        $noti = "Mật khẩu không trùng khớp";
                    }
                }
                else{
                    $noti = "Tên tài khoản đã tồn tại";
                }
               
            }
            else{
                $noti = "Vui lòng nhập đầy đủ thông tin";
            }
            
        ?><div><?php echo $noti?></div>
        </div>
    </div>
    <footer class="footer">
        <div class="box_footer" >
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
                    <a href=""><div class="zoom"><img src="image/icon/icon_mail.png" alt=""></div></a>
                    <a href=""><div class="zoom"><img src="image/icon/icon_facebook.png" alt=""></div></a>
                    <a href=""><div class="zoom"><img src="image/icon/icon_instagram.png" alt=""></div></a>
                    <a href=""><div class="zoom"><img src="image/icon/icon_pinterest.png" alt=""></div></a>            
            </div>
        </div>
    </footer>
    <a href="" class="cart_icon"><img src="image/icon/icon_cart.png" alt=""></a>
</body>

</html>