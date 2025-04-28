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
    <main class="main abox" id="postPrompt">
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


            <!-- post body / content -->
            <p><b><?php echo $body; ?></b></p>

        </div>
        <!-- comment -->
        <form method="post" id="makeComment" onsubmit="makeComment(event)">
            <div class="form-bit dBox">
                <input type="hidden" class="cBox" name="post_id" id="post_id" value="<?php echo $postId; ?>">
                <input type="text" class="cBox" name="commentText" id="commentText" placeholder="comment">
                <button class="comment" type="submit">comment</button>
                <div id="message" class="abox">Note: Extra info may appear here..</div>

            </div>
        </form>
        <script>
            const CONST_POST_ID = <?php echo $postId ?>;

            function makeComment(event) {
                event.preventDefault();
                let formData = new FormData(document.getElementById("makeComment"));
                fetch("components/createComment.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (!isNaN(data)) {
                            document.getElementById("message").innerHTML = "Note: Post successful!";
                            setTimeout(function() {
                                window.location.href = 'post.php?postId=' + data;
                            }, 2000);
                        } else {
                            document.getElementById("message").innerHTML = data;
                        }
                    }).catch(error => {
                        console.error('error: ', error);
                        document.getElementById("message").innerHTML = "Something went wrong!";
                    });



            }


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

                fetch('likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + postId + '&action=share'
                });
            }


            function likePost() {

                fetch('likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + postId + '&action=like'
                });
            }

            function dislikePost() {

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