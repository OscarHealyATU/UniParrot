<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">
    <link rel="stylesheet" href="styles/feedStyle.css">
    <link rel="stylesheet" href="styles/photoStyle.css">

</head>
 
<body>
    <?php include 'components/navigation.php';
    
    $stmt = $conn->prepare("select post_id, user_id, subject, content from posts order by created_at desc limit 20");
    $stmt->execute();
    $stmt->bind_result($post_id, $user_id, $subject, $content);
    ?>

    <div class="content">
    
    <div class="photo-sidebar abox height-2">
            <img src="assets/atuPhotos/atuPhotos2.jpg">
            <img src="assets/atu_photos/atu_photos-25.jpg">
            <img src="assets/atu_photos/atu_photos-12.jpg">
        </div>
        <main class="main abox">

            <h1>Popular Posts</h1>
            <!-- Hard coded Article -->
            <aside class="left-aside" id="postPrompt">
                <form method="post" id="makePost" onsubmit="makePost(event)">
                    <div class="dBox" class="caron" id="post-expand">
                        <div class="caron" onclick="expandMakePost()">
                            <h3>
                                <?php
                                if (isset($_SESSION["username"])) {
                                    echo "Hey <strong>" . $_SESSION["username"] . "</strong> m";
                                } else {
                                    echo "M";
                                }
                                ?>ake a post!
                            </h3>
                        </div>
                        <div id="make-post-container" class="make-post-container">
                            <label for="postSubject">Title</label>
                            <input type="text" name="postSubject" id="postSubject" placeholder="Subject">
                            <label for="postBody">Exposition</label>
                            <textarea name="postBody" id="postBody" placeholder="Body"></textarea>
                            <div id="message" class="abox">Note: Extra info may appear here..</div>
                            <button type="submit">Post</button>

                        </div>
                    </div>
                </form>
            </aside>
            <a href="article.php" target="_blank">

            </a>

            <div id="feed-container-main">
                <!-- fake script for prototype -->
                <!-- <script src="scripts/feed.js"></script> -->
                <!-- real php script -->
                <?php
                while ($stmt->fetch()) {
                   echo "
                   <article class='bBox'>
                        <div>
                            <img src='assets/UI/noProfile.png' alt='profile_000{$user_id}'>
                            <strong>User #{$user_id}</strong>
                        </div>  
                        <div>
                            <h3>{$subject}</h3> 
                            <p>" . substr($content, 0, 300) . "...</p> 
                            <span class='read-more'>click to read more...</span>
                            <form method='get' action='post.php'>
                                <input type='hidden' name='postId' value='{$post_id}'>
                                <button class='comment' type='submit'>View Post</button>       
                            </form>
                        </div>
                    </article>
                   ";
                }
               
                    ?>
            </div>
            <!-- article click more -->
            <!-- <script src="scripts/function.js"></script> -->
        </main>
    </div>
   
    <script>
        function makePost(event) {

            event.preventDefault();
            let formData = new FormData(document.getElementById("makePost"));

            fetch("components/createPost.php", {
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
        // .then(postId => {
        //     document.getElementById("message").innerHTML = "Note: Post successful!";
        //     // redirect after success message
        //     setTimeout(function() {
        //         window.location.href = 'post.php?postId=' + postId;
        //     }, 2000);
        // }).catch(error => {
        //     console.error('error: ', error);
        //     document.getElementById("message").innerHTML = "Something went wrong!";
        // });

        // }
    </script>
    <?php include 'components/footer.php'; ?>
</body>

</html>