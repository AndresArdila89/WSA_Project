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
define("PAGE_CHEAT_SHEET",FOLDER_DATA . "cheat_sheet.txt");
define("URL_ADS", "https://github.com/AndresArdila89");

// PHP FILES
define("FOLDER_INCLUDES","includes/");
define("FILE_LOADER", FOLDER_INCLUDES . "loader.php");

// IMAGES
define("FOLDER_IMAGES",'images/');
define("IMAGES_ADS",array('ads_1.png','ads_2.png','ads_3.png'));


//NAVIGATION BAR 
define("NAV_TABS",array('HOME'=> PAGE_HOME,
                        'SHOP'=> PAGE_SHOP,
                        'ORDERS'=> PAGE_ORDERS,
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


//HOME PAGE CONTENT TEXT
define("CONTENT_TEXT", "Custom printed mugs are a great way to promote your business, organization, 
or event! Just pick a mug, choose a color, and start designing. No graphic? 
No worries! We have thousands of high-quality graphics and hundreds of fonts 
for you to choose from. Or you can upload graphics from your computer with ease. 
We also feature a huge gallery of design templates if you need more inspiration.
At Custom Ink, standard shipping is always free, which guarantees we’ll have your 
order to you in 2 weeks or less. Or, rush your shipment for an even quicker turnaround. 
And if you need help, our sales & service team is available 7 days a week via phone, 
email, and chat.");
?>