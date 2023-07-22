<?php
include("includes/includedFiles.php");
?>

<div class = "playlistContainer">
    <div class = "gridViewContainer">
        <h2 class = "sectionHeading">PLAYLISTS</h2>
        <div class = "buttonItems">
            <button class = "button" onclick = "createPlaylist()">NEW PLAYLIST</button>
        </div>

        <?php
        $username = $userLoggedIn->getUsername();

        $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner = '$username'");

        if (mysqli_num_rows($playlistsQuery) == 0) {
            echo "<span class = 'noResults'>You don't have any playlists yet.</span>";
        }

        while ($row = mysqli_fetch_array($playlistsQuery)) {

            $playlist = new Playlist($con, $row);

            echo "<span class = 'cardLink' role = 'link' tabindex = '0' onclick = 'openPage(\"playlist.php?id=" . $playlist->getId() . "\")'> 
                    <div class='card'>" .
                "<div class='gridViewItem'>
                            <img src='img/playlist.jpg'>

                            <div class='gridViewInfo'>"
                . $playlist->getName() .
                "</div>
                        </div>
                    </div>
                </span>";
        }
        ?>
    </div>
</div>