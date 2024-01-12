<?php
include_once "DB.php";
include_once "Category.php";
    class Book{
        public $id;
        public $tensach;
        public $gia;
        public $soluong;
        public $image;
        public $ngaycapnhat;
        public $chude;

    }
    function findAllBook(){
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM sach ");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $arrBook = array();
        foreach ($kq as $row) {
            $book = new Book();
            $book->id=$row["id"];
            $book->tensach=$row["tensach"];
            $book->gia=$row["gia"];
            $book->soluong=$row["soluong"];
            $book->image=$row["img"];
            $book->ngaycapnhat=$row["ngaycapnhat"];
            $book->chude = findCategoryByBookId($row["id"]);
            array_push($arrBook,$book);
        }
        return $arrBook;
    }
    function findOneBookById($id){
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM sach WHERE id = $id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $book = new Book();
        foreach ($kq as $row) {
            $book->id=$row["id"];
            $book->tensach=$row["tensach"];
            $book->gia=$row["gia"];
            $book->soluong=$row["soluong"];
            $book->image=$row["img"];
            $book->ngaycapnhat=$row["ngaycapnhat"];
            $book->chude = findCategoryByBookId($row["id"]);
        }
        return $book;
    }
    function findOneBookByBookName($name){
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM sach WHERE tensach = '$name'");
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $book = new Book();
        foreach ($kq as $row) {
            $book->id=$row["id"];
            $book->tensach=$row["tensach"];
            $book->gia=$row["gia"];
            $book->soluong=$row["soluong"];
            $book->image=$row["img"];
            $book->ngaycapnhat=$row["ngaycapnhat"];
            $book->chude = findCategoryByBookId($row["id"]);
        }
        return $book;
    }
    function addBook($book, $categories){
        try{
            $conn = connectDB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO sach(tensach, gia, soluong, img, ngaycapnhat) 
            VALUES ('$book->tensach','$book->gia','$book->soluong','$book->image','$book->ngaycapnhat')";
            $conn->exec($sql);
            addCategoryBook($book->tensach,$categories);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    function updateBook($book,$categories){
        try{
            $conn = connectDB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE sach SET tensach='$book->tensach',gia='$book->gia',
            soluong='$book->soluong',img='$book->image',ngaycapnhat='$book->ngaycapnhat' WHERE id='$book->id';";
            $conn->exec($sql);
            updateCategory($book->id,$categories);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    function deleteBook($id){
        try{
            $conn = connectDB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM sach WHERE id = '$id'";
            $conn->exec($sql);
            deleteCategoryBook($id);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    
?>