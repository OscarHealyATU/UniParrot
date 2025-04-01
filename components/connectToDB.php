<?php
    $servername = "UniParrot";
    $username = "root";
    $password = "";
    $dbname = "Uni_Parrot";
    echo "<script>console.log('connecting to database..')</script>";
// create & checking connection 
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "<script>console.log('failed at connectToDB')</script>";
}

?>