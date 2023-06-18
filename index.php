<?php
include("includes/config.php");

//session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
      name="description"
      content="Rythm is a free music streaming service that allows the user to listen to their favourite tunes for free."
    />
    <link rel = "icon shortcut" href = "img/music.ico">
    <link rel="stylesheet" type="text/css" href = "css/index.css">
    <title>Rythm | Music you love</title>
</head>
<body>
    

    <div id = "nowPlayingBarContainer">

        <div id = "nowPlayingBar">

            <div id = "nowPlayingLeft">

            </div>

            <div id = "nowPlayingCenter">
                <div class = "content playerControls">
                    <div class = "buttons">
                        <button class = "btn shuffle" title = "Shuffle button">
                        <ion-icon name="shuffle"></ion-icon>
                        </button>

                        <button class = "btn back" title = "Back button">
                        <ion-icon name="play-skip-back-sharp"></ion-icon>
                        </button>

                        <button class = "btn play" title = "Play button">
                        <ion-icon class = "play" name="play-circle-sharp"></ion-icon>
                        </button>

                        <button class = "btn pause" title = "Pause button" style = "display: none">
                        <ion-icon class = "pause" name="pause-circle"></ion-icon>
                        </button>

                        <button class = "btn forward" title = "Forward button">
                        <ion-icon name="play-skip-forward-sharp"></ion-icon>
                        </button>

                        <button class = "btn repeat" title = "Repeat button">
                        <ion-icon name="repeat"></ion-icon>
                        </button>
                    </div>

                    <div class = "playBackBar">
                        <span class = "progressTime current">0:00</span>
                        <div class = "progressBar">
                            <div class = "progressBarBg">
                                <div class = "progress">
                                    
                                </div>
                            </div>
                        </div>
                        <span class = "progressTime remaining">0:00</span>

                    </div>

                </div>

            </div>

            <div id = "nowPlayingRight">

            </div>



        </div>

    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>