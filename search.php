<?php

include("includes/includedFiles.php");

if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

?>


<div class="searchContainer">
    <h3>Search for an artist, album or song</h3>
    <input type="text" class="searchInput" spellcheck="false" value="<?php echo $term; ?>" placeholder="What are you looking for?">
</div>

<script>

    $(function() {
        $(".searchInput").focus();
        
        let timer;


        $(".searchInput").keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                let val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            }, 1000);
        })


    })


</script>