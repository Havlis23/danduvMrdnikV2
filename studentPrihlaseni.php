<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");
?>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['heslo'];

    // Prepare a SQL query to fetch the user with the provided username
    $query = "SELECT * FROM studenti WHERE username = :username";
    try {
        $q = $db->prepare($query);
        $q->bindParam(":email", $username);
        $q->execute();
        $user = $q->fetch(PDO::FETCH_ASSOC);

        // If a user is found, compare the provided password with the one stored in the database
        if ($user && $password === $user['heslo']) {
            // Přihlášení úspěšné
            session_start();
            $_SESSION['logged_in'] = true;
            header("Location: home.php"); // Přesměrování na stránku s nástěnkou
        } else {
            // Chyba přihlášení
            $errorMessage = "Neplatné uživatelské jméno nebo heslo.";
        }
    } catch (PDOException $e) {
        echo $msg["dberror"] . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Přihlášení student</title>
  <link rel="stylesheet" href="style3.css">
</head>
<body>
  <div class="container">
    <h1>Přihlášení student</h1>

    <?php if (isset($errorMessage)) : ?>
      <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form action="home.php" method="post">
      <label for="username">Uživatelské jméno:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Heslo:</label>
      <input type="password" id="password" name="password">

      <button type="submit" name="submit">Přihlásit se</button>
    </form>
  </div>
</body>
</html>