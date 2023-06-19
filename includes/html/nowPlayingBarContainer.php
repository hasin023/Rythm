<div id = "nowPlayingBarContainer">

    <div id = "nowPlayingBar">

        <div id = "nowPlayingLeft">
            <div class = "content">
                <span class = "albumLink">
                    <img class = "albumArtwork" src = "img/monaLisaCover.jpg">
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