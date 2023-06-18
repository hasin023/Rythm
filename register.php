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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src = "js/register.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">

</head>
<body>

    <script>
        $(document).ready(function () {
            $("#loginForm").show();
            $("#registrationForm").hide();
        });
    </script>

    <div class= "backgroundImg">
        <div class = "loginContainer">
            <div class = "inputContainer">
                <div class = "loginFormClass">
                    <form id = "loginForm" action = "register.php" method = "POST">
                        <h3>Log into your <span class = "highlight">Rythm</span> account</h3>
                        <p>
                            <?php echo $account->getError(Constants::$loginFailed); ?>
                            <div class = "wrapper">
                                <div class = "input-data">
                                    <input id = "loginUsername" name = "loginUsername" type = "text" required>
                                    <div class = "underline"></div>
                                    <label for = "loginUsername">Username</label>
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class = "wrapper">
                                <div class = "input-data">
                                    <input id = "loginPassword" name = "loginPassword" type = "password" required>
                                    <div class = "underline"></div>
                                    <label for = "loginPassword">Password</label>
                                </div>
                            </div>   
                        </p>
                        <button class = "submitButton" id = "loginButton" type = "submit" name = "loginButton">LOG IN</button>

                        <div class = "hasAccountText">
                            <span id = "hideLogin">Don't have an account yet? Sign up here.</span>
                        </div>
                    </form>
                </div>
                
                <div class = "registerForm ">
                    <form id = "registrationForm" action = "register.php" method = "POST">
                        <h3>Create your free account today!!</h3>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                                <input id = "username" name = "username" type = "text" value = "<?php getInput('username') ?>" required>
                                <div class = "underline"></div>
                                <label for = "username">Username</label>
                            </div>
                        </div>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$nameCharacters); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                                <input id = "firstName" name = "firstName" type = "text" value = "<?php getInput('firstName') ?>" required>
                                <div class = "underline"></div>
                                <label for = "firstName">First Name</label>
                            </div>
                        </div>  
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$nameCharacters); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                            <input id = "lastName" name = "lastName" type = "text" value = "<?php getInput('lastName') ?>" required>
                                <div class = "underline"></div>
                                <label for = "lastName">Last Name</label>
                            </div>
                        </div>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                                <input id = "email" name = "email" type = "email" value = "<?php getInput('email') ?>" required>
                                <div class = "underline"></div>
                                <label for = "email">Email</label>
                            </div>
                        </div>                
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                                <input id = "password" name = "password" type = "password" required>
                                <div class = "underline"></div>
                                <label for = "password">Password</label>
                            </div>
                        </div>           
                    </p>  
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                        
                        <div class = "wrapper">
                            <div class = "input-data">
                                <input id = "confirmPassword" name = "confirmPassword" type = "password" required>
                                <div class = "underline"></div>
                                <label for = "confirmPassword">Re-enter Password</label>
                            </div> 
                        </p>
                        
                        <button id = "regButton" class = "submitButton" type = "submit" name = "registerButton">SIGN UP</button>

                        <div class = "hasAccountText">
                            <span id = "hideRegister">Already have an account? Log in here.</span>
                        </div>
                    </form>
                </div>
        
            </div>
        </div>
    </div>
</body>
</html>