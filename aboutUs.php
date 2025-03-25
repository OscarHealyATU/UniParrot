<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot | About Us</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">

</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <main class="main">
        <h1>About UniParrot</h1>
        <p>We are an online communication hub for students to discuss different topics with a focus on college and college
            adjacent subjects.</p>
        <h2>UNIPARROT</h2>
        <p>It can be tough for many students to keep up with different aspects of student life;
            knowing when</p>
        <ul>
            <li>documents are to be submitted for grants, </li>
            <li> needing help with certain aspects of renting </li>
            <li>taking advantage of night life and student events</li>
            <li>simply looking for some advice. </li>
        </ul>
        <h3>Where does uniParrot come into this?</h3>
       <p> uniParrot is a safe place for students to chat with each other about various events, grants, discounts etc,
       <strong>insider knowledge</strong> to help take full advantage of third level education outside of the education.</p>
        <p>Users can browse the comments without signing up and are only required to create an account upon
        submitting a comment. This is to allow future students to find out information that may become relevant
        to them later on, without excluding them totally.</p>
        <div class="slideshowContainer">
            <div class="slides fade">
                <div class="noText">1 / 3</div>
                <img src="../assets/atu_photos/atu_photos-3.jpg" style="width:100%;"
                    onerror="this.src='img/noMovie.jpg';">
                <div class="captionText">Atu front Photo</div>
            </div>
            <div class="slides fade">
                <div class="noText">2 / 3</div>
                <img src="../assets/atu_photos/atu_photos-6.jpg" style="width:100%;" onerror="this.src='img/noMovie.jpg';">
                <div class="captionText"></div>
            </div>
            <div class="slides fade">
                <div class="noText">3 / 3</div>
                <video src="../assets/UI/Comp 1_1.mp4" style="width:100%;" autoplay loop muted controls>
                    <source media="(min-width:)" src="../assets/UI/Comp 1_1.mp4">
                </video>
                <div class="captionText"></div>
            </div>

            <a class="prev" onclick="plusSlides(-1)"><img src="../assets/UI/prev_arrow.png" alt="prev_image" class="prev_image"><br>Previous</a>
            <a class="next" onclick="plusSlides(1)"><img src="../assets/UI/next_arrow.png" alt="next_image" class="next_image"><br>next</a>

        </div>
        <p>Users will need to sign up with a student email account but do not need to use their names in their
        profiles. This allows them freedom to be more authentic.</p>
        <p>Students may share their real names with a short list of [10] friends should they feel comfortable doing
        so, this will make the forums more social as it allows students to recognise their friends content in the
        wild and engage with it, but retain the authenticity mentioned above.</p>
        <!-- slide show made with help from w3shools carousel tutorial -->
        <!-- https://www.w3schools.com/howto/howto_js_slideshow.asp -->
        
    </main>
    <script src="scripts/slideshow"></script>
    <?php include 'components/footer.php'; ?>
</html>