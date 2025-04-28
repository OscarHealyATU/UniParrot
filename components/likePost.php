<?php
require 'connectToDB.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $postId = intval($_POST['postId']);
    $action = $_POST['action'];

    if($action === 'like'){
        $conn->query("update posts set likes + 1 where id = $postId");
    }
    if($action === 'dislike'){
        $conn->query("update posts set dislikes + 1 where id = $postId");
    }
    if($action === 'share'){
        $conn->query("update posts set shares + 1 where id = $postId");
    }
}

?>