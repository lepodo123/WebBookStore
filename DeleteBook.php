<?php
error_reporting(0);
include_once "DB.php";
include_once "Book.php";
include_once "Category.php";
$id = $_GET["id"];

if(deleteBook($id)){
    echo "<h1> Xóa thành công.</h1>";
}
?>
<a href="BookManager.php">Quay lại quản lý sách</a>

