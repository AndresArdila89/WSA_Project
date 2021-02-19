<?php

  include "includes/loader.php";
  loadComponent("head");
  loadComponent("topBar");
  $ads_array = array('ads_1.png','ads_2.png','ads_3.png');
?>


<?php loadComponent('navbar') ?>



<?php 



    echo $_SERVER['SCRIPT_FILENAME'];
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br> POST: <br>";
    var_dump($_POST);
    echo "<br> GET: <br>";
    var_dump($_GET);
    echo "<br> REQUEST: <br>";
    var_dump($_REQUEST);
    var_dump($_POST["save"]);


    if(isset($_POST["save"])){
        
        #filter #1
        echo "<br><br>Fileter #1 SANIZE STRING: <br>";
        echo filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
        
        #filter #2
        echo "<br><br>Fileter #2 SANIZE STRING: <br>";
        echo filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        #filter #3
        echo "<br><br>Fileter #3 SANIZE STRING: <br>";
        echo htmlspecialchars($_POST["firstname"]);

        #filter #4
        echo "<br><br>Fileter #4 SANIZE STRING: <br>";
        echo htmlentities($_POST["firstname"]);

        //echo "Welcome " . $_POST["firstname"];
    }
    else
    {
        echo "no user detected";
    }
?>

<form action="form.php" method="POST">
    <p>
    <label>First Name</label>
    <input type="text" name="firstname"/>
</p>
    <input type="submit" value="save" name="save"/>
</form>





<?php loadComponent("footer");?>