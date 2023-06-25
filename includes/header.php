<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

//session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>userLoggedIn = '$userLoggedIn';</script>";
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
    <link rel="stylesheet" href = "css/index.css">
    <link rel="stylesheet" href = "css/nowPlaying.css">
    <link rel="stylesheet" href = "css/album.css">
    <link rel="stylesheet" href = "css/artist.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src = "js/script.js"></script>

    <title>Rythm | Music you love</title>
</head>
<body>

<div id = "mainContainer">

    <div id = "topContainer">

        <?php include("includes/navBarContainer.php"); ?> 

        <div id = "mainViewContainer">
            <div id = "mainContent">
