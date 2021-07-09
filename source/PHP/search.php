<main id="main">
<?php
// main content for search, handle any submit first
$search = "";
if ((isset($_POST["searchSent"]) && $_POST["searchSent"] == "True") && !isset($_POST["reset"])) {
    // check where we are looking up things
    if(isset($_POST["databases"])) {
        $database = "";
        if($_POST["databases"] == "Terminologi") {
            $database = "Terminologi";
        } else if ($_POST["databases"] == "Personer") {
            $database = "Personer";
        } else if ($_POST["databases"] == "Both") {
            $database = array("Terminologi"=>"yes", "Personer"=>"yes");
        } else if ($_POST["databases"] == "ATerminologi") {
            $database = array("Terminologi"=>"yes", "Personer"=>"no");
        } else if ($_POST["databases"] == "APersoner") {
            $database = array("Terminologi"=>"no", "Personer"=>"yes");
        }
    } else {
        $database = array("Terminologi"=>"no", "Personer"=>"no");
        if(isset($_POST["Terminologi"])) {
            $database["Terminologi"] = "yes";
        }
        if(isset($_POST["Personer"])){
            $database["Personer"] = "yes";
        }
        
    }
    // make sure the search is safe
    $search = $_POST["searchterm"];

    $searchSent = "True";
    // place these values in the language form

    $sourceOpen = $_POST["sourceOpen"];
    $sourceLink = $_POST["sourceLink"];

} else {
    $database = " ";
    $search = " ";
    $searchSent = "False";
    $sourceOpen = "False";
    $sourceLink = "";
}
?>

<script>
var a = "<?php echo $searchSent; ?>";
var b = "<?php if(gettype($database) == "array"){ 
    if ($database["Terminologi"] == "yes" && $database["Personer"] == "yes") {
        echo "Both";
    } else if ($database["Terminologi"] == "yes") {
        echo "ATerminologi";
    } else if ($database["Personer"] == "yes") {
        echo "APersoner";
    } else {
        echo " ";
    }
} else {
    if ($database == "Terminologi") {
        echo "Terminologi";
    } else if ($database == "Personer") {
        echo "Personer";
    }
}?>";
var c = "<?php echo $search; ?>";
var d = "<?php echo $sourceOpen; ?>"
var e = "<?php echo $sourceLink; ?>"

// create hidden variables for the possible searches and append to the language forms so no information is lost when switching between languages
//swedish

let x = document.getElementById("languageNavigationSwe");
let searchFormInputSwe = document.createElement("INPUT");
searchFormInputSwe.setAttribute("type", "hidden");
searchFormInputSwe.setAttribute("name", "searchSent");
searchFormInputSwe.setAttribute("value", a );
let databaseInputSwe = document.createElement("INPUT");
databaseInputSwe.setAttribute("type", "hidden");
databaseInputSwe.setAttribute("name", "databases");
databaseInputSwe.setAttribute("value", b );
let searchInputSwe = document.createElement("INPUT");
searchInputSwe.setAttribute("type", "hidden");
searchInputSwe.setAttribute("name", "searchterm");
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

x.appendChild(searchFormInputSwe);
x.appendChild(databaseInputSwe);
x.appendChild(searchInputSwe);
x.appendChild(sourceOpenSwe);
x.appendChild(sourceLinkSwe);

//english

let y = document.getElementById("languageNavigationEng");
let searchFormInputEng = document.createElement("INPUT");
searchFormInputEng.setAttribute("type", "hidden");
searchFormInputEng.setAttribute("name", "searchSent");
searchFormInputEng.setAttribute("value", a );
let databaseInputEng = document.createElement("INPUT");
databaseInputEng.setAttribute("type", "hidden");
databaseInputEng.setAttribute("name", "databases");
databaseInputEng.setAttribute("value", b );
let searchInputEng = document.createElement("INPUT");
searchInputEng.setAttribute("type", "hidden");
searchInputEng.setAttribute("name", "searchterm");
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
y.appendChild(searchFormInputEng);
y.appendChild(databaseInputEng);
y.appendChild(searchInputEng);
y.appendChild(sourceOpenEng);
y.appendChild(sourceLinkEng);

</script>

<?php

// list search form for simple or advanced selected by tabs

