<?php

function loadHead($title){
    
    include_once "components/head.php";
}


function loadComponent($component){
    
    include "components/$component.php";
}

function loadImage($imageName,$class=''){

    $image = FOLDER_IMAGES . $imageName;
    echo "<img src='$image' class='$class'/>";
}

function adsRandom($imageArray,$class=''){
    // reorganize the elements inside of the array
    shuffle($imageArray);
    
    if($imageArray[0]== 'ads_1.png'){
        $class = 'bigAds';
    }
    
    loadImage($imageArray[0],$class);

}