<?php
 echo "<script>console.log('got to here');</script>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    
    $mobPhone = $_POST["phone"];
    $email = $_POST["email"];

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password) || empty($email) || empty($firstName) || empty($lastName) || empty($mobPhone)) {
        echo "Username and password are required!";
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (username, user_type, first_name, last_name, phone, email, hashed_password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $firstName, $lastName,$mobPhone, $email, $hashedPassword);
    
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
    

    

?>