<main id="main">
<?php
// searchresult displayed

// different sources have different information display depending on source

$searchSent = "True";
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
    $searchID = $_POST["searchID"];
}

?>


<script>
var a = "<?php echo $searchSent; ?>";
var b = "<?php echo $source; ?>";
var c = "<?php echo $search; ?>";
console.log("console");
console.log(a);
console.log(b);
console.log(c);

// create hidden variables for the possible searches and append to the language forms so no information is lost when switching between languages
//swedish

let x = document.getElementById("languageNavigationSwe");
let searchFormInputSwe = document.createElement("INPUT");
searchFormInputSwe.setAttribute("type", "hidden");
searchFormInputSwe.setAttribute("name", "searchSent");
searchFormInputSwe.setAttribute("value", a );
let databaseInputSwe = document.createElement("INPUT");
databaseInputSwe.setAttribute("type", "hidden");
databaseInputSwe.setAttribute("name", "source");
databaseInputSwe.setAttribute("value", b );
let searchInputSwe = document.createElement("INPUT");
searchInputSwe.setAttribute("type", "hidden");
searchInputSwe.setAttribute("name", "search");
searchInputSwe.setAttribute("value", c );

x.appendChild(searchFormInputSwe);
x.appendChild(databaseInputSwe);
x.appendChild(searchInputSwe);

//english

let y = document.getElementById("languageNavigationEng");
let searchFormInputEng = document.createElement("INPUT");
searchFormInputEng.setAttribute("type", "hidden");
searchFormInputEng.setAttribute("name", "searchSent");
searchFormInputEng.setAttribute("value", a );
let databaseInputEng = document.createElement("INPUT");
databaseInputEng.setAttribute("type", "hidden");
databaseInputEng.setAttribute("name", "source");
databaseInputEng.setAttribute("value", b );
let searchInputEng = document.createElement("INPUT");
searchInputEng.setAttribute("type", "hidden");
searchInputEng.setAttribute("name", "search");
searchInputEng.setAttribute("value", c );
y.appendChild(searchFormInputEng);
y.appendChild(databaseInputEng);
y.appendChild(searchInputEng);

</script>

<?php


// back button

?>

<form action="search.php" method="post">
<input type="hidden" name="searchSent" id="searchSent" value="True">
<input type="hidden" name="searchterm" value=<?php echo $search; ?>>
<input type="hidden" name="databases" value=<?php echo $source; ?>>

<button type="submit" name="return">Back</button>
</form>

<?php

// terminology

if ($source == "Terminologi") {
    $textSearchTerm = "Sökning";
    $textTranslationToEnglish = "Engelska";
    $textTranslationToSwedish = "Svenska";
    $textDefinition = "Definition";

    switch ($language) {
        case "swe":
            $textSearchTerm = "Sökning";
            $textTranslationToEnglish = "Engelska";
            $textTranslationToSwedish = "Svenska";
            $textDefinition = "Definition";
            $textSource = "Källa";
            break;
            
        case "eng":
            $textSearchTerm = "Search";
            $textTranslationToEnglish = "English";
            $textTranslationToSwedish = "Swedish";
            $textDefinition = "Definition";
            $textSource = "Source";
            break;
            
        default:
            $textSearchTerm = "Sökning";
            $textTranslationToEnglish = "Engelska";
            $textTranslationToSwedish = "Svenska";
            $textDefinition = "Definition";
            $textSource = "Källa";
            break;
        
    }
    // look up the searchID in the database then display result $searchResult
    // placing some temp values for now
    // add different translations of the definition and display the right one
    $searchResult1 = array("id"=>"1","Edefinition"=>"The person who gave birth to a child.","Sdefinition"=>"Person som fött barn.", "swe"=>"Mor", "eng"=>"Mother", "source"=>"source.png");
    $searchResult2 = array("id"=>"2","Edefinition"=>"The person who gave impregnated the mother of a child with his own sperm.","Sdefinition"=>"Personen som gjort en annan gravid med sin egen sperma.", "swe"=>"Far", "eng"=>"Father", "source"=>"source.png");
    $searchResult3 = array("id"=>"3","Edefinition"=>"A female child of the same parents.","Sdefinition"=>"Ett kvinnligt barn till samma föräldrar.", "swe"=>"Syster", "eng"=>"Sister", "source"=>"source.png");
    $searchResult4 = array("id"=>"4","Edefinition"=>"A male child of the same parents.","Sdefinition"=>"Ett manligt barn till samma föräldrar.", "swe"=>"Bror", "eng"=>"Brother", "source"=>"source.png");

    $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
    $count = count($searchResult);
    for($x = 0; $x < $count; $x++) {
        $result = $searchResult[$x];
        if(settype($searchID, "integer") == settype($result["id"], "integer")) {
            $x == $count;
        } else {
            $result = array("id"=>"x","Edefinition"=>".","Sdefinition"=>".", "swe"=>"x", "eng"=>"x", "source"=>"x.png");
        }
    }

    ?>

        <table>
            <tr>
                <td><?php echo $textTranslationToSwedish ?>:
                </td>
                <td><?php echo $result["swe"]; ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textTranslationToEnglish ?>:
                </td>
                <td><?php echo $result["eng"]; ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textDefinition ?>:
                </td>
                <td><?php if($language == "swe") { echo $result["Sdefinition"]; } else if ($language == "eng") { echo $result["Edefinition"]; }?>
                </td>
            </tr>
            <tr>
                <td><?php echo $textSource ?>:
                </td>
                <td><button id="sourceButton"><img src="<?php echo $result["source"]; ?>"></button>
                </td>
            </tr>
        </table>

    <?php 

} else if ($source == "Personer"){
        $textName = "";
        $textBirthdate = "";
        $textDeathdate = "";
        $textSource = "";

        switch ($language) {
            case "swe":
                $textName = "Namn";
                $textBirthdate = "Född";
                $textDeathdate = "Död";
                $textSource = "Källa";
                break;
                
            case "eng":
                $textName = "Name";
                $textBirthdate = "Born";
                $textDeathdate = "Died";
                $textSource = "Source";
                break;
                
            default:
                $textName = "Namn";
                $textBirthdate = "Född";
                $textDeathdate = "Död";
                $textSource = "Källa";
                break;
            
        }
        // look up the searchID in the database then display result $searchResult
        // placing some temp values for now
        // add different translations of the definition and display the right one
        $searchResult1 = array("id"=>"1","name"=>"Per Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"source.png");
        $searchResult2 = array("id"=>"2","name"=>"Gustav Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"source.png");
        $searchResult3 = array("id"=>"3","name"=>"Hanna Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"source.png");
        $searchResult4 = array("id"=>"4","name"=>"Per Gustavsson", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"source.png");
        
        $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
        $count = count($searchResult);
        for($x = 0; $x < $count; $x++) {
            $result = $searchResult[$x];
            if(settype($searchID, "integer") == settype($result["id"], "integer")) {
                $x == $count;
            } else {
                $result = array("id"=>"x","name"=>"x", "birth"=>"x", "death"=>"x", "source"=>"x.png");
            }
        }
    ?>

    <table>
        <tr>
            <td><?php echo $textName; ?>:
            </td>
            <td><?php echo $result["name"]; ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $textBirthdate; ?>:
            </td>
            <td><?php echo $result["birth"]; ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $textDeathdate; ?>:
            </td>
            <td><?php echo $result["death"]; ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $textSource ?>:
            </td>
            <td><button id="sourceButton"><img src="<?php echo $result["source"]; ?>"></button>
            </td>
        </tr>
    </table>

<?php 
}

?>

</main>