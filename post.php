<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot | Post</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">
    <link rel="stylesheet" href="styles/feedStyle.css">


</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <main class="main abox" id="postPrompt" onsubmit="makePost(event)">
        <?php

        if (isset($_GET["postId"])) {

            $postId = intval($_GET['postId']);

            $stmt = $conn->prepare("select user_id,subject,content, created_at from posts where post_id =?");
            $stmt->bind_param("i", $postId);
            $stmt->execute();
            $stmt->bind_result($user_id, $title, $body, $postAge);

            if ($stmt->fetch()) {
                //  $output = "<h2>".$title."?postId=23</h2><p><strong>".$user_id."</strong><br>".$postAge."</p><p>".$body."</p>";
                // $output = "";
                // $titleFetch = "$title";
            } else {
                echo "post not found";
            }
        }

        ?>

        <div class='form-header'>
            <h1><?php echo $title; ?></h1>
            <!-- user + date -->
            <p>
                <strong>user no:<?php echo $user_id; ?></strong>
                <br> posted at: <br><?php echo $postAge; ?>
            </p>
            <!-- share button -->
            <div class="engageBox">

                <button class="like" onclick="sharePost()">Like</button>
                <button class="dislike" onclick="sharePost()">Dislike</button>
                <button class="shareButton" onclick="sharePost()">Share</button>
            </div>
        </div>

        <div class="form-bit dBox">


            <!-- body -->
            <p><b><?php echo $body; ?></b></p>

        </div>

        <div class="form-bit dBox">
            <input type="text" value="comment" class="cBox">
            <button class="comment">comment</button>
        </div>





        <script>
            function sharePost() {
                const url = window.location.href;
                navigator.clipboard.write(url).then(() => {
                    alert("Link Copied");
                    countShares();
                }).catch(error => {
                    console.error("error copying link: " + error);
                });
            }
            function countShares() {
                const = <?php echo $postId ?>;
                fetch('likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + postId + '&action=share'
                });
            }


            function likePost() {
                const = <?php echo $postId ?>;
                fetch('likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + postId + '&action=like'
                });
            }

            function dislikePost() {
                const = <?php echo $postId ?>;
                fetch('likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + postId + '&action=dislike'
                });
            }
           
        </script>



    </main>
</body>

</html>