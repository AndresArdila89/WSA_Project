<?php
  include "includes/loader.php";
  loadComponent("head");
  loadComponent("topBar");
  $ads_array = array('ads_1.png','ads_2.png','ads_3.png');
?>


<?php loadComponent('navbar') ?>


<?php 
#   3 types of error:
#       compile error: the code could not even start
#       runtime error: error which happens WHILE the code is running
#       logical error: 

    $debug = false;

    function manageError($Number, $Message, $File, $Line){
        global $debug;
        echo    "An error occured. The dev team is already...";
        if($debug)
        {
            echo    "An error ocoure in the file $File at line $Line:" .
            "Error number $Number: $Message.";
        }
        else
        {
            $fileHandle = fopen("logs/erros.txt","a")  or die("killing PHP");
            fwrite($fileHandle, "An error ocoure in the file $File at line $Line:" .
            "Error number $Number: $Message. \r\n");

            fclose($fileHandle);
        }
        die();

    }

    function manageException($errorObject)
    {
        global $debug;

        if($debug)
        {
            echo    " An error occured in the file " . $errorObject->getFile() . "at line " .
                    $errorObject->GetLine() . " " . $errorObject->getMessage();
        }
        else
        {
            $fileHandle = fopen("logs/exceptions.txt","a")  or die("killing PHP");
            fwrite($fileHandle, " An error occured in the file " . $errorObject->getFile() . "at line " .
            $errorObject->GetLine() . " " . $errorObject->getMessage() . "\r\n");

            fclose($fileHandle);
        }
        
    }

    set_error_handler("manageError");
    set_exception_handler("manageException");

#   error: a problem occured when calling PHP functions
#   exceptions: a problem occured when running error PHP functions

?>





<?php 
//w = write to file
//a = append to file 
    // $fileHandle = fopen("data/sale.html","w")  or die("killing PHP");

    // fwrite($fileHandle, "two mug sold \r\n");
    // fwrite($fileHandle, "two mug sold \r\n");
    // fwrite($fileHandle, "two mug sold \r\n");
    // fclose($fileHandle);
    

    // echo "file created";


    $x = 5/0;

    if(file_exists("data/sale.txt"))
    {
        $fileHandle = fopen("data/sale.txt","r") or die("killing php");
    
        while(! feof($fileHandle))
        {
            echo fgets($fileHandle);
            echo "<br>";
        }

        fclose($fileHandle);
    }
    




?>








<?php loadComponent("footer");?>