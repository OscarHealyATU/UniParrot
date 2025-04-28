<?php
session_start();
require 'connectToDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["commentText"];
    $post_id = $_POST["post_id"];


    if (isset($_SESSION["user_id"]) ) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "Note: <a href='../login.php'><u><strong>Log in</strong></u></a> or <a href='../register.php'><strong><u>Register</strong></u></a> to post!";
        exit;
    }
    if (empty($post_id)) {
        echo "Note: Comment empty";
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss",$post_id, $user_id, $comment);

    if ($stmt->execute()) {
        echo $conn->insert_id;        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
