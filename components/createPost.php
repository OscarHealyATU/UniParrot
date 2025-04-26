<?php
session_start();
require 'connectToDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postSubject = $_POST["postSubject"];
    $postBody = $_POST["postBody"];


    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "Sign in or sign up to post!";
        exit;
    }
    if (empty($postSubject)) {
        echo "Create a Title for your Post";
        exit;
    }
    if (empty($postSubject)) {
        echo "Provide some context for your Post";
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO posts (user_id, subject, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $postSubject, $postBody);

    if ($stmt->execute()) {
        echo "Successfully Posted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>