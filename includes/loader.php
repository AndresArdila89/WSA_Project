<?php
// This function loads the head file and recibes as a parameter
// the title of the page, this value changes the name of the page tab.
function loadHead($title){
    
    include_once "components/head.php";
}

// This function loads components from the componets folder
// receiving as parameter the name of the component and then 
// includes the component in the file where the function is called. 
function loadComponent($component){
    
    include "components/$component.php";
}

// This funtion loads images it recives two parameters, 
// image name [file_name.file_type] and class name [class_name]
// FOLDER_IMAGE is a constant define in the constants.php. 
// FOLDER_IMAGE  contain the folder path to the images of the website. 
function loadImage($imageName,$class=''){

    $image = FOLDER_IMAGES . $imageName;
    echo "<img src='$image' class='$class'/>";
}

// This function receives 2 arguments, an array with names of 
// images and a css class to aply to the image element.
// the shuffle function helps reorganize randomly the elememnts inside the array
// the index always stay in the same position.
// if no value is pass into the class parameter it will be assume to be empty

function adsRandom($imageArray,$class=''){
    // reorganize the elements inside of the array
    shuffle($imageArray);
    // This conditional selects the image for the must expensive advertisement.

    if($imageArray[0]== 'ads_1.png'){
        $class = 'bigAds';
    }
    
    loadImage($imageArray[0],$class);

}