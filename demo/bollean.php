<?php

$x = 10.00;


echo (int)$x;

echo (float)$x;

if((int)$x == (float)$x){
    echo "is not a float";
}else{
    echo "is a float";
}