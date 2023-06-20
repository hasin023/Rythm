<?php include("includes/html/header.php"); 

    if(isset($_GET['id'])) {
        $albumId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $album = new Album($con, $albumId);

    $artist = $album->getArtist();

?>

<div class = "entityInfo">

    <div class = "leftSection" style = "float: left; width: 30%; ">
        <img class = "albumImg" src = "<?php echo $album->getArtworkPath(); ?>" style = "width: 20rem; margin-top: 1rem;">
    </div>

    <div class = "rightSection" style = "float: right; width: 70%; margin-top: 1rem;">
        <h2 style = "font-size: 1.5rem"><?php echo $album->getTitle(); ?></h2>
        <p style = "color: #dfdfdf">By <?php echo $artist->getName(); ?></p>
        <p style = "color: #dfdfdf"><?php echo $album->getNumberOfSongs(); ?> songs</p>

    </div>

</div>


<div class = "trackListContainer">
    <ul class = "trackList">

    <?php 

        $songIdArray = $album->getSongIds();

        $i = 1;
        foreach($songIdArray as $songId){
            $albumSong = new Song($con, $songId);
            
            $albumArtist = $albumSong->getArtist();

            echo "<li class = 'trackListRow'>
                    <div class = 'trackCount'>
                        <ion-icon class = 'play' name='play'></ion-icon>
                        <span class = 'trackNumber'>$i</span>
                    </div>


                    <div class = 'trackInfo'>
                        <span class = 'trackName'>" . $albumSong->getTitle() .  "</span>
                        <span class = 'artistName'>" . $albumArtist->getName() .  "</span>
                    </div>

                    <div class = 'trackOptions'>
                        <ion-icon class = 'optionsButton' name='ellipsis-horizontal'></ion-icon>
                    </div>

                    <div class = 'trackDuration'>
                    <span class = 'duration'>" . $albumSong->getDuration() .  "</span>
                    </div>


                </li>";

            $i = $i + 1;

        }


    ?>

    </ul>
</div>



<?php include("includes/html/footer.php"); ?>