<?php
echo "1";
function recursive_array_change_key_case($array, $case = CASE_LOWER) {
    return array_map(function ($item) use ($case) {
        if (is_array($item)) {
            // Recursively apply the function to nested arrays
            return recursive_array_change_key_case($item, $case);
        } else {
            // Change the case of the key
            return $item;
        }
    }, array_change_key_case($array, $case));
}

// Example usage
$originalArray = array(
    'Iron' => 'Man',
    'Spider' => array(
        'Iron' => 'Spider',
        'Venom' => array(
            'Black' => 'Spider',
            'Red' => 'Spider',
        ),
    ),
);

$lowercaseArray = recursive_array_change_key_case($originalArray, CASE_LOWER);

// Print the result
print_r($lowercaseArray);
echo "<br>";

echo "2";
function array_change_key_case_unicode($arr, $c) {
    $c = ($c == CASE_UPPER) ? MB_CASE_UPPER : MB_CASE_LOWER;
    foreach ($arr as $k => $v) {
        $ret[mb_convert_case($k, $c, "UTF-8")] = $v;
    }
    return $ret;
}

$arr = array("FirSt" => 1, "yağ" => "Oil", "şekER" => "sugar");
print_r(array_change_key_case($arr, CASE_UPPER));
echo "<br>";
print_r(array_change_key_case_unicode($arr, CASE_UPPER));


echo "3";
function partition( $list, $p ) {
    $listlen = count( $list );
    $partlen = floor( $listlen / $p );
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice( $list, $mark, $incr );
        $mark += $incr;
    }
    return $partition;
}

$citylist = array( "Black Canyon City", "Chandler", "Flagstaff", "Gilbert", "Glendale", "Globe", "Mesa", "Miami",
                   "Phoenix", "Peoria", "Prescott", "Scottsdale", "Sun City", "Surprise", "Tempe", "Tucson", "Wickenburg" );
print_r( partition( $citylist, 3 ) );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>