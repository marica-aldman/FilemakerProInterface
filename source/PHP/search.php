<main id="main">
<?php
// main content for search, handle any submit first
$search = "";
if (isset($_POST["searchSent"])) {
    // check where we are looking up things
    if(isset($_POST["databases"])) {
        $database = "";
        if($_POST["databases"] == "Terminologi") {
            $database = "Terminologi";
        } else if ($_POST["databases"] == "Personer") {
            $database = "Personer";
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

}

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
            <table>
                <tbody>
                    <tr>
                        <td> <label for="databases"><?php echo $searchChoiceDatabases; ?></label>
                        </td>
                        <td> 
                            <select name="databases" id="databases">
                                <option value="Terminologi" <?php if(isset($_POST["databases"])){ if($database == "Terminologi") { echo "selected";}}?>>
                                    <?php echo $terminologyDatabase; ?>
                                </option>
                                <option value="Personer" <?php if(isset($_POST["databases"])){ if($database == "Personer") { echo "selected";}}?>>
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
                            <button type="submit" id="submit">
                                <?php echo $searchChoiceSearchButton; ?>
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
            <input type="hidden" name="searchSent" id="searchSent" value="True">
            <table>
                <tbody>
                    <tr>
                        <td> <?php echo $searchChoiceDatabases; ?>
                        </td>
                        <td> 
                            <?php echo $terminologyDatabase; ?><input type="checkbox" name="Terminologi" id="database1" value="Terminologi" <?php if(isset($_POST["Terminologi"])){ echo "checked";}?>>
                            <?php echo $peopleDatabase; ?><input type="checkbox" name="Personer" id="database2" value="Personer" <?php if(isset($_POST["Personer"])){ echo "checked";}?>>
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

?>

        <!--- card/listing template --->

        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <div>    
                <div>
                    Title
                </div>
                <div>
                    Main data set
                </div>
                <div>
                    Source
                </div>
            </div>
            <div>
                <div>
                    <form action="searchresult.php" method="post">
                        <input type="hidden" name="searchform" value=<?php /* temp values */ echo $formType; ?>>
                        <input type="hidden" name="source" value=<?php /* temp values */ echo "Terminologi"; ?>>
                        <input type="hidden" name="search" value=<?php /* temp values */ echo "Mother"; ?>>
                        <input type="hidden" name="searchID" value=<?php /* temp values */ echo "1"; ?>>
                        <button type="submit" name="searchSent"><?php echo $searchSeeButton; ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <div>
                Title
            </div>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <div>
                Title
            </div>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <div>
                Title
            </div>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
    </section>

</main>