<main id="main">
<?php
// searchresult displayed

// different sources have different information display depending on source

$searchForm = "";
$source = "";
$searchID = "";
$search = "";
if(isset($_POST["source"])) {
    if($_POST["source"] == "Terminologi") {
        $source = "Terminologi";
    } else if ($_POST["source"] == "Personer") {
        $source = "Personer";
    }
}
if(isset($_POST["search"])) {
    //make sure this is safe
    $search = $_POST["search"];
}
if(isset($_POST["searchID"])) {
    //make sure this is safe
}
// back button

?>

<form action="search.php" method="post">
<input type="hidden" name="searchSent" id="searchSent" value="True">
<input type="hidden" name="searchterm" value=<?php echo $search; ?>>

<button type="submit" name="return">Back</button>
</form>

<?php

// terminology

if ($source == "Terminologi") {
    $textSearchTerm = "Sökning";
    $textTranslationToEnglish = "Engelska";
    $textTranslationToSwedish = "Svenska";
    $textDefinistion = "Definition";

    switch ($language) {
        case "swe":
            $textSearchTerm = "Sökning";
            $textTranslationToEnglish = "Engelska";
            $textTranslationToSwedish = "Svenska";
            $textDefinistion = "Definition";
            break;
            
        case "eng":
            $textSearchTerm = "Search";
            $textTranslationToEnglish = "English";
            $textTranslationToSwedish = "Swedish";
            $textDefinistion = "Definition";
            break;
            
        default:
            $textSearchTerm = "Sökning";
            $textTranslationToEnglish = "Engelska";
            $textTranslationToSwedish = "Svenska";
            $textDefinistion = "Definition";
            break;
        
    }
    // look up the searchID in the database then display result $searchResult
    // placing some temp values for now
    $search = "Mother";
    $searchResult = array("definition"=>"The female who gave birth to the child.", "swe"=>"Mor", "eng"=>"Mother");
    ?>

        <table>
            <tr>
                <td><?php echo $textSearchTerm ?>:
                </td>
                <td><?php echo $search ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textDefinistion ?>:
                </td>
                <td><?php echo $searchResult["definition"] ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textTranslationToSwedish ?>:
                </td>
                <td><?php echo $searchResult["swe"] ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textTranslationToEnglish ?>:
                </td>
                <td><?php echo $searchResult["eng"] ?>
                </td>
            </tr>
        </table>

    <?php 

} else if ($source == "Personer"){

    ?>

    <table>
        <tr>
            <td>Meh:
            </td>
            <td>display purposes
            </td>
        </tr>
    </table>

<?php 
}

?>




</main>