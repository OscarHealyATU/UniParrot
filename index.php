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

</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <div class="content">

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
                <script src="scripts/feed.js"></script>
                
            </div>
            <!-- article click more -->
            <!-- <script src="scripts/function.js"></script> -->
        </main>
    </div>
    <script>
                    function makePost(event) {

                        event.preventDefault();
                        let formData = new FormData(document.getElementById("makePost"));

                        fetch("../components/createPost.php", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById("message").innerHTML = data;
                                // redirect after success message
                                setTimeout(function() {
                                    window.location.href = 'post.php?id=' + postId;
                                }, 2000);
                            });

                    }
                </script>
    <?php include 'components/footer.php'; ?>
</body>

</html>