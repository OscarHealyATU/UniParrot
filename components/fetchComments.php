<?php
require "connectToDB.php";

if (isset($_GET['postId'])) {
    $postId = intval($_GET['postId']);
    // $commentId = intval($_GET['postId']);

    $stmt = $conn->prepare("
    SELECT users.username, comments.content, comments.created_at 
    FROM comments 
    JOIN users ON comments.user_id = users.user_id 
    WHERE comments.post_id = ? 
    ORDER BY comments.created_at DESC
    ");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        echo "by <strong>" . htmlspecialchars($row['username']) . " says:</strong><br>";
        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
        echo "<small>Posted at: " . htmlspecialchars($row['created_at']) . "</small>";
        echo "</div><hr>";
    }

    $stmt->close();
    $conn->close();
}
?>
