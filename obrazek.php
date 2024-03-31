<?php

$imageData = file_get_contents("img/Diskov Web Velký.jpg"); 
$imageName = "image.jpg";

if ($imageData !== false) {
    header("Content-type: image/jpeg"); 
    
    echo $imageData;
} else {
    echo "Image not found.";
}
?>
