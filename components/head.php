<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-03    remove var_dump
#Andres Ardila (student_id)   2021-03-12    headers added
#Andres Ardila (student_id)   2021-04-09    fix typo in UTF HEADER

require_once ERROR_HANDLER;
header('Expires: Thu, 01 Dec 1994 14:00:00 GMT');
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo FILE_CSS_STYLE?> >

    <title>Mug&Code: <?php echo $title; ?></title>
</head>
<body class="<?php bgChange();?>">
    
