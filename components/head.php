<?php require_once "constants.php";
/**
   * 2/12/2021: working on the css grid trying to 
   * make the landing page responsive.
   * fix the file name of the head from header.php to head.php
   * 2/16/2021: added a banner with a picture that fits the width
   * of the page and the container hides the overflow havin a max-height of 600px
   * fix local issues where the permition of the images folder had no access
   * 2/16/2021: add the ads container with random images inside an array
   * one of the images ocupies the 100% of the ads container  
   * 
   * 
   */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo FOLDER_CSS . FILE_CSS_STYLE?> >

    <title>Mug&Code: <?php echo $title; ?></title>
</head>
<body>
    
