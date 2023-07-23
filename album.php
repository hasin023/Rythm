<?php include("includes/includedFiles.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}

$album = new Album($con, $albumId);

$artist = $album->getArtist();

?>

<div class = "entityInfo">

    <div class = "leftSection">
        <img class = "albumImg" src = "<?php echo $album->getArtworkPath(); ?>">
    </div>

    <div class = "rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>

    </div>

</div>


<div class = "trackListContainer">
    <ul class = "trackList">

    <?php

    $songIdArray = $album->getSongIds();

    $i = 1;
    foreach ($songIdArray as $songId) {
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
                        <input type = 'hidden' class = 'songId' value = '" . $albumSong->getId() . "'>
                        <ion-icon class = 'optionsButton' name='ellipsis-horizontal' onclick='showOptionsMenu(this)'></ion-icon>
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

<nav class="optionsMenu">
    <input type = "hidden" class = "songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    <div class="item">Copy song Link</div>
</nav>

