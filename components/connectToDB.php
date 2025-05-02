<?php
/**
 * $servername = "localHost";
 * $username = "root";
 * $password = "";
 * $dbname = "Uni_Parrot";
 * $password = "Lovetech01";
 */
    $servername = "UniParrot";
    $username = "root";
    $password = "";
    $dbname = "Uni_Parrot";
    
// create & checking connection 
$conn = new mysqli($servername,$username,$password,$dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   
}
$conn->set_charset("utf8mb4"); // cPanel server byte code

?>