<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");


function getInput($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon shortcut" href = "img/music.ico">
    <title>Register</title>
    <link rel = "stylesheet" type = "text/css" href = "css/register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">

</head>
<body>
    <div class= "backgroundImg">
        <div class = "loginContainer">
            <div class = "inputContainer">
                <form id = "loginForm" action = "register.php" method = "POST">
                    <h3>Log into your <span class = "highlight">Rythm</span> account</h3>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label class = "inputLabel" for = "loginUsername">Username</label>
                        <input class = "textBox" id = "loginUsername" name = "loginUsername" type = "text" placeholder = "Username" required>
                    </p>
                    <p>
                        <label class = "inputLabel" for = "loginPassword">Password</label>
                        <input class = "textBox" id = "loginPassword" name = "loginPassword" type = "password" placeholder = "Password" required>
                    </p>
                    <button class = "submitButton" type = "submit" name = "loginButton">LOG IN</button>
                </form>
                
                
                
                <form id = "registrationForm" action = "register.php" method = "POST">
                    <h3>Create your free account today!!</h3>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label class = "inputLabel" for = "username">Username</label>
                        <input class = "textBox" id = "username" name = "username" type = "text" placeholder = "Username" value = "<?php getInput('username') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$nameCharacters); ?>
                        <label class = "inputLabel" for = "firstName">First Name</label>
                        <input class = "textBox" id = "firstName" name = "firstName" type = "text" placeholder = "First Name" value = "<?php getInput('firstName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$nameCharacters); ?>
                        <label class = "inputLabel" for = "lastName">Last Name</label>
                        <input class = "textBox" id = "lastName" name = "lastName" type = "text" placeholder = "Last Name" value = "<?php getInput('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label class = "inputLabel" for = "email">Email</label>
                        <input class = "textBox" id = "email" name = "email" type = "email" placeholder = "Email" value = "<?php getInput('email') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <label class = "inputLabel" for = "password">Password</label>
                        <input class = "textBox" id = "password" name = "password" type = "password" placeholder = "Password" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                        <label class = "inputLabel" for = "confirmPassword">Re-enter Password</label>
                        <input class = "textBox" id = "confirmPassword" name = "confirmPassword" type = "password" placeholder = "Confirm password" required>
                    </p>
                    <button class = "submitButton" type = "submit" name = "registerButton">SIGN UP</button>
                </form>
        
            </div>
        </div>
    </div>
</body>
</html>