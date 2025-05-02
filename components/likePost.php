<?php
require 'connectToDB.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postId = intval($_POST['postId']);
    $action = $_POST['action'];

    if ($action === 'like') {
        // $conn->query("update posts set likes + 1 where id = $postId");
        $stmt = $conn->prepare("UPDATE posts SET likes = likes + 1 WHERE post_id = ?");
        $stmt->bind_param("i", $postId);
        if ($stmt->execute()) {
            echo "Liked!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    if ($action === 'dislike') {
        // $conn->query("update posts set dislikes + 1 where id = $postId");
        $stmt = $conn->prepare("UPDATE posts SET dislikes = dislikes + 1 WHERE post_id = ?");
        $stmt->bind_param("i", $postId);
        if ($stmt->execute()) {
            echo "disliked!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    if ($action === 'share') {
        // $conn->query("update posts set shares + 1 where id = $postId");
        $stmt = $conn->prepare("UPDATE posts SET shares = shares + 1 WHERE post_id = ?");
        $stmt->bind_param("i", $postId);
        if ($stmt->execute()) {
            echo "shared!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
