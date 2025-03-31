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
            <?php include 'components/post.php'; ?>
            <a href="article.php" target="_blank">
                
            </a>

            <div id="feed-container-main">
                <script src="scripts/feed.js"></script>
            </div>
            <!-- article click more -->
            <!-- <script src="scripts/function.js"></script> -->
        </main>
    </div>
    <?php include 'components/footer.php'; ?>
</body>

</html>