?>

    <section>
        <nav class="searchTypeSelection">
            <li class="<?php if ($formType == "simple") { echo "searchTypeSimpleSelected"; } else { echo "searchTypeSimpleUnselected"; } ?>">
                <button name="simple" id="simpleSwitch" value="simple" onclick="formSwitchSimple()"><?php echo $searchTypeSimple; ?></button>
            </li>
            <li class="<?php if ($formType == "advanced") { echo "searchTypeAdvancedSelected"; } else { echo "searchTypeAdvancedUnselected"; } ?>">
                <button type="button" name="advanced" id="advancedSwitch" value="advanced" onclick="formSwitchAdvanced()"><?php echo $searchTypeAdvanced; ?></button>
            </li>
        </nav>
<?php
//simple
?>
        <form action="search.php" method="post" id="simpleForm" class="<?php if ($formType == "simple") { echo "searchSimpleDisplay"; } else { echo "searchSimpleHide"; } ?>">
            <input type="hidden" name="searchSent" id="searchSent" value="True">
            <input type="hidden" name="sourceOpen" value="False">
            <input type="hidden" name="sourceLink" value=" ">
            <table>
                <tbody>
                    <tr>
                        <td> <label for="databases"><?php echo $searchChoiceDatabases; ?></label>
                        </td>
                        <td> 
                            <select name="databases" id="databases">
                                <option value="Terminologi" <?php if(isset($_POST["databases"])){ if($database == "Terminologi") { echo "selected";}}else if (gettype($database)=="array" && $database["Terminologi"] == "yes" && $database["Personer"] == "no") {echo "selected";}?>>
                                    <?php echo $terminologyDatabase; ?>
                                </option>
                                <option value="Personer" <?php if(isset($_POST["databases"])){ if($database == "Personer" || (gettype($database)=="array" && $database["Personer"] == "yes" && $database["Terminologi"] == "no")) { echo "selected";}}else if (gettype($database)=="array" && $database["Terminologi"] == "no" && $database["Personer"] == "yes") {echo "selected";}?>>
                                    <?php echo $peopleDatabase; ?>
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="searchTerm"><?php echo $searchChoiceSearchWord; ?></label>
                        </td>
                        <td> 
                            <input type="text" name="searchterm" id="searchterm" value=<?php if(isset($_POST["searchSent"])){ echo $search;}?>>
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp;
                        </td>
                        <td> 
                            <button type="submit" name="submit">
                                <?php echo $searchChoiceSearchButton; ?>
                            </button>
                            <button type="submit" name="reset">
                                <?php echo $searchChoiceResetButton; ?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

<?php
//advanced
?>

        <form action="search.php" method="post" id="advancedForm" class="<?php if ($formType == "advanced") { echo "searchAdvancedDisplay"; } else { echo "searchAdvancedHide"; } ?>">
            <input type="hidden" name="searchSent" value="True">
            <input type="hidden" name="sourceOpen" value="False">
            <input type="hidden" name="sourceLink" value=" ">
            <table>
                <tbody>
                    <tr>
                        <td> <?php echo $searchChoiceDatabases; ?>
                        </td>
                        <td> 
                            <?php echo $terminologyDatabase; ?><input type="checkbox" name="Terminologi" id="database1" value="Terminologi" <?php if(gettype($database)=="array" && $database["Terminologi"] == "yes"){ echo "checked";}else if($database=="Terminologi"){ echo "checked";}?>>
                            <?php echo $peopleDatabase; ?><input type="checkbox" name="Personer" id="database2" value="Personer" <?php if(gettype($database)=="array" && $database["Personer"] == "yes"){ echo "checked";}else if($database=="Personer"){ echo "checked";}?>>
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="searchTerm"><?php echo $searchChoiceSearchWord; ?></label>
                        </td>
                        <td> 
                            <input type="text" name="searchterm" id="searchterm" value=<?php if(isset($_POST["searchSent"])){ echo $search;}?>>
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp;
                        </td>
                        <td> 
                            <button type="submit" id="submit">
                                <?php echo $searchChoiceSearchButton; ?>
                            </button>
                            <button type="submit" id="submit">
                                <?php echo $searchChoiceResetButton; ?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </section>
<?php

// search result menu

