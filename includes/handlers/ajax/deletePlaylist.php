<?php

include("../../config.php");

if (isset($_POST['id'])) {
    $playlistId = $_POST['id'];

    $playlistQuery = mysqli_query($con, "DELETE FROM playlists WHERE id = '$playlistId'");
    $songsQuery = mysqli_query($con, "DELETE FROM playlistSongs WHERE playlistId = '$playlistId'");
} else {
    echo "PlaylistId was not passed into deletePlaylist.php";
}


?>