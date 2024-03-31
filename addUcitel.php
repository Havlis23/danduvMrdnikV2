<?php
  require_once("header.php");
  require_once("connectDB.php");
  require_once("functions.php"); // Include the new function file
  require_once("message.php");
?>

<?php viewMenu($menu, 2); ?>

<section>
  <form action="addstudent.php" method="POST">
    <label for="jmeno">Jméno:</label><input type="text" placeholder="jmeno" id="jmeno" name="jmeno">
    <label for="prijmeni">Příjmení:</label><input type="text" placeholder="prijmeni" id="prijmeni" name="prijmeni">
    <label for="rok_vydani">Semestr:</label><input type="number" placeholder="semestr" id="semestr" name="semestr">
    <input type="submit" name="submit"/>
  </form>
</section>

<?php
  if (isset($_POST["submit"])) {
    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $semestr = $_POST["semestr"];

    // Generate email address
    $email = generateEmail($jmeno, $prijmeni);

    $query = "INSERT INTO ucitele (jmeno, prijmeni, semestr, email) VALUES (:jmeno, :prijmeni, :semestr, :email)";

    try {
      $q = $db->prepare($query);
      $q->bindParam(":jmeno", $jmeno);
      $q->bindParam(":prijmeni", $prijmeni);
      $q->bindParam(":semestr", $semestr);
      $q->bindParam(":email", $email); // Bind the generated email
      $q->execute();
      echo"student byl přidán do databáze";
    } catch (PDOException $e) {
      echo $msg["dberror"] . $e->getMessage();
    }
  }
?>

<?php
  require_once("disconnectDB.php");
  require_once("footer.php");

  // Function to generate email address
  function generateEmail($jmeno, $prijmeni) {
    $normalizedName = normalizeName($jmeno . "" . $prijmeni);
    return strtolower($normalizedName) . "@skola.cz";
  }

  // Function to normalize name (replace special characters)
  function normalizeName($name) {
    $replacements = array(
      'á' => 'a', 'ä' => 'a', 'ã' => 'a', 'à' => 'a',
      'č' => 'c', 'ć' => 'c', 'ç' => 'c', 'ě' => 'e', 'é' => 'e',
      'ë' => 'e', 'í' => 'i', 'ï' => 'i', 'î' => 'i', 'ň' => 'n',
      'ó' => 'o', 'ö' => 'o', 'õ' => 'o', 'ø' => 'o', 'ř' => 'r',
      'š' => 's', 'ś' => 's', 'ş' => 's', 'šť' => 'st', 'ť' => 't',
      'ú' => 'u', 'ü' => 'u', 'ũ' => 'u', 'ù' => 'u', 'ý' => 'y',
      'ž' => 'z', 'ź' => 'z', 'ż' => 'z'
    );
    return strtr($name, $replacements);
  }
?>
