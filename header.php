<!DOCTYPE html>
<html lang="cz">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
   /*interní stylopis*/
  </style>


</head>

<?php
if (isset($_COOKIE['user_type'])) {
    if ($_COOKIE['user_type'] == 'teacher') {
        echo '<a href="ucitelOdhlásit.php">Odhlásit se</a>';
    } else if ($_COOKIE['user_type'] == 'student') {
        echo '<a href="studentOdhlásit.php">Odhlásit se</a>';
    }
} else {
    // User is not logged in
    echo '<a href="ucitelPrihlaseni.php">Přihlásit se</a>';
}
?>

<?php require_once "message.php"; ?>