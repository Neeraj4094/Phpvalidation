<?php

$a= "Basics of Php";

$arr=[
    'Name'=>'Neeraj',
    'Name1'=>'Sukhpal',
    'Name2'=>'Sajal',
    'Name3'=>'Simran',
    'Name4'=>'Lovish',
    'Name5'=>'Param',
    'Name6'=> true
];

function showdata($arr){
    echo "<b>Functions in Php :- </b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    if($arr["Name6"]==true){
        echo "Name6 => Complete";
    }else{
        echo "Name6 => Incomplete";
    }
    echo "<br>";
    echo "<br>";
}


// unset($arr['Name5']);

require 'practice1.php';