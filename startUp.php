<?php
session_start();

$page = basename($_SERVER['PHP_SELF']);
//setting basic variables 

$terminologyDatabase = "Terminologi";
$peopleDatabase = "Personer";
$language = "swe";
$logoDescriptionText = "Sidlogo beskrivning";
$navTextHome = "Hem";
$navTextSearch = "Sök";
$navTextAbout = "Om";
$searchTypeSimple = "Enkel";
$searchTypeAdvanced = "Avancerad";
$closeButton = "Stäng fönster";
$title = $navTextHome;
$textDatabase = "Databas";
$test = "";


// add search sub types language varables here

$searchChoiceDatabases = "Databaser";
$searchChoiceSearchWord = "Sökord";
$searchChoiceSearchButton = "Sök";
$searchChoiceResetButton = "Återställ sökning";
$searchSeeButton = "Se resultat";

// now change variables depending on settings in session (exact text should be in a database later)
if (isset($_POST["languageButton"])) {
    if ($_POST["languageButton"] == "swe") {
        $language = "swe";
        $_SESSION["language"] = "swe";
    } else {
        $language = "eng";
        $_SESSION["language"] = "eng";
    }
} else if (isset($_SESSION["language"])) {
    $language = $_SESSION["language"];
} else {
    $_SESSION["language"] = "swe";
}

switch ($language) {
    case "swe":
        $terminologyDatabase = "Terminologi";
        $peopleDatabase = "Personer";
        $logoDescriptionText = "Sidlogo beskrivning";
        $navTextHome = "Hem";
        $navTextSearch = "Sök";
        $navTextAbout = "Om";
        $searchTypeSimple = "Enkel";
        $searchChoiceDatabases = "Databaser";
        $searchChoiceSearchWord = "Sökord";
        $searchChoiceSearchButton = "Sök";
        $searchChoiceResetButton = "Återställ sökning";
        $searchTypeAdvanced = "Avancerad";
        $closeButton = "Stäng fönster";
        $textDatabase = "Databas";
        if ($page == "index.php") {
            $title = "Hem";
        } else if ($page == "search.php") {
            $title = "Sök";
        } else {
            $title = "Om";
        }
        $searchSeeButton = "Se resultat";
        break;
    case "eng":
        $terminologyDatabase = "Terminology";
        $peopleDatabase = "People";
        $logoDescriptionText = "Page logo description";
        $navTextHome = "Home";
        $navTextSearch = "Search";
        $navTextAbout = "About";
        $searchTypeSimple = "Simple";
        $searchTypeAdvanced = "Advanced";
        $searchChoiceDatabases = "Databases";
        $searchChoiceSearchWord = "Search words";
        $searchChoiceSearchButton = "Search";
        $searchChoiceResetButton = "Reset form";
        $closeButton = "Close window";
        $textDatabase = "Database";
        if ($page == "index.php") {
            $title = "Home";
        } else if ($page == "search.php") {
            $title = "Search";
        } else {
            $title = "About";
        }
        $searchSeeButton = "See result";
        break;
    default:
        if ($page == "index.php") {
            $title = "Hem";
        } else if ($page == "search.php") {
            $title = "Sök";
        } else {
            $title = "Om";
        }
        break;
}

// if we have changed language we dont want to change the form type when we are on the search page

$formType = "simple";

if (isset($_COOKIE["formType"])) {
    if ($_COOKIE["formType"] == "simple"){
        $formType = "simple";
    } else {
        $formType = "advanced";
    }
}
$searchDisplay = "list";

if (isset($_COOKIE["searchDisplay"])) {
    $test = "yupp";
    if ($_COOKIE["searchDisplay"] == "list"){
        $searchDisplay = "list";
    } else {
        $searchDisplay = "card";
    }
}

?>