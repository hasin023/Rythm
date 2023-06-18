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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">


    <title>Rythm | Music you love</title>
</head>
<body>
    

    <div id = "nowPlayingBarContainer">

        <div id = "nowPlayingBar">

            <div id = "nowPlayingLeft">
                <div class = "content">
                    <span class = "albumLink">
                        <img class = "albumArtwork" src = "img/spiderverseCover.jpg">
                    </span>

                    <div class = "trackInfo">
                        <span class = "trackName">
                            <span>Mona Lisa</span>
                        </span>

                        <span class = "artistName">
                            <span>Dominic Fike</span>
                        </span>
                    </div>
                </div>

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
                <div class = "volumeBar">
                    <button class = "btn volume-high" title = "Volume button">
                    <ion-icon class = "volume-high" name="volume-high-outline"></ion-icon>
                    </button>

                    <button class = "btn volume-medium" title = "Medium button" style = "display: none">
                    <ion-icon class = "volume-medium" name="volume-medium-outline"></ion-icon>
                    </button>

                    <button class = "btn volume-mute" title = "Mute button" style = "display: none">
                    <ion-icon class = "volume-mute" name="volume-mute-outline"></ion-icon>
                    </button>

                    <div class = "progressBar">
                            <div class = "progressBarBg">
                                <div class = "progress">

                                </div>
                            </div>
                        </div>
                </div>

            </div>



        </div>

    </div>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>