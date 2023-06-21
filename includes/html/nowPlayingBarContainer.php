<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>

currentPlaylist = <?php echo $jsonArray; ?>

$(document).ready(function() {
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);

    
    $(".playBackBar .progressBar").mousedown(function() {
        mouseDown = true;
    });

    $(".playBackBar .progressBar").mousemove(function(e) {
        if (mouseDown) {
            timeFromOffset(e, this);
        }
    });


    $(".playBackBar .progressBar").mouseup(function(e) {
        timeFromOffset(e, this);
    });


    $(document).mouseup(function() {
        mouseDown = false;
    });



    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }







});

function setTrack(trackId, newPlaylist, play) {

    $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {

        var track = JSON.parse(data);

        $(".trackName span").text(track.title);

        $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
            var artist = JSON.parse(data);

            $(".artistName span").text(artist.name);
        });

        $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
            var album = JSON.parse(data);

            $(".albumLink img").attr("src", album.artworkPath);
        });

        
        audioElement.currentlyPlaying = track;
        audioElement.setTrack(track.path);
        playSong();

    });

}   

    function playSong() {
        
        console.log(audioElement.currentlyPlaying);
        console.log(audioElement);
        
        
        if(audioElement.audio.currentTime === 0) {
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
        }

        $(".btn.play").hide();
        $(".btn.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".btn.play").show();
        $(".btn.pause").hide();
        audioElement.pause();
    }


</script>





<div id = "nowPlayingBarContainer">

    <div id = "nowPlayingBar">

        <div id = "nowPlayingLeft">
            <div class = "content">
                <span class = "albumLink">
                    <img class = "albumArtwork" src = "">
                </span>

                <div class = "trackInfo">
                    <span class = "trackName">
                        <span></span>
                    </span>

                    <span class = "artistName">
                        <span></span>
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

                    <button class = "btn play" title = "Play button" onclick = "playSong()">
                    <ion-icon class = "play" name="play-circle-sharp"></ion-icon>
                    </button>

                    <button class = "btn pause" title = "Pause button" style = "display: none" onclick = "pauseSong()">
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