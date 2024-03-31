<?php
    require_once("header.php");
    require_once("connectDB.php");
    require_once("functions.php");
    require_once("message.php");
?>

<?php viewMenu($menu, 3);?>
<h1>Protagonisti</h1><a href="addprotagonista.php">Přidej protagonistu</a>
<section>
<?php
$query = "select * from Protagonisti";
try{
    $q = $db->prepare($query);
    $q->execute();
    echo "<table class='styled-table'>";
    echo "<tr>";
        echo "<th>Jmeno:</th><th>Prijmeni:</th><th>Rok narozeni:</th>";
        echo "</tr>";
        echo "</tr>";
    while($item = $q->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
            echo "<td>";
            echo '<a href="protagonista.php?Id='.$item["Id"].'">';
            echo $item["jmeno"];
            echo "</td>";
            echo "<td>";
            echo $item["prijmeni"];
            echo "</td>";
            echo "<td>";
            echo $item["rok_narozeni"];
            echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}catch(PDOException $e){
    echo $msg["dberror"] . $e->getMessage();
}


?>
</section>

<?php
require_once("disconnectDB.php");
require_once("footer.php");
?>