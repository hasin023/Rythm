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
            <h3>Login to your Rythm account</h3>
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
    </div>
</body>
</html>