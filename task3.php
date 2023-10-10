<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $x = 0;
    echo "Solution of 1st Question :-";
    if ($x == 1) { //The condition will be in used only when 'x == 1' and it will not show any error or any output because the condition is false
        if ($x >= 0) {
            print "true";
        } else {
            print "false";
        }
    }
    echo "<br>";
    echo "The condition will be in used only when 'x == 1' and it will not show any error or any output because the condition is false";

    echo "<br>";
    echo "<br>";
    echo "Solution of 2nd Question :- ";
    $x = 40;
    $y = 20;
    if ($x == $y) { //Will not execute because $x is greater than $y
        echo "1";
    } elseif ($x > $y) {
        echo "2";
    } else {
        echo "3";
    }
    echo "<br>The elseif condition will execute because $x is greater than $y";

    echo "<br>";
    echo "<br>";
    echo "Solution of 3rd Question :- ";
    $color="orange";
    switch ($color) {
        case "blue":
        echo "Hello";
        break;
        case "yellow":
        echo "W3docs";
        break;
        default:  //This condition will execute because $color is neither equal to blue nor equal to yellow
        echo "None";
       }
    echo "<br> This condition will execute because $color is neither equal to blue nor equal to yellow";
    ?>
</body>

</html>