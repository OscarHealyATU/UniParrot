<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot | Profile</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">
    <link rel="stylesheet" href="styles/formStyle.css">
    

</head>

<body>
    <?php include 'components/navigation.php';

    if (isset($_SESSION["user_id"])) {

        $userId = intval($_SESSION["user_id"]);

        $stmt = $conn->prepare("
        select * from users where user_id = ?
        ");

        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($user_id, $username, $user_type, $first_name, $last_name, $phone, $email, $acc_age, $password);

        if ($stmt->fetch()) {
            //  $output = "<h2>".$title."?postId=23</h2><p><strong>".$user_id."</strong><br>".$postAge."</p><p>".$body."</p>";
            // $output = "";
            // $titleFetch = "$title";
        } else {
            echo "failed to load profile";
        }
    }



    ?>


    <main class="main abox">
        <div>
            <form action="">
                <h1>Profile Page</h1>
                <div class="profile-header dBox">

                    <!-- <img src="assets/profile/UI/noProfile.png" alt=""> -->
                    <div>
                        <label for="fullName">Name</label>
                        <input type="text" name="fullName" id="fullName" value="[<?php echo $first_name . " " . $last_name; ?>]" disabled>
                        <label for="accountAge">Joined</label>
                        <input type="text" name="accountAge" id="accountAge" class="width-3"
                            value="[<?php echo $acc_age; ?>]" disabled>
                    </div>
                    
                </div>

                <div class="form-bit dBox" id="<?php echo $user_id; ?>">
                    <label for="username">User name</label>
                    <input type="text" name="username" id="username" value="[<?php echo $username; ?>]" disabled>
                    <label for="name">First Name</label>
                    <input type="text" name="fname" id="fname" value="[<?php echo $first_name; ?>]" disabled>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" value="[<?php echo $last_name; ?>]" disabled>
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" id="phone" value="[<?php echo $phone; ?>]" disabled>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="[<?php echo $email; ?>]" disabled>
                </div>
            </form>
            <div class="dBox">
                <?php

                $stmt->close();
                if (isset($_SESSION["user_id"])) {

                    $userId = intval($_SESSION["user_id"]);
                    $stmt2 = $conn->prepare("
                        SELECT users.username, posts.post_id, posts.subject, posts.content, posts.created_at, 
                        posts.likes, posts.dislikes, posts.shares
                        FROM posts 
                        JOIN users ON posts.user_id = users.user_id 
                        WHERE posts.user_id = ?
                        ");

                    $stmt2->bind_param("i", $user_id);
                    $stmt2->execute();
                    $stmt2->bind_result($user_id, $post_id, $title, $body, $postAge, $likes, $dislikes, $shares);
                    echo"<h2>Post History</h2>";
                    while ($stmt2->fetch()) {
                        echo "
                        <article class='bBox'>
                             <div>
                                <h3>{$title}</h3> 
                                 <p>" . substr($body, 0, 300) . "...</p> 
                                 <span class='read-more'>click to read more...</span>
                             </div>  
                             <div>
                                 <form method='get' action='post.php'>
                                     <input type='hidden' name='postId' value='{$post_id}'>
                                     <button class='dBox' type='submit'>View Post</button>       
                                 </form>
                             </div>
                         </article>
                        ";
                     }
                    
                }else {
                    echo "user_id not set";
                }
                $stmt2->close();
                ?>
                <div id="feed-container-main">
                <!-- fake script for prototype -->
                <!-- <script src="scripts/feed.js"></script> -->
                <!-- real php script -->
                <?php
                
                    ?>
            </div>
            </div>
            
        </div>
    </main>

    <?php include 'components/footer.php'; ?>

</body>

</html>