?>

    <section>
        <nav class="searchSortType">
            <li>
                <button name="list" id="sortList" onclick="switchCardList()"><i class="fas fa-list"></i></button>
            </li>
            <li>
                <button name="cards" id="sortCards" onclick="switchCardList()"><i class="fas fa-th"></i></button>
            </li>
        </nav>
    </section>

    <section class="<?php if ($searchDisplay == "list") { echo "searchSectionList"; } else { echo "searchSectionCard"; } ?>" id="searchSection">
<?php
// search result
    if($searchSent == "True") {
        if($database == "Terminologi") { 
            // text per language
            $textDatabase = "";
            $textMainDataSet = "";
            $textTerm = "";
            $textTranslation = "";
            $textSource = "";
            switch ($language) {
                case "swe":
                    $textDatabase = "Databas";
                    $textMainDataSet = "Grunddata";
                    $textTerm = "Term";
                    $textTranslation = "Översättning";
                    $textSource = "Källa";
                    break;
                case "eng":
                    $textDatabase = "Database";
                    $textMainDataSet = "Main data set";
                    $textTerm = "Term";
                    $textTranslation = "Translation";
                    $textSource = "Source";
                    break;
                default:
                    $textDatabase = "Databas";
                    $textMainDataSet = "Grunddata";
                    $textTerm = "Term";
                    $textTranslation = "Översättning";
                    $textSource = "Källa";
                    break;
            }
                
            //test data
            $searchResult1 = array("id"=>"1","Edefinition"=>"The person who gave birth to a child.","Sdefinition"=>"Person som fött barn.", "swe"=>"Mor", "eng"=>"Mother", "source"=>"LNC305.png");
            $searchResult2 = array("id"=>"2","Edefinition"=>"The person who gave impregnated the mother of a child with his own sperm.","Sdefinition"=>"Personen som gjort en annan gravid med sin egen sperma.", "swe"=>"Far", "eng"=>"Father", "source"=>"LNC305.png");
            $searchResult3 = array("id"=>"3","Edefinition"=>"A female child of the same parents.","Sdefinition"=>"Ett kvinnligt barn till samma föräldrar.", "swe"=>"Syster", "eng"=>"Sister", "source"=>"LNC305.png");
            $searchResult4 = array("id"=>"4","Edefinition"=>"A male child of the same parents.","Sdefinition"=>"Ett manligt barn till samma föräldrar.", "swe"=>"Bror", "eng"=>"Brother", "source"=>"LNC305.png");

            $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
            $count = count($searchResult);
            for($x = 0; $x < $count; $x++) {
                $result = $searchResult[$x];
?>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <div>    
                <div>
                    <?php echo $textDatabase; ?>: <?php echo $database; ?>
                </div>
                <div>
                    <div>
                        <?php echo $textMainDataSet; ?>:
                    </div>
                    <div>
                        <?php echo $textTerm; ?>: <?php echo $result[$language]; ?>
                    </div>
                    <div>
                        <?php echo $textTranslation; ?>: <?php if ($language == "swe") { echo $result["eng"]; } else if ($language == "eng") { echo $result["swe"]; } ?>
                    </div>
                </div>
                <div>
                    <?php echo $textSource; ?>: <button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
                </div>
            </div>
            <div class="result">
                <div>
                    <form action="searchresult.php" method="post">
                        <input type="hidden" name="searchform" value=<?php  echo $formType; ?>>
                        <input type="hidden" name="source" value=<?php  echo $database; ?>>
                        <input type="hidden" name="search" value=<?php  echo $search; ?>>
                        <input type="hidden" name="searchID" value=<?php  echo $result["id"]; ?>>
                        <button type="submit" name="searchSent"><?php echo $searchSeeButton; ?></button>
                    </form>
                </div>
            </div>
        </div>
                
<?php
            }
        } else if ($database == "Personer") { 
            // text per language
            $textMainDataSet = "";
            $textName = "";
            $textBirthdate = "";
            $textDeathdate = "";
            $textSource = "";
            switch ($language) {
                case "swe":
                    $textMainDataSet = "Grunddata";
                    $textName = "Namn";
                    $textBirthdate = "Född";
                    $textDeathdate = "Död";
                    $textSource = "Källa";
                    break;
                case "eng":
                    $textMainDataSet = "Main data set";
                    $textName = "Name";
                    $textBirthdate = "Born";
                    $textDeathdate = "Died";
                    $textSource = "Source";
                    break;
                default:
                    $textMainDataSet = "Grunddata";
                    $textName = "Namn";
                    $textBirthdate = "Född";
                    $textDeathdate = "Död";
                    $textSource = "Källa";
                    break;
            }
            
            //test data
            $searchResult1 = array("id"=>"1","name"=>"Per Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
            $searchResult2 = array("id"=>"2","name"=>"Gustav Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
            $searchResult3 = array("id"=>"3","name"=>"Hanna Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
            $searchResult4 = array("id"=>"4","name"=>"Per Gustavsson", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
            
            $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
            
            $count = count($searchResult);
            for($x = 0; $x < $count; $x++) {
                $result = $searchResult[$x];
?>
                        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
                            <div>    
                                <div>
                                    <?php echo $textDatabase; ?>: <?php echo $database; ?>
                                </div>
                                <div>
                                    <div>
                                        <?php echo $textMainDataSet; ?>:
                                    </div>
                                    <div>
                                        <?php echo $textName; ?>: <?php echo $result["name"]; ?>
                                    </div>
                                    <div>
                                        <?php echo $textBirthdate; ?>: <?php echo $result["birth"]; ?>
                                    </div>
                                    <div>
                                        <?php echo $textDeathdate; ?>: <?php echo $result["death"]; ?>
                                    </div>
                                </div>
                                <div>
                                    <?php echo $textSource; ?>: <button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
                                </div>
                            </div>
                            <div class="result">
                                <div>
                                    <form action="searchresult.php" method="post">
                                        <input type="hidden" name="searchform" value=<?php  echo $formType; ?>>
                                        <input type="hidden" name="source" value=<?php  echo $database; ?>>
                                        <input type="hidden" name="search" value=<?php  echo $search; ?>>
                                        <input type="hidden" name="searchID" value=<?php  echo $result["id"]; ?>>
                                        <button type="submit" name="searchSent"><?php echo $searchSeeButton; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
<?php
                            
            }
        } else if (gettype($database) == "array") {
            // we are doing and advanced search, display results depending on which database it came from
            if($database["Terminologi"] == "yes") {
                // text per language
                $textMainDataSet = "";
                $textTerm = "";
                $textTranslation = "";
                $textSource = "";
                switch ($language) {
                    case "swe":
                        $textMainDataSet = "Grunddata";
                        $textTerm = "Term";
                        $textTranslation = "Översättning";
                        $textSource = "Källa";
                        break;
                    case "eng":
                        $textMainDataSet = "Main data set";
                        $textTerm = "Term";
                        $textTranslation = "Translation";
                        $textSource = "Source";
                        break;
                    default:
                        $textMainDataSet = "Grunddata";
                        $textTerm = "Term";
                        $textTranslation = "Översättning";
                        $textSource = "Källa";
                        break;
                }
                    
                //test data
                $searchResult1 = array("id"=>"1","Edefinition"=>"The person who gave birth to a child.","Sdefinition"=>"Person som fött barn.", "swe"=>"Mor", "eng"=>"Mother", "source"=>"LNC305.png");
                $searchResult2 = array("id"=>"2","Edefinition"=>"The person who gave impregnated the mother of a child with his own sperm.","Sdefinition"=>"Personen som gjort en annan gravid med sin egen sperma.", "swe"=>"Far", "eng"=>"Father", "source"=>"LNC305.png");
                $searchResult3 = array("id"=>"3","Edefinition"=>"A female child of the same parents.","Sdefinition"=>"Ett kvinnligt barn till samma föräldrar.", "swe"=>"Syster", "eng"=>"Sister", "source"=>"LNC305.png");
                $searchResult4 = array("id"=>"4","Edefinition"=>"A male child of the same parents.","Sdefinition"=>"Ett manligt barn till samma föräldrar.", "swe"=>"Bror", "eng"=>"Brother", "source"=>"LNC305.png");

                $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
                $count = count($searchResult);
                for($x = 0; $x < $count; $x++) {
                    $result = $searchResult[$x];
    ?>
            <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
                <div>    
                    <div>
                        <?php echo $textDatabase; ?>: Terminologi
                    </div>
                    <div>
                        <div>
                            <?php echo $textMainDataSet; ?>:
                        </div>
                        <div>
                            <?php echo $textTerm; ?>: <?php echo $result[$language]; ?>
                        </div>
                        <div>
                            <?php echo $textTranslation; ?>: <?php if ($language == "swe") { echo $result["eng"]; } else if ($language == "eng") { echo $result["swe"]; } ?>
                        </div>
                    </div>
                    <div>
                        <?php echo $textSource; ?>: <button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
                    </div>
                </div>
                <div class="result">
                    <div>
                        <form action="searchresult.php" method="post">
                            <input type="hidden" name="searchform" value=<?php  echo $formType; ?>>
                            <input type="hidden" name="source" value="Terminologi">
                            <input type="hidden" name="search" value=<?php  echo $search; ?>>
                            <input type="hidden" name="searchID" value=<?php  echo $result["id"]; ?>>
                            <button type="submit" name="searchSent"><?php echo $searchSeeButton; ?></button>
                        </form>
                    </div>
                </div>
            </div>
                    
<?php
                }
            }
            if($database["Personer"] == "yes") {
                // text per language
                $textMainDataSet = "";
                $textName = "";
                $textBirthdate = "";
                $textDeathdate = "";
                $textSource = "";
                switch ($language) {
                    case "swe":
                        $textMainDataSet = "Grunddata";
                        $textName = "Namn";
                        $textBirthdate = "Född";
                        $textDeathdate = "Död";
                        $textSource = "Källa";
                        break;
                    case "eng":
                        $textMainDataSet = "Main data set";
                        $textName = "Name";
                        $textBirthdate = "Born";
                        $textDeathdate = "Died";
                        $textSource = "Source";
                        break;
                    default:
                        $textDatabase = "Databas";
                        $textMainDataSet = "Grunddata";
                        $textName = "Namn";
                        $textBirthdate = "Född";
                        $textDeathdate = "Död";
                        $textSource = "Källa";
                        break;
                }
                
                //test data
                $searchResult1 = array("id"=>"1","name"=>"Per Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
                $searchResult2 = array("id"=>"2","name"=>"Gustav Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
                $searchResult3 = array("id"=>"3","name"=>"Hanna Person", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
                $searchResult4 = array("id"=>"4","name"=>"Per Gustavsson", "birth"=>"1 jan", "death"=>"30 dec", "source"=>"LNC305.png");
                
                $searchResult = array($searchResult1,$searchResult2,$searchResult3,$searchResult4);
                
                $count = count($searchResult);
                for($x = 0; $x < $count; $x++) {
                    $result = $searchResult[$x];
    ?>
                            <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
                                <div>    
                                    <div>
                                        <?php echo $textDatabase; ?>: Personer
                                    </div>
                                    <div>
                                        <div>
                                            <?php echo $textMainDataSet; ?>:
                                        </div>
                                        <div>
                                            <?php echo $textName; ?>: <?php echo $result["name"]; ?>
                                        </div>
                                        <div>
                                            <?php echo $textBirthdate; ?>: <?php echo $result["birth"]; ?>
                                        </div>
                                        <div>
                                            <?php echo $textDeathdate; ?>: <?php echo $result["death"]; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo $textSource; ?>: <button id="sourceButton" onClick="openSource('<?php echo $result["source"]; ?>')"><img src="source/img/<?php echo $result["source"]; ?>"></button>
                                    </div>
                                </div>
                                <div class="result">
                                    <div>
                                        <form action="searchresult.php" method="post">
                                            <input type="hidden" name="searchform" value=<?php  echo $formType; ?>>
                                            <input type="hidden" name="source" value="Personer">
                                            <input type="hidden" name="search" value=<?php  echo $search; ?>>
                                            <input type="hidden" name="searchID" value=<?php  echo $result["id"]; ?>>
                                            <button type="submit" name="searchSent"><?php echo $searchSeeButton; ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
    <?php
                                
                }
            }
        }
    }
?>
    </section>

    <div class="source <?php if($sourceOpen == "False"){ echo "sourceHide"; } ?>" id="source">
        <div>
            <?php echo $textDatabase; ?>: <?php if(gettype($database) == "array"){if($database["Personer"] == "yes"){ echo "Personer"; } else if ($database["Terminologi"] == "yes"){ echo "Terminologi"; }} else { echo $database; }?>
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