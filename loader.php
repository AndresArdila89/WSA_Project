<?php
function loadComponent($component){
    
    include "components/$component.php";
}

function loadImage($imageName,$class){
    echo "<img src='imges/$imageName' class='$class'></img>";
}