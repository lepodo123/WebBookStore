<?php
include_once "DB.php";

function findCategoryByBookId($id)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM chude INNER JOIN sach_chude ON chude.machude = sach_chude.chude_id WHERE sach_chude.sach_id = $id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function findAllCategoryById($categories){
    $conn = connectDB();
    $query = "SELECT * FROM chude WHERE ";
    foreach($categories as $k => $v){
        if($k==sizeof($categories)-1){
            $query.= "machude = $v;";
        }
        else{
            $query.= "machude = $v OR";
        }
    }
    $stmt = $conn->prepare("$query");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function toStringCategory($arrChude)
{
    $tenchude = "";
    foreach ($arrChude as $key => $chude) {
        $tenchude .= $chude["tenchude"];
        if ($key == sizeof($arrChude) - 1) {
            $tenchude .= ".";
        } else {
            $tenchude .= ",";
        }
    }
    return $tenchude;
}
function findAllCategory()
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM chude");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function addCategoryBook($bookname, $caterory)
{
    $book = findOneBookByBookName($bookname);
    foreach ($caterory as $k => $v) {
        try {
            $conn = connectDB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "INSERT INTO sach_chude (sach_id, chude_id) VALUES ('$book->id','$v')";
            $sql = "INSERT INTO sach_chude (sach_id, chude_id) VALUES ('$book->id','$v')";
            $conn->exec($sql);
        } catch (PDOException $e) {
        }
    }
}

function updateCategory($idBook, $categories){
    $count =0;
    foreach(findCategoryByBookId($idBook) as $k =>$v){
        if($v["machude"] == $categories[$k]){
            $count++;
        }
    }
    if($count == sizeof($categories) && $count !=0){
        return true;
    }
    else{
        deleteCategoryBook($idBook);
        foreach ($categories as $k => $v) {
            try {
                $conn = connectDB();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO sach_chude (sach_id, chude_id) VALUES ('$idBook','$v')";
                $conn->exec($sql);
            } catch (PDOException $e) {
            }
        }
        return true;
    }
}
function deleteCategoryBook($idBook){
    try {
        $conn = connectDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM sach_chude WHERE sach_id = $idBook";
        $conn->exec($sql);
    } catch (PDOException $e) {
    }
}
