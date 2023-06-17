<?php 
include("includes/classes/Account.php");
$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon shortcut" href = "img/music.ico">
    <title>Register</title>
</head>
<body>
    <div id = "inputContainer">
        <form id = "loginForm" action = "register.php" method = "POST">
            <h3>Log in to your Rythm account</h3>
            <p>
                <label for = "loginUsername">Username</label>
                <input id = "loginUsername" name = "loginUsername" type = "text" placeholder = "Username" required>
            </p>
            <p>
                <label for = "loginPassword">Password</label>
                <input id = "loginPassword" name = "loginPassword" type = "password" placeholder = "Password" required>
            </p>
            <button type = "submit" name = "loginButton">LOG IN</button>
        </form>



        <form id = "registrationForm" action = "register.php" method = "POST">
            <h3>Create your free account today!!</h3>
            <p>
                <label for = "username">Username</label>
                <input id = "username" name = "username" type = "text" placeholder = "Username" required>
            </p>
            <p>
                <label for = "firstName">First Name</label>
                <input id = "firstName" name = "firstName" type = "text" placeholder = "First Name" required>
            </p>
            <p>
                <label for = "lastName">Last Name</label>
                <input id = "lastName" name = "lastName" type = "text" placeholder = "Last Name" required>
            </p>
            <p>
                <label for = "email">Email</label>
                <input id = "email" name = "email" type = "email" placeholder = "Email" required>
            </p>
            <p>
                <label for = "password">Password</label>
                <input id = "password" name = "password" type = "password" placeholder = "Password" required>
            </p>
            <p>
                <label for = "confirmPassword">Re-enter Password</label>
                <input id = "confirmPassword" name = "confirmPassword" type = "password" placeholder = "Confirm password" required>
            </p>
            <button type = "submit" name = "registerButton">SIGN UP</button>
        </form>

    </div>
</body>
</html>