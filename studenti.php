<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");
?>

<?php viewMenu($menu, 1); ?>

<h1>Studenti</h1>
<a href="addStudent.php">Přidat nového studenta</a>

<section>
<?php
$query = "select * from Studenti";

try {
  $q = $db->prepare($query);
  $q->execute();

  echo "<table class='styled-table'>";
  echo "<tr>";
    echo "<th>Jméno</th><th>Příjmení</th><th>E-mail</th><th>Semestr</th>";
  echo "</tr>";

  while ($item = $q->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";
      echo "<td>";
        echo '<a href="student.php?id=' . $item["id"] . '">'; // Use student ID
        echo $item["jmeno"];
        echo "</td>";
      echo "<td>";
        echo '<a href="student.php?id=' . $item["id"] . '">';
        echo $item["prijmeni"];
        echo "</td>";
      echo "<td style='display: flex; justify-center'>";
        echo '<a href="student.php?id=' . $item["id"] . '">';
        echo $item["email"];
        echo "</td>";
      echo "<td>";
        echo $item["semestr"];
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
