<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot | Sign Up</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">
    <link rel="stylesheet" href="styles/formStyle.css">

</head>

<body>
    <?php include 'components/navigation.php'; ?>

    <main class="main abox">

        <form action="" class="width-5 height-3">
            <div class="form-header">
                <h1>Sign Up</h1>
                <a href="login.php">
                    <p>Log in here if you're already registered to the site</p>
                </a>
            </div>
            <div class="form-bit dBox">
                <label for="first-name">First Name</label>
                <input type="text" name="first-name" id="first-name">
                <label for="last-name">Last Name</label>
                <input type="text" name="last-name" id="last-name">
            </div>
            <div class="form-bit dBox">
                <label for="email">Email </label>
                <input type="text" name="email" id="">

                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone">
            </div>
            <button class="dBox">Sign up</button>
        </form>






        </form>

    </main>
    <script src="scripts/formVal.js"></script>
    <?php include 'components/footer.php'; ?>

</body>