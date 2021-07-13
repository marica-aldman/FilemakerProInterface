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
if(isset($_POST["sourceOpen"])&&($_POST["sourceOpen"]&&$_POST["sourceOpen"] == "True")) {
    $sourceOpen = "True";
} else {
    $sourceOpen = "False";
}
if(isset($_POST["sourceLink"])&&($_POST["sourceOpen"]&&$_POST["sourceLink"] != "")) {
    $sourceLink = $_POST["sourceLink"];
} else {
    $sourceLink = " ";
}
?>


<script>
var a = "<?php echo $searchSent; ?>";
var b = "<?php echo $source; ?>";
var c = "<?php echo $search; ?>";
var d = "<?php echo $sourceOpen; ?>"
var e = "<?php echo $sourceLink; ?>"
var f = "<?php echo $searchID; ?>"

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
let sourceOpenSwe = document.createElement("INPUT");
sourceOpenSwe.setAttribute("type", "hidden");
sourceOpenSwe.setAttribute("name", "sourceOpen");
sourceOpenSwe.setAttribute("id", "sourceOpenSwe");
sourceOpenSwe.setAttribute("value", d );
let sourceLinkSwe = document.createElement("INPUT");
sourceLinkSwe.setAttribute("type", "hidden");
sourceLinkSwe.setAttribute("name", "sourceLink");
sourceLinkSwe.setAttribute("id", "sourceLinkSwe");
sourceLinkSwe.setAttribute("value", e );
let searchIDSwe = document.createElement("INPUT");
searchIDSwe.setAttribute("type", "hidden");
searchIDSwe.setAttribute("name", "searchID");
searchIDSwe.setAttribute("id", "searchIDSwe");
searchIDSwe.setAttribute("value", f );

x.appendChild(searchFormInputSwe);
x.appendChild(databaseInputSwe);
x.appendChild(searchInputSwe);
x.appendChild(sourceOpenSwe);
x.appendChild(sourceLinkSwe);
x.appendChild(searchIDSwe);

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
let sourceOpenEng = document.createElement("INPUT");
sourceOpenEng.setAttribute("type", "hidden");
sourceOpenEng.setAttribute("name", "sourceOpen");
sourceOpenEng.setAttribute("id", "sourceOpenEng");
sourceOpenEng.setAttribute("value", d );
let sourceLinkEng = document.createElement("INPUT");
sourceLinkEng.setAttribute("type", "hidden");
sourceLinkEng.setAttribute("name", "sourceLink");
sourceLinkEng.setAttribute("id", "sourceLinkEng");
sourceLinkEng.setAttribute("value", e );
let searchIDEng = document.createElement("INPUT");
searchIDEng.setAttribute("type", "hidden");
searchIDEng.setAttribute("name", "searchID");
searchIDEng.setAttribute("id", "searchIDEng");
searchIDEng.setAttribute("value", f );

y.appendChild(searchFormInputEng);
y.appendChild(databaseInputEng);
y.appendChild(searchInputEng);
y.appendChild(sourceOpenEng);
y.appendChild(sourceLinkEng);
y.appendChild(searchIDEng);

</script>

<?php

// back button

    // place these values in the language form

?>

<form action="search.php" method="post">
<input type="hidden" name="searchSent" id="searchSent" value="True">
<input type="hidden" name="searchterm" value=<?php echo $search; ?>>
<input type="hidden" name="databases" value=<?php echo $source; ?>>
<input type="hidden" name="sourceOpen" value=<?php echo "False"; ?>>
<input type="hidden" name="sourceLink" value=<?php echo " "; ?>>

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
    $searchResult1 = array("id"=>"1","Edefinition"=>"The person who gave birth to a child.","Sdefinition"=>"Person som fött barn.", "swe"=>"Mor", "eng"=>"Mother", "source"=>"LNC305.png");
    $searchResult2 = array("id"=>"2","Edefinition"=>"The person who gave impregnated the mother of a child with his own sperm.","Sdefinition"=>"Personen som gjort en annan gravid med sin egen sperma.", "swe"=>"Far", "eng"=>"Father", "source"=>"LNC305.png");
    $searchResult3 = array("id"=>"3","Edefinition"=>"A female child of the same parents.","Sdefinition"=>"Ett kvinnligt barn till samma föräldrar.", "swe"=>"Syster", "eng"=>"Sister", "source"=>"LNC305.png");
    $searchResult4 = array("id"=>"4","Edefinition"=>"A male child of the same parents.","Sdefinition"=>"Ett manligt barn till samma föräldrar.", "swe"=>"Bror", "eng"=>"Brother", "source"=>"LNC305.png");

    $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
    $count = count($searchResult);
    for($x = 0; $x < $count; $x++) {
        $result = $searchResult[$x];
        if($searchID == $result["id"]) {
            $x = $count;
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
                <td><button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
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
        $searchResult1 = array("id"=>"1","name"=>"Per Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
        $searchResult2 = array("id"=>"2","name"=>"Gustav Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
        $searchResult3 = array("id"=>"3","name"=>"Hanna Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
        $searchResult4 = array("id"=>"4","name"=>"Per Gustavsson", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
        
        $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
        $count = count($searchResult);
        for($x = 0; $x < $count; $x++) {
            $result = $searchResult[$x];
            if($searchID == $result["id"]) {
                $x = $count;
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
            <td><button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
            </td>
        </tr>
    </table>

<?php 
}

?>

<div class="source <?php if($sourceOpen == "False"){ echo "sourceHide"; } ?>" id="source">
    <div>
        <?php echo $textDatabase; ?>: <?php echo $source; ?>
    </div>
    <div>
        <img src="<?php if($sourceOpen == "True"){ echo $sourceLink; } ?>" id="sourceImg">
    </div>
    <div>
        <button type="submit" name="close" id="closeSource" onClick="closeSource()"><?php echo $closeButton; ?></button>
    </div>
</div>

</main>

<script>

function openSource(source){
    var x = document.getElementById("source");
    x.classList.remove("sourceHide");
    var y = document.getElementById("sourceImg");
    var sourceLink = "source/img/" + source;
    y.src = sourceLink;
    var i = document.getElementById("sourceOpenSwe");
    i.setAttribute("value", "True" );
    var j = document.getElementById("sourceOpenEng");
    j.setAttribute("value", "True" );
    var k = document.getElementById("sourceLinkSwe");
    k.setAttribute("value", sourceLink );
    var l = document.getElementById("sourceLinkEng");
    l.setAttribute("value", sourceLink );
}

function closeSource(source){
    var x = document.getElementById("source");
    x.classList.add("sourceHide");
    var a = document.getElementById("sourceOpenSwe");
    a.setAttribute("value", "False" );
    var b = document.getElementById("sourceOpenEng");
    b.setAttribute("value", "False" );
}

</script>