<?php
    $servername = "UniParrot";
    $username = "root";
    $password = "";
    $dbname = "Uni_Parrot";
    
// create & checking connection 
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   
}

?>