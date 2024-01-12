
<?php
function connectDB(){
  header('Content-Type: text/html; charset=utf-8');
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "bookstore";
  $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  $conn->exec("set names utf8");
  return $conn;
}  
?>
</body>

