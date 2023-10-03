<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Missing Positive Number</title>
</head>

<body class=" grid py-1 px-4 bg-slate-200">

<div class="py-1">
    <h1 class="font-semibold text-xl underline">Finding fisrt missing positive number with Php :-</h1>
    <br>
    <?php
    $a = array(-1, -2, -10, -12, -15, 1, 2, 3, 4, 6, 12, 14); //Entered values
    arsort($a); //Array sort
    echo "Entered value are :- ";
    print_r($a);
    echo "<br>";

    $n = current($a); //Used for knowing the last biggest +ve number
    $case = $a < 0 ? false : true; //Used to check the vaalues are +ve or -ve
    if (array_search($case, $a)) { //Run when the case is +ve
        for ($i = 1; $i <= $n + 1; $i++) {
            $a1[] = $i;
        }
    } else { //Run when the case is -ve
        for ($i = 0; $i <= $n + 1; $i++) {
            $a1[] = $i;
        }
    }

    echo "<br>";

    $a2 = $a1; //Store the values of for loop in the array
    $result = array_diff($a2, $a); //Used to check the missing values
    echo "Missing number lists from the aray :- ";
    print_r($result);
    $final = current($result); //Here I will go with the first value of the array
    echo "<br>";
    echo "<br>";
    echo "First positive number that is missing from array is :- ";
    if (current($result) == 0) { //If the first value is 0 then it will return 1
        echo $final = 1;
    } else { //If not shows my current first value
        echo $final;
    }
    ?>
</div>
</body>

</html>