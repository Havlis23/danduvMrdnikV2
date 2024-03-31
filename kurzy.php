<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");
?>

<?php viewMenu($menu, 3); ?>

<h1>Kurzy</h1>
<a href="addstudent.php">Přidat nový kurz</a>

<section>
<?php
$query = "SELECT * FROM kurzy";

try {
  $q = $db->prepare($query);
  $q->execute();

  echo "<table class='styled-table'>";
  echo "<tr>";
    echo "<th>Jméno</th><th>Učitel</th><th>Obrázek</th><th>Vlákna</th>";
  echo "</tr>";

  while ($item = $q->fetch(PDO::FETCH_ASSOC)) {
    
    echo "<tr>";
      echo "<td>";
        echo '<a href="kurzy.php?id=' . $item["id"] . '">'; // Use student ID
        echo $item["nazev"];
        echo "</td>";
      echo "<td>";
        echo '<a href="student.php?id=' . $item["id"] . '">';
        echo $item["ucitel"];
        echo "</td>";
      echo "<td style='display: flex; justify-center'>";
        // Display image here for each item
        $image_data = $item["image_data"];
        echo '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" />';
        echo "</td>";
      echo "<td>";
        echo $item["vlákna"];
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
