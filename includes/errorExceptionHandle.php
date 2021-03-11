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