    <header id="header">
        <!-- flag icons from https://www.freeflagicons.com/ -->
        <nav>
            <li>
                <form action="<?php echo $page; ?>" method="post" id="languageNavigationSwe" class="languageNavigation">
                    <button type="submit" name="languageButton" value="swe" id="swe"><img src="source/img/sweden_glossy_square_icon_64.png" alt="Svensk flagga för sidans språkval"></button>
                </form>
            </li>
            <li>
                <form action="<?php echo $page; ?>" method="post" id="languageNavigationEng" class="languageNavigation">
                    <button type="submit" name="languageButton" value="eng" id="eng"><img src="source/img/united_kingdom_glossy_square_icon_64.png" alt="English flag for site language selection"></button>
                </form>
            </li>
        </nav>
        <div>
            <a href="index.php">
                <img src="source/img/logo.png" alt="<?php echo $logoDescriptionText; ?>">
            </a>
            <div id="hamburger" class="hamburgerMenu" onclick="openHamburger();">
                <i class="fas fa-bars"></i>
            </div>
            <div id="closeHamburger" class="hamburgerMenu" onclick="closeHamburger();">
                <i class="fas fa-times"></i>
            </div>
            <nav class="mainNavigationLarge" id="mainNavigationLarge">
                <li>
                    <a href="index.php">
                        <?php echo $navTextHome; ?>
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
        </div>
        <nav class="mainNavigation" id="mainNavigation">
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