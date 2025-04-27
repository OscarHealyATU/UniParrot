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
<?php 
include 'components/navigation.php';

?>
<main class="main abox" id="postPrompt" onsubmit="makePost(event)">
                <form method="post" id="makePost">
                    <div class="dBox" class="caron" id="post-expand">
                        <div class="caron" >
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
                            <label for="postSubject">Exposition</label>
                            <textarea name="postBody" id="postBody" placeholder="Body"></textarea>
                            <div id="message" class="abox">Note: Extra info may appear here..</div>
                            <button type="submit">Post</button>

                        </div>
                    </div>
                </form>
            </aside>
</body>
</html>