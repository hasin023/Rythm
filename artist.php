<?php

include("includes/includedFiles.php");

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>

<div class = "entityInfo borderBottom">
    <div class = "centerSection">

        <div class = "artistInfo">

            <h1 class = "artistName"><?php echo $artist->getName(); ?></h1>

            <div class = "headerButtons">
                <button class = "button" onclick = "playFirstSong()">PLAY</button>
            </div>

        </div>

    </div>
</div>



<div class = "trackListContainer borderBottom">
    <h1  class="sectionHeading">Songs</h1>
    
    <ul class = "trackList">

    <?php

    $songIdArray = $artist->getSongIds();

    $i = 1;
    foreach ($songIdArray as $songId) {
        if ($i > 5) {
            break;
        }

        $albumSong = new Song($con, $songId);

        $albumArtist = $albumSong->getArtist();

        echo "<li class = 'trackListRow'>
                    <div class = 'trackCount'>
                        <ion-icon class = 'play' name='play' onclick = 'setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'></ion-icon>
                        <span class = 'trackNumber'>$i</span>
                    </div>


                    <div class = 'trackInfo'>
                        <span class = 'trackName'>" . $albumSong->getTitle() . "</span>
                        <span class = 'artistName'>" . $albumArtist->getName() . "</span>
                    </div>

                    <div class = 'trackDuration'>
                    <span class = 'duration'>" . $albumSong->getDuration() . "</span>
                    </div>

                    <div class = 'trackOptions'>
                        <ion-icon class = 'optionsButton' name='ellipsis-horizontal'></ion-icon>
                    </div>

                </li>";

        $i = $i + 1;

    }

    ?>

    <script>
        let tempSongIds = '<?php echo json_encode($songIdArray); ?>';
        tempPlaylist = JSON.parse(tempSongIds);
        
    </script>

    </ul>
</div>


<div class = "gridViewContainer">
<h1  class="sectionHeading">Albums</h1>

    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist = '$artistId'");

    while ($row = mysqli_fetch_array($albumQuery)) {

        echo "<span class = 'cardLink' role = 'link' tabindex = '0' onclick = 'openPage(\"album.php?id=" . $row['id'] . "\")'> 
                    <div class='card'>" .
            "<div class='gridViewItem'>
                            <img src='" . $row['artworkPath'] . "'>

                            <div class='gridViewInfo'>"
            . $row['title'] .
            "</div>
                        </div>
                    </div>
                </span>";
    }

    ?>

</div>