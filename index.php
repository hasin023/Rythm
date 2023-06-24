<?php
include("includes/includedFiles.php");
?>


<h1  class="pageHeadingBig">You Might Also Like</h1>

<div class = "gridViewContainer">

    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

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