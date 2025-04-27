<?php
session_start();
require 'connectToDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postSubject = $_POST["postSubject"];
    $postBody = $_POST["postBody"];


    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "Note: <a href='../login.php'><u><strong>Log in</strong></u></a> or <a href='../register.php'><strong><u>Register</strong></u></a> to post!";
        exit;
    }
    if (empty($postSubject)) {
        echo "Note: Create a Title for your Post";
        exit;
    }
    if (empty($postSubject)) {
        echo "Note: Provide some context for your Post";
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO posts (user_id, subject, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $postSubject, $postBody);

    if ($stmt->execute()) {
        echo "Note: Successfully Posted!";
        echo $conn->insert_id;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>