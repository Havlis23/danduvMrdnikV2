<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");
?>

<?php viewMenu($menu, 2);

if (isset($_GET["id"])) {
  $query = "select * from ucitele where ucitele.id = ?";
} else {
  go("ucitele.php");
}

try {
  $q = $db->prepare($query);
  $q->execute(array($_GET["id"]));

  if ($q->rowCount() == 1) {
    $item = $q->fetch(PDO::FETCH_ASSOC);

    echo "<h1>" . $item["jmeno"] . "</h1>";
    echo '<p class="majitel">' . $item["jmeno"] . " " . $item["prijmeni"] . " " . $item["titul"] . "</p>";

    echo "<section>";
    echo "<h2>Kurzy</h2>";
    echo "<ul>";

    //$query = "select * from kurzy where kurzy.id in (select studenti_kurzy.kurz_id from studenti_kurzy where studenti_kurzy.student_id = ?)";
    $q = $db->prepare($query);
    $q->execute(array($_GET["id"]));

    while ($kurz = $q->fetch(PDO::FETCH_ASSOC)) {
      echo "<li>" . $kurz[""] . "</li>";
    }

    echo "</ul>";
    echo "</section>";
  } else {
    go("ucitel.php");
  }
} catch (PDOException $e) {
  echo $msg["dberror"] . $e->getMessage();
}

require_once("disconnectDB.php");
require_once("footer.php");
?>
