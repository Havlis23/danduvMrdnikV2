<?php
require_once("header.php");
require_once("connectDB.php");
require_once("message.php");
require_once("functions.php");
?>
<body>
<!--
  <div class="topnav">
  <a class="active" href="index.php">Domů</a>
  <a href="cars.php">Vozidla</a>
  <a href="pojisteni.php">Pojištění</a>
  <a href="udrzba.php">Údržba</a>
  <a href="tankovani.php">Tankování</a>
</div>
-->
<?php viewMenu($menu,0) ?>

<section>
  <h1>Vítej ve škole!</h1>
  <?php
  session_start();
 // print_r($_SESSION);
  print_r($_COOKIE);
  ?>
</section>

</body>
<?

require_once("disconnectDB.php");
require_once("footer.php");
?>