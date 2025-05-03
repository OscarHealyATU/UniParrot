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
             // SELECT users.username, posts.subject, posts.content, posts.created_at 
            // FROM posts 
            // JOIN users ON posts.user_id = users.user_id 
            // WHERE posts.post_id = ?
             $stmt = $conn->prepare("
            SELECT users.username, posts.subject, posts.content, posts.created_at, 
            posts.likes, posts.dislikes, posts.shares
            FROM posts 
            JOIN users ON posts.user_id = users.user_id 
            WHERE posts.post_id = ?
            ");
            
            $stmt->bind_param("i", $postId);
            $stmt->execute();
            $stmt->bind_result($user_id, $title, $body, $postAge, $likes, $dislikes, $shares);

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
                <strong>user: <?php echo $user_id; ?></strong>
                <br> posted at: <br><?php echo $postAge; ?>
            </p>
            <hr>
            <!-- share button -->
            <div class="engageBox">

                <button class="like" onclick="likePost()"><?php echo $likes; ?>Likes</button>
                <button class="dislike" onclick="dislikePost()"><?php echo $dislikes; ?> dislikes</button>
                <button class="shareButton" onclick="sharePost()"><?php echo $shares; ?> Share</button>
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
        <div id="commentsContainer" class="form-bit dBox">

        </div>
        <script>
            const CONST_POST_ID = "<?php echo $postId; ?>";
            // alert("post id: " + CONST_POST_ID);
            window.onload = loadComments;

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
                            document.getElementById("message").innerHTML = "Note: Posted Comment!";
                            /////////////// added this 
                            document.getElementById("makeComment").reset();
                            loadComments();
                          
                        }else{
                            document.getElementById("message").innerHTML ="Note: <a href='../login.php'><u><strong>Log in</strong></u></a> or <a href='../register.php'><strong><u>Register</strong></u></a> to post!";
                        }
                    }).catch(error => {
                        console.error('error: ', error);
                        document.getElementById("message").innerHTML = "Something went wrong!";
                    });
            }

            function loadComments() {
                fetch(`components/fetchComments.php?postId=${CONST_POST_ID}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("commentsContainer").innerHTML = html;
                    })
                    .catch(error => ("error loading comments: ", error));
            }


            function sharePost() {
                const url = document.location.href;
                console.log(navigator.clipboard);
                navigator.clipboard.writeText(url).then(() => {
                    alert("Link Copied");
                    countShares();
                }).catch(error => {
                    console.error("error copying link: " + error);
                });
            }

            function countShares() {

                fetch('components/likePost.php', {
                    method: 'Post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'postId=' + CONST_POST_ID + '&action=share'
                });
            }


            function likePost() {

                fetch('components/likePost.php', {
                        method: 'Post',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'postId=' + CONST_POST_ID + '&action=like'
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); 
                        document.getElementById('message').innerHTML = data; 
                        location.reload(); 
                    });
            }

            function dislikePost() {

                fetch('components/likePost.php', {
                        method: 'Post',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'postId=' + CONST_POST_ID + '&action=dislike'
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); 
                        document.getElementById('message').innerHTML = data; 
                        location.reload(); 
                    });
            }
        </script>



    </main>
</body>

</html>