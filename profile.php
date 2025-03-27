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
    <?php include 'components/navigation.php'; ?>
    <main class="main">
    <div class="abox">
        <form action="">
            <h1>Profile Page</h1>
            <div class="profile-header dBox">

                <img src="assets/profile/UI/noProfile.png" alt="">
                <div>
                    <label for="fullName">Name</label>
                    <input type="text" name="fullName" id="fullName" value="[Oscar Healy]" disabled>
                    <label for="biography">Biography</label>
                    <input type="text" name="biography" id="biography" class="width-3"
                        value="[I am a Computing & digital Media Student]" disabled>
                </div>
            </div>

            <div class="profile-main dBox">
                <label for="username">User name</label>
                <input type="text" name="username" id="username" value="[lazy_cat25]" disabled>
                <label for="name">First Name</label>
                <input type="text" name="fname" id="fname" value="[Oscar]" disabled>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" value="[Healy]" disabled>
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" value="[083 123 1234]" disabled>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="[G00424324@atu.ie]" disabled>
            </div>
        </form>
    </div>
    </main>

    <?php include 'components/footer.php'; ?>

</body>

</html>