<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $arr1 = ["Car1", "Car2", "Car3"];
    if (is_array($arr1)) {
        if (in_array("Car2", $arr1)) {

            if (array_search("Car2", $arr1)) {
                echo "Exists";
            } else {
                echo "Not exists";
            }
        }
    }
    echo "<br>";
    echo "<br>";

    // Practice question 1
    $arr2 = [54, 23, 11, 17, 10];
    sort($arr2);
    echo "Inserted value in array :-";
    print_r($arr2);
    if (!empty($arr2)) {
        if (count($arr2) % 2 == 0) {
            $arr3 = count($arr2) / 2;
            $arr3 -= 1;
            $arr4 = $arr2[$arr3];
            echo "<br>Middle value :-" . $arr4;

            $arr5 = count($arr2);
            $arr5 -= 1;
            $show1 = $arr2[$arr5];
            echo "<br>Second last biggest value :-" . $show1;
        } else {
            $arr3 = count($arr2) / 2;
            $arr4 = $arr2[$arr3];
            echo "<br>Middle odd value :-" . $arr4;

            $arr5 = count($arr2);
            $arr5 -= 2;
            $show1 = $arr2[$arr5];
            echo "<br>Second last biggest value :-" . $show1;
        }
    } else {
        echo "Array not Exists";
    }


    // Practice question 2
    echo "<br>";
    echo "<br>";
    function nextvalue($value)
    {
        echo "Entered Value is :- $value <br>";
        $value += 1;
        return $value;
    }
    echo "Next value :- " . nextvalue(-2);

    // Practice question 3
    echo "<br>";
    echo "<br>";
    function getFirstValue($a)
    {
        $a = $a <= 0 ? "true" : "false";
        echo "Minute :- $a <br>";

        return $a;
    }
    echo "Ankur " . getFirstValue(1);

    echo "<br>";
    echo "<br>";
    // $x = 0;
    // if ($x == 1)
    //     if ($x >= 0)
    //         print "true";
    //     else
    //         print "false";
    
//     $x = 40;
// $y = 20;
//  if($x == $y) {
//  "1";
// } elseif($x > $y) {
//  "2";
// }else {
//  "3";
// }
$color = "orange";
switch ($color) {
    case "blue":
    echo "Hello";
    break;

    case "yellow":
    echo "W3docs";
    break;
    default:
    echo "None";
   }
    ?>
</body>

</html>