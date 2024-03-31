<?php
require_once("header.php");
require_once("connectDB.php");
require_once("message.php");
require_once("functions.php");
?>
<body>
<?php viewMenu($menu,2) ?>

<section>
  <!-- <h1>Bazarová vozidla</h1> -->
  <?php
    if(isset($_GET["Id"])) $query = "select * from Protagonisti where Protagonisti.Id=?";
    else go("protagonisti.php");
    try{
        $q = $db->prepare($query);
        $q->execute(array($_GET["Id"]));
        if($q->rowCount()==1){
          $item = $q->fetch(PDO::FETCH_ASSOC);
          echo '<h1 class="majitel">'.$item["jmeno"]." ".$item["prijmeni"]." ".$item["rok_narozeni"]."</h1>";
        } else go("protagonisti.php");
    }catch(PDOException $e){
        echo $msg["dberror"]. $e->getMessage();
    }
  ?>
</section>


</body>
<?
require_once("disconnectDB.php");
require_once("footer.php");
?>