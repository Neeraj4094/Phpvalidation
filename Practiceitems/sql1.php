<?php

try{
    $con = new PDO("mysql:host=localhost; dbname=test;","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
}
catch(PDOException $e){
    echo "Connection Failed" .$e->getMessage();
}
?>