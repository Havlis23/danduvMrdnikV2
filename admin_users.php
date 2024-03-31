<?php
require_once("authorize.php");
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");

// if(isset($_GET["id"])){
//     //todo odstranit zaznam s id
//     $id = $_GET["id"];
//     $query = "delete from vozy where id=?";
//     $q = $db->prepare($query);
//     $q->execute($id);
//     if($q) echo "Záznam odstraněn";
// }
viewMenu(array("admin"=>"Správa aut","admin_users"=>"Správa uživatelů"),1,1,$_SESSION["loguser"]["fullname"]);
?>
<body>

<section>
  <h1>Seznam uživatelů</h1>
  <?php
    $query = "select vozy.id as id, modely.model as model, rok_vyroby, barvy.barva as barva, najeto, cena from vozy join barvy on vozy.barva = barvy.id join modely on vozy.model=modely.id";
    try{
        $q = $db->prepare($query);
        $q->execute();
        echo '<table class="styled-table">';
        echo "<tr>";
        echo "<thead>";
          echo "<th>Model</th><th>Rok výroby</th><th>Barva</th><th>Najeto</th><th>Cena</th>";
        echo "</thead>";
          echo "</tr>";
          echo "<tbody>";
        while($item = $q->fetch(PDO::FETCH_ASSOC)) {
          
          echo "<tr>";
          echo "<td>";
          echo '<a href="car.php?id='.$item["id"].'">';
          echo $item["model"];
          echo "</a>";
          echo "</td>";
          echo "<td>";
            echo $item["rok_vyroby"];
          echo "</td>";
          echo "<td>";
            echo $item["barva"];
          echo "</td>";
          echo "<td>";
            echo $item["najeto"];
          echo "</td>";
          echo "<td>";
            echo $item["cena"];
          echo "</td>";
          echo "<td>";
            echo '<a href=#>upravit</a>';
          echo "</td>";
          echo "<td>";
            echo '<a href="admin.php?id='.$item["id"].'">odstranit</a>';
          echo "</td>";
          echo "</tr>";
            
        }
        echo "</tbody>";
        echo "</table>";
    }catch(PDOException $e){
        echo $msg["dberror"]. $e->getMessage();
    }
  ?>
</section>
</body>
<?php
require_once("disconnectDB.php");
require_once("footer.php");
?>