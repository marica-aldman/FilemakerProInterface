<main id="main">
<?php
// main content for search, handle any submit first

if (isset($_POST["searchSent"])) {
}

// list search form for simple or advanced selected by tabs
?>

    <section>
        <nav class="searchTypeSelection">
            <li>
                <input type="button" name="simple" id="simpleSwitch" value="simple" onclick="formSwitchSimple()">
            </li>
            <li>
                <input type="button" name="advanced" id="advancedSwitch" value="advanced" onclick="formSwitchAdvanced()">
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
                        <td> <label for="databases">Databas</label>
                        </td>
                        <td> 
                            <select name="databases" id="databases">
                                <option>
                                    Terminologi
                                </option>
                                <option>
                                    Personer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="searchTerm">Sökord</label>
                        </td>
                        <td> 
                            <input type="text" name="searchterm" id="searchterm">
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp;
                        </td>
                        <td> 
                            <button type="submit" id="submit">
                                Sök
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
                        <td> Databaser
                        </td>
                        <td> 
                            <input type="checkbox" name="Terminologi" id="database1" value="Terminologi">
                            <input type="checkbox" name="Personer" id="database2" value="Personer">
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="searchTerm">Sökord</label>
                        </td>
                        <td> 
                            <input type="text" name="searchterm" id="searchterm">
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp;
                        </td>
                        <td> 
                            <button type="submit" id="submit">
                                Sök
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
                <input type="button" name="list" id="sortList" value="list" onclick="changeToList()">
            </li>
            <li>
                <input type="button" name="cards" id="sortCards" value="cards" onclick="changeToCard()">
            </li>
        </nav>
    </section>

    <section class="<?php if ($searchDisplay == "list") { echo "searchSectionList"; } else { echo "searchSectionCard"; } ?>" id="searchSection">
<?php

// search result

?>

        <!--- card/listing template --->

        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <h1>
                Title
            </h1>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <h1>
                Title
            </h1>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <h1>
                Title
            </h1>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
        <div class="<?php if ($searchDisplay == "list") { echo "searchList"; } else { echo "searchCard"; } ?>">
            <h1>
                Title
            </h1>
            <div>
                Main data set
            </div>
            <div>
                Source
            </div>
        </div>
    </section>

</main>