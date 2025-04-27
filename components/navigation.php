<?php session_start();?>
<?php include 'connectToDB.php'; ?>
<nav class="nav1">
    <a href="">
        <img src="assets/UI/nav.png" alt="">
    </a>
    <ul class="width-3">
        <a href="index.php"><li>Posts</li></a>
        <?php
       if (isset($_SESSION['username'])) {
        echo '<a href="profile.php"><li>'.$_SESSION['username'].'\'s Profile</li></a>';
        // echo '<a href="history.php"><li>Post History</li></a>';
       } else {
        echo '<a href="login.php"><li>Profile</li></a>';
       }
       ?>
        <a href="siteRules.php"><li>Rules</li></a>
        <a href="aboutUs.php"><li>About</li></a>
        <a href="contact.php"><li>Contact</li></a>
    </ul>
    <ul class="small-nav width-2">
       <?php
       if (isset($_SESSION['username'])) {
        echo '<a href="components/logout.php"><li>Sign Out</li></a>';
       } else {
        echo ' <a href="login.php"><li>Sign in</li></a>
        <a href="register.php"><li>Sign up</li></a>';
       }
       ?>
    </ul>
    <button id="theme-toggle">Toggle Theme</button>

</nav>
