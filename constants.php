<?php
// COMPONENTS 
define("FOLDER_COMPONENTS","components/");

// CSS
define("FOLDER_CSS","css/");
define("FILE_CSS_STYLE",FOLDER_CSS . "style.css");

// LINKS
define("PAGE_HOME","index.php");
define("PAGE_ABOUT","about.php");
define("PAGE_SHOP","shop.php");
define("PAGE_PLAYGROUND","playground.php");

// PHP FILES
define("FOLDER_INCLUDES","includes/");
define("FILE_LOADER", FOLDER_INCLUDES . "loader.php");

// IMAGES
define("FOLDER_IMAGES",'images/');

//NAVIGATION BAR 
define("NAV_TABS",array('HOME'=> PAGE_HOME,
                        'SHOP'=> PAGE_SHOP,
                        'ABOUT US'=> PAGE_ABOUT,
                        'PLAYGROUND'=> PAGE_PLAYGROUND
                        ));
?>