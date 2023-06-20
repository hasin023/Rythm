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



<?php include("includes/html/footer.php"); ?>