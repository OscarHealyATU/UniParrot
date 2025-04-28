<?php
require "connectToDB.php";

if (isset($_GET['postId'])) {
    $postId = intval($_GET['postId']);
    // $commentId = intval($_GET['postId']);

    $stmt = $conn->prepare("SELECT user_id, content, created_at FROM comments WHERE post_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        echo "<strong>User #" . htmlspecialchars($row['user_id']) . "</strong><br>";
        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
        echo "<small>Posted at: " . htmlspecialchars($row['created_at']) . "</small>";
        echo "</div><hr>";
    }

    $stmt->close();
    $conn->close();
}
?>
