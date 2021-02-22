<header class="nav-grid">
  <div class="nav-logo">
    <span>Mug&Code</span>
  </div>
  <nav class="main-navbar">
    <?php
    //the foreach is supported since PHP4
      foreach(NAV_TABS as $tab=>$tab_value)
      {
        echo "<a href='$tab_value'>$tab</a>";
      }
    ?>
  </nav>
</header>