<header id="header">

    <a href="index.php">
        <img src="source/img/logo.png">
    </a>
    <nav>
        <li>
            <form action="<?php echo $page; ?>" method="post" id="languageNavigation" class="languageNavigation">
                <input type="submit" name="languageButton" value="swe" id="swe">
            </form>
        </li>
        <li>
            <form action="<?php echo $page; ?>" method="post" id="languageNavigation" class="languageNavigation">
                <input type="submit" name="languageButton" value="eng" id="eng">
            </form>
        </li>
    </nav>
<?php

?>
    <nav class="mainNavigation">
        <li>
            <a href="index.php">
<?php

echo $navTextHome;

?>
            </a>
        </li>
        <li>
            <a href="search.php">
<?php

echo $navTextSearch;

?>
            </a>
        </li>
        <li>
            <a href="about.php">
<?php

    echo $navTextAbout;

?>
            </a>
        </li>
    </nav>
</header>