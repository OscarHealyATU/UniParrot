<!DOCTYPE html>
<html lang="en">

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

        <form method="POST" class="width-5 height-3" id="registerForm" onsubmit="register(event)">
            <div class="form-header">
                <h1>Sign Up</h1>
                <a href="login.php">
                    <p>Log in here if you're already registered to the site</p>
                </a>
            </div>
            <div class="form-bit dBox">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div class="form-bit dBox">
                <label for="username">Username </label>
                <input type="text" name="username" id="username">

                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-bit dBox">
                <label for="email">Email </label>
                <input type="text" name="email" id="">

                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone">
            </div>
            <div id="message" class="abox">Message:</div>
            <button class="bBox">Sign up</button>

        </form> 
    </main>
    <script src="scripts/formVal.js"></script>
    <script>
        function register(event) {
            event.preventDefault();
            let formData = new FormData(document.getElementById("registerForm"));

            fetch("components/userRegister.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("message").innerHTML = data;
                    // redirect after success message
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000);
                });
        }
    </script>
    <?php include 'components/footer.php'; ?>

</body>