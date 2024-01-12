<?php
include_once("DB.php");
class User
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $address;
    public $phone;
    public $gender;
    public $birthday;
}
function checkAccount($username, $password)
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM khachhang ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    foreach ($kq as $row) {
        if ($row["taikhoan"] == $username && $row["matkhau"] == $password) {
            return $row;
        }
    }
    return null;
}
function checkUsername($username){
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM khachhang");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    foreach ($kq as $row) {
        if ($row["taikhoan"] == $username) {
            return true;
        }
    }
    return false;
}
function addUser(User $user){
    try{
        $conn = connectDB();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO khachhang (hoten, taikhoan, matkhau, email, diachi, dienthoai, ngaysinh) VALUES ('$user->name','$user->username','$user->password','$user->email','$user->address','$user->phone','$user->birthday')";
        $conn->exec($sql);
    }catch(PDOException $e){
    }
}
function findUser($id){
    
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE makh = $id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    
    return $kq;
}
