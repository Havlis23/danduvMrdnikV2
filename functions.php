<?php
function go($destination = "index.php")
{
  header("Location: " . $destination);
  exit();
}

function viewMenu($menuItem, $active, $login = 0, $name = "nobody")
{
  echo '<div class="topnav">';
  $i = 0;
  foreach ($menuItem as $key => $value) {
    if ($i == $active) echo '<a class="active" href="' . $key . '.php">' . $value . '</a>';
    else echo '<a href="' . $key . '.php">' . $value . '</a>';
    $i++;
  }
  echo '<div class="login-container">';
  
  if($login==0) {
    
  } else {
    
  }
  echo "</div>";
    echo "</div>";
}
