<?php
    include("includes/config.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");

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

<div id = "mainContainer">

    <div id = "topContainer">

        <?php include("includes/html/navBarContainer.php"); ?> 

        <div id = "mainViewContainer">
            <div id = "mainContent">
