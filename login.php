<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni Parrot | Sign In</title>
    <link rel="icon" type="image/x-icon" href="assets/UI/favicon.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/navigationStyle.css">
    <link rel="stylesheet" href="styles/formStyle.css">

</head>

<body>
    <?php include 'components/navigation.php'; ?>
    <main class="main abox">
        <form method="POST" action="" class="width-5 height-3" id="loginForm">
            <div class="form-header">
                <h1>Sign In</h1>
                <a href="register.php">
                    <p>Register Here if you're new to the site</p>
                </a>
            </div>
            <div class="form-bit dBox">
                <label for="username">Username </label>
                <input type="text" name="username" id="username">

                <label for="password">password</label>
                <input type="password" name="password" id="password">
              
            </div>

            </div>
            <div id="message" class="abox">Message:</div>
            <button class="dBox">Sign in</button>

        </form>

    </main>
    
    <script>
        function login(event) {
            event.preventDefault();
            let formData = new FormData(document.getElementById("loginForm"));

            fetch("components/userlogin.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = "index.php";
                }else{
                    document.getElementById("message").innerText = data.message;
                }
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        }
    </script>
    <?php include 'components/footer.php'; ?>
   
</body>