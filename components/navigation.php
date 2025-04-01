<?php session_start();?>
<?php include 'connectToDB.php'; ?>
<nav class="nav1">
    <a href="">
        <img src="assets/UI/nav.png" alt="">
    </a>
    <ul class="width-3">
        <a href="index.php"><li>Posts</li></a>
        <a href="profile.php"><li>Profile</li></a>
        <a href="siteRules.php"><li>Rules</li></a>
        <a href="aboutUs.php"><li>About</li></a>
        <a href="contact.php"><li>Contact</li></a>
    </ul>
    <ul class="small-nav width-2">
        <a href="login.php"><li>Sign in</li></a>
        <a href="register.php"><li>Sign up</li></a>
    </ul>
    <button id="theme-toggle">Toggle Theme</button>

</nav>
