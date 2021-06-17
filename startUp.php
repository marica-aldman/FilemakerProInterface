<?php
session_start();

$page = basename($_SERVER['PHP_SELF']);
//setting basic variables 

$language = "swe";
$logoDescriptionText = "Sidlogo beskrivning";
$navTextHome = "Hem";
$navTextSearch = "Sök";
$navTextAbout = "Om";
$title = $navTextHome;
$test = "";

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
        $logoDescriptionText = "Sidlogo beskrivning";
        $navTextHome = "Hem";
        $navTextSearch = "Sök";
        $navTextAbout = "Om";
        if ($page == "index.php") {
            $title = "Hem";
        } else if ($page == "search.php") {
            $title = "Sök";
        } else {
            $title = "Om";
        }
        break;
    case "eng":
        $logoDescriptionText = "Page logo description";
        $navTextHome = "Home";
        $navTextSearch = "Search";
        $navTextAbout = "About";
        if ($page == "index.php") {
            $title = "Home";
        } else if ($page == "search.php") {
            $title = "Search";
        } else {
            $title = "About";
        }
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

// if we have changed language we dont want to change the form type

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