<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>


$(document).ready(function() {
    let newPlaylist = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(newPlaylist[0], newPlaylist, false);
    updateVolumeProgressBar(audioElement.audio);


    $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e) {
        e.preventDefault();
    });


    $(".playbackBar .progressBar").mousedown(function() {
        mouseDown = true;
    });

    $(".playbackBar .progressBar").mousemove(function(e) {
        if(mouseDown == true) {
            timeFromOffset(e, this);
        }
    });

    $(".playbackBar .progressBar").mouseup(function(e) {
        timeFromOffset(e, this);
    });


    $(".volumeBar .progressBar").mousedown(function() {
        mouseDown = true;
    });

    $(".volumeBar .progressBar").mousemove(function(e) {
        if(mouseDown == true) {

            var percentage = e.offsetX / $(this).width();

            if(percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }
        }
    });

    $(".volumeBar .progressBar").mouseup(function(e) {
        var percentage = e.offsetX / $(this).width();

        if(percentage >= 0 && percentage <= 1) {
            audioElement.audio.volume = percentage;
        }
    });

    $(document).mouseup(function() {
        mouseDown = false;
    });




});



function timeFromOffset(mouse, progressBar) {
    var percentage = mouse.offsetX / $(progressBar).width() * 100;
    var seconds = audioElement.audio.duration * (percentage / 100);
    audioElement.setTime(seconds);
}


function prevSong() {
    if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
        audioElement.setTime(0);
    }
    else {
        currentIndex = currentIndex - 1;
        setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
    }
}


function nextSong() {

if(repeat == true) {
    audioElement.setTime(0);
    playSong();
    return;
}

if(currentIndex == currentPlaylist.length - 1) {
    currentIndex = 0;
}
else {
    currentIndex++;
}

var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
setTrack(trackToPlay, currentPlaylist, true);
}


function setRepeat() {
    repeat = !repeat;
        var iconColor = repeat ? "#fcc419" : "#c1c1c1";
        $(".controlButton.repeat ion-icon").css("color", iconColor);
}


function setMute() {
    audioElement.audio.muted = !audioElement.audio.muted;
        var iconColor = audioElement.audio.muted ? "volume-mute-outline" : "volume-high-outline";
        $(".controlButton.volume ion-icon").attr("name", iconColor);
}


function setShuffle() {
    shuffle = !shuffle;
        var iconColor = shuffle ? "#fcc419" : "#c1c1c1";
        $(".controlButton.shuffle ion-icon").css("color", iconColor);

    if(shuffle == true) {
        shuffleArray(shufflePlaylist);
        currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
    }
    else {
        currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
    }

}


function shuffleArray(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}


function setTrack(trackId, newPlaylist, play) {

    if(newPlaylist != currentPlaylist) {
        currentPlaylist = newPlaylist;
        shufflePlaylist = currentPlaylist.slice();
        shuffleArray(shufflePlaylist);
    }

    if(shuffle == true) {
        currentIndex = shufflePlaylist.indexOf(trackId);
    }
    else {
        currentIndex = currentPlaylist.indexOf(trackId);
    }
    pauseSong();

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

        //The JS file has no function to set the id to the currentlyPlaying, so it is done manually here.
        audioElement.setTrack(track.path);
        audioElement.currentlyPlaying = track;

        if(play == true) {
            playSong();
        }
        //The Autoplay
        //playSong();
    });

}


function playSong() {

    if(audioElement.audio.currentTime == 0) {
        $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
    }

    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
}

function pauseSong() {
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
}

</script>


<div id="nowPlayingBarContainer">

    <div id="nowPlayingBar">

        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="" class="albumArtwork">
                </span>

                <div class="trackInfo">

                    <span class="trackName">
                        <span></span>
                    </span>

                    <span class="artistName">
                        <span></span>
                    </span>

                </div>



            </div>
        </div>

        <div id="nowPlayingCenter">

            <div class="content playerControls">

                <div class="buttons">

                    <button class="controlButton shuffle" title="Shuffle" onclick="setShuffle()">
                        <ion-icon name="shuffle"></ion-icon>
                    </button>

                    <button class="controlButton previous" title="Previous" onclick="prevSong()">
                        <ion-icon name="play-skip-back-sharp"></ion-icon>
                    </button>

                    <button class="controlButton play" title="Play" onclick="playSong()">
                        <ion-icon class = "play" name="play-circle-sharp"></ion-icon>
                    </button>

                    <button class="controlButton pause" title="Pause" style="display: none;" onclick="pauseSong()">
                        <ion-icon class = "pause" name="pause-circle"></ion-icon>
                    </button>

                    <button class="controlButton next" title="Next" onclick="nextSong()">
                        <ion-icon name="play-skip-forward-sharp"></ion-icon>
                    </button>

                    <button class="controlButton repeat" title="Repeat" onclick="setRepeat()">
                        <ion-icon name="repeat"></ion-icon>
                    </button>

                </div>


                <div class="playbackBar">

                    <span class="progressTime current">0.00</span>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>

                    <span class="progressTime remaining">0.00</span>


                </div>


            </div>


        </div>

        <div id="nowPlayingRight">
            <div class="volumeBar">

                <button class="controlButton volume" title="Volume button" onclick="setMute()">
                    <ion-icon class = "volumeIcon" name="volume-high-outline"></ion-icon>
                </button>

                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>

            </div>
        </div>




    </div>

</div>


