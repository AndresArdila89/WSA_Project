<header class="nav-grid">
  <div class="nav-logo">
    <span class="<?php opacityChange();?>"><img class="logo" src="images/logo-light.png" alt="MUG&CODE"/></span>
  </div>
  <nav class="main-navbar">
    
    <?php
    //the foreach is supported since PHP4
      foreach(NAV_TABS as $tab=>$tab_value)
      { 
        echo "<a  href='$tab_value'>$tab</a>";
      }
    ?>
  </nav>


  <nav class="nav-signin">
    <?php
      $errorLogin="";
      if(isset($_POST['signin']))
      {   
        $customer = new Customer();
        $errorLogin = $customer->login($_POST['username'], $_POST['password']) ? "": "Username or Password incorrect";
      }

      if(isset($_SESSION['uuid']))
      {
        ?>    
          <form action="" method="POST">
          <h3 class="white-text"><a href="register.php"> <?php echo $_SESSION['firstname'] . ", " . $_SESSION['lastname']; ?> </a></h3> 
            <input type="submit" name="logout" value="logout">
          </form>
        <?php
      }
      else
      {
        loadLogin($errorLogin);
      }
        ?>
  </nav>
</header>