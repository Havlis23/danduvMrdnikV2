<?php
require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ucitelPrihlaseni.php");
    exit;
}
?>

<?php
require_once("disconnectDB.php");
require_once("footer.php");
?>
