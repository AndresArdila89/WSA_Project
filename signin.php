<?php 

require_once "PHP/loader.php";

loadTopElements("Signin");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="banner"> 
        
    <h1>SignIn FORM</h1> 
    <form action="shop.php" method="post" class="form">
      <!-- ROW -->
      <div class="form-section"> 
        <div class="form-element">
            <h1 class="center-text">SIGNUP</h1>
            <img class="logo-signup center" src="./images/logo.png"/>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section"> 
        <div class="form-element">
          <label>Username: <span class="form-error"></span></label>
          <input type="text" name="username" value=''>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section"> 
        <div class="form-element">
          <label > Password: <span class="form-error"></span></label>
          <input type="password"  name="pwd" value=''>
        </div>
      </div>
      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <button class="button" type="submit" name="signin">SignIn</button>
        </div>
      </div>
      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
            <span class="center-text">Need a user account? <a href="">REGISTER</a></span>
        </div>

      </div>
    </form>
    </div>
</div>

<?php loadComponent("footer");?>