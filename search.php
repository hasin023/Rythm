<?php

include("includes/includedFiles.php");

if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

?>


<div class="searchContainer">
    <h3>Search for a Song, Artist or Album</h3>
    <input type="text" class="searchInput" spellcheck="false" value="<?php echo $term; ?>" placeholder="What are you looking for?">
</div>

<script>

    $(function() {
        //$(".searchInput").focus();

        timer = null;

        $(".searchInput").keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                let val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            }, 1000);
        })


    })


</script>

<?php if ($term == "")

    exit();

?>


<div class = "searchTrackListContainer searchBorderBottom">
    <h1  class="sectionHeading">Songs</h1>

    <ul class = "trackList">

    <?php

    $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");

    if (mysqli_num_rows($songsQuery) == 0) {
        echo "<span class = 'noResults'>No songs found matching \"" . $term . "\"</span>";
    }

    $songIdArray = array();

    $i = 1;
    while ($row = mysqli_fetch_array($songsQuery)) {
        if ($i > 15) {
            break;
        }

        array_push($songIdArray, $row['id']);

        $albumSong = new Song($con, $row['id']);

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


<div class = "artistsContainer searchBorderBottom">
    <h1  class="sectionHeading">Artists</h1>

    <?php

    $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

    if (mysqli_num_rows($artistsQuery) == 0) {
        echo "<span class = 'noResults'>No artists found matching \"" . $term . "\"</span>";
    }

    while ($row = mysqli_fetch_array($artistsQuery)) {

        $artistFound = new Artist($con, $row['id']);

        echo "<div class = 'searchResultRow'>
                <div class = 'artistName'>
                    <span role = 'link' tabindex = '0' onclick = 'openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
                    "
            . $artistFound->getName() .
            "
                    </span>
                </div>
            </div>";

    }

    ?>

</div>


<div class = "gridViewContainer">
<h1  class="sectionHeading">Albums</h1>

    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

    if (mysqli_num_rows($albumQuery) == 0) {
        echo "<span class = 'noResults'>No albums found matching \"" . $term . "\"</span>";
    }

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