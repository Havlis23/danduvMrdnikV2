<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");
?>

<?php viewMenu($menu, 2); ?>
<h1>Učitele</h1><a href="addUcitel.php">Přidat učitele</a>
<section>
    <?php
    $query = "select * from ucitele";
    try {
        $q = $db->prepare($query);
        $q->execute();

        echo "<table class='styled-table'>";
        echo "<tr>";
        echo "<th>Titul:</th><th>Jmeno:</th><th>Prijmeni:</th><th>Email:</th>";
        echo "</tr>";

        while ($item = $q->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";
            echo "<td>";
            echo '<a href="ucitel.php?id=' . $item["id"] . '">'; // Use student ID
            echo $item["jmeno"];
            echo "</td>";
            echo "<td>";
            echo '<a href="ucitele.php?Id=' . $item["id"] . '">';
            echo $item["jmeno"];
            echo "</td>";
            echo "<td>";
            echo $item["prijmeni"];
            echo "</td>";
            echo "<td>";
            echo $item["email"];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo $msg["dberror"] . $e->getMessage();
    }


    ?>
</section>

<?php
require_once("disconnectDB.php");
require_once("footer.php");
?>