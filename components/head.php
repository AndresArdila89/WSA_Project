<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-03    remove var_dump
#Andres Ardila (student_id)   2021-03-12    headers added
#Andres Ardila (student_id)   2021-04-09    fix typo in UTF HEADER
#Andres Ardila (student_id)   2021-04-28    add destroy session to logout
#Andres Ardila (student_id)   2021-04-28    fix page title 

require_once ERROR_HANDLER;
header('Expires: Thu, 01 Dec 1994 14:00:00 GMT');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=utf-8');

// create the session

session_start();

if(isset($_POST['logout']))
{
    session_destroy();
    header('Location: index.php');
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo FILE_CSS_STYLE?> >
    <title>Mug&Code: <?php echo $title; ?></title>


<body class="<?php bgChange();?>">
    
