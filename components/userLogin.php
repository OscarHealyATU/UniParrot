<?php
require 'connectToDB.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    // if (empty($username) || empty($password) || empty($email)) {
    //     echo "Username and password are required!";
    //     exit;
    // }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "select * from users where username = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $response = [];

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["hashed_password"])) {
            $_SESSION["username"] = $username;
            $response['status'] = 'success';
            $response['message'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Incorrect Username or Password';
            
        }
    } else {
        $response['status'] = 'error';
            $response['message'] = 'Incorrect Username or Password';
    }

    echo json_encode($response);

    // $stmt->close();
    // $conn->close();
}
