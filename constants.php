<?php
// COMPONENTS 
define("FOLDER_COMPONENTS","components/");
//DATA FOLDER ERRORS EXCEPTIONS JSON
define("FOLDER_DATA","data/");
define("FILE_ORDERS", FOLDER_DATA . "orders.json");
// CSS
define("FOLDER_CSS","css/");
define("FILE_CSS_STYLE",FOLDER_CSS . "style.css");

// LINKS
define("PAGE_HOME","index.php");
define("PAGE_ORDERS","orders.php");
define("PAGE_SHOP","shop.php");
define("PAGE_PLAYGROUND","playground.php");
define("PAGE_CHEAT_SHEET",FOLDER_DATA . "cheat_sheet.txt");

// PHP FILES
define("FOLDER_INCLUDES","includes/");
define("FILE_LOADER", FOLDER_INCLUDES . "loader.php");

// IMAGES
define("FOLDER_IMAGES",'images/');

//NAVIGATION BAR 
define("NAV_TABS",array('HOME'=> PAGE_HOME,
                        'SHOP'=> PAGE_SHOP,
                        'ORDERS'=> PAGE_ORDERS,
                        'PLAYGROUND'=> PAGE_PLAYGROUND,
                        'CHEAT SHEET'=> PAGE_CHEAT_SHEET
                        ));

//VALIDATION FORM CONSTANTS
define("PRODUCT_CODE_MAX_LEN",12);
define("FIRST_NAME_MAX_LEN",20);
define("LAST_NAME_MAX_LEN",20);
define("CITY_MAX_LEN",8);
define("COMMENTS_MAX_LEN",200);
define("PRICE_MAX_VAL",10000);
define("QUANTITY_MIN_VAL",1);
define("QUANTITY_MAX_VAL",99);
define("PRODUCT_CODE_INIT_CHAR",'p');



//TAXES
define("VALUE_TAX",0.1205);


?>