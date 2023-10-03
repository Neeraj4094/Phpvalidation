<?php

// * Array reduce, * Array replace recursive

// session_start();
// $arr ='';

// if (isset($_SESSION['name'])) {
//     $name = $_SESSION['name'];
//     echo $name;
//   } else {
//     $name = [];
//   }

// if (isset($_POST['name'])) {
//     $name = $_POST['name'];
//     echo "<br>$name";
//   }

// $array = array($name);
// $_SESSION['name']=$name;
// $name1[] = $_SESSION['name'];
// $arr= $name1;
// echo "<br>";
// print_r($arr) . "<br>";

// Array
$cars = array("hey", "Hello");
$len = count($cars);

echo "Array<br>";
for ($i = 0; $i < $len; $i++) {
  echo $cars[$i];
  echo "<br>";
}

foreach ($cars as $key => $value) {
  echo "$key: $value<br>";
}
echo "<br>";
print_r($cars);
echo "<br>";
echo "<br>";

// 2D array
echo "2D array";
$arr2 = array(
  array("BMW", 100, 90),
  array("Mercedes", 100, 199),
  array("Hyundai", 120, 96)
);
echo "<ul>";
for ($a = 0; $a < 3; $a++) {
  echo "<li>";

  for ($b = 0; $b < 3; $b++) {
    echo $arr2[$a][$b];
    echo " ";
  }

  echo "</li>";
}
echo "</ul>";
echo "<br>";

// Array change key case
echo "Array change key case<br>";
$arr1 = array("spider" => "Man", "Iron" => "man");
$show1 = (array_change_key_case($arr1, CASE_UPPER));
print_r($show1);
echo "<br>";
echo "<br>";

// Array chunk
echo "Array chunk";
echo "<br>";
$cars = array("hey", "Hello", "Hi", "Kem cho");
$show2 = (array_chunk($cars, 2));
print_r($show2);
echo "<br>";
echo "<br>";

// Array column
echo "Array column";
echo "<br>";
$arr3 = array(
  array(
    "id" => "4020",
    'First_Name' => "Ankur"
  ),
  array(
    "id" => "4066",
    'First_Name' => "Sandeep"
  ),
  array(
    "id" => "4094",
    'First_Name' => "Neeraj"
  )
);
$arr4 = (array_column($arr3, 'First_Name', 'id'));
print_r($arr4);
echo "<br>";
echo "<br>";

// Array combine
echo "Array combine";
echo "<br>";
$arr5 = array("Peter", "Tony");
$arr6 = array("Parker", "Stark");
$show3 = array_combine($arr5, $arr6);
print_r($show3);
echo "<br>";
echo "<br>";


// Array count
echo "Array count";
echo "<br>";
$arr7 = array("A", "Cat", "Dog", "A", "Dog");
$show4 = array_count_values($arr7);
print_r($show4);
echo "<br>";
echo "<br>";

// array difference
echo "Array difference";
echo "<br>";
$arr8 = array("a" => "Spider", "b" => "Man");
$arr9 = array("c" => "Spider", "d" => "women");
$show5 = array_diff($arr8, $arr9);
print_r($show5);
echo "<br>";

// array_diff_key
echo "Array difference in keys";
echo "<br>";
$show6 = array_diff_key($arr8, $arr9);
print_r($show6);
echo "<br>";

// diff_uassoc
echo "Array user defined functions to compare the keys";
echo "<br>";
function check($a, $b)
{
  if ($a === $b) {
    return 0;
  } else {
    return ($a > $b) ? 1 : -1;
  }
}

$show7 = array_diff_uassoc($arr8, $arr9, "check");
print_r($show7);
echo "<br>";
echo "<br>";


echo "array_flip function";
echo "<br>";
$show8 = array_flip($arr8);
print_r($show8);
echo "<br>";
echo "<br>";

echo "array_intersect function";
echo "<br>";
$show9 = array_intersect($arr8, $arr9);
print_r($show9);
echo "<br>";
echo "<br>";

// Array filter
echo "Array filter";
echo "<br>";

function odd($a1)
{
  return (($a1 % 2) == 0) ? 1 : 0;
  // if(($a1%2) == 0){
  //   return 1;
  // }
  // else{
  //   return 0;
  // }
}

$arr10 = array(1, 2, 4, 5, 8);
$result1 = array_filter($arr10, "odd");
$show10 = print_r($result1);

echo "<br>";
function odd1($z)
{
  if (($z % 2) == 1)
    return $z;
}
function even($z)
{
  if (($z % 2) == 0)
    return $z;
}
print_r(array_filter([1, 2, 3, 4, 5, 6, 7, 8, 9], 'odd1'));
print_r(array_filter([1, 2, 3, 4, 5, 6, 7, 8, 9], 'even'));
echo "<br>";
echo "<br>";

// Array key exists
echo "Array key exists";
echo "<br>";
if(array_key_exists("a",$arr8)){
  echo "Exists in array<br>";
}else{
  echo "Doesn't exists<br>";
}
// print_r(array_key_exists("a",$arr8));
// echo "<br>";

// Array Keys
echo "<br>Array key";
echo "<br>";
print_r(array_keys($arr8,"Man"));
echo "<br>";

// Array Map
echo "Array Map";
echo "<br>";
$arr11 = array(2,6,4,1,8);
$result2 = array_map("func1", $arr11);
function func1($a2){
  return ($a2*$a2);
}
$show11 = print_r($result2);
echo "<br>";

// Array Merge
echo "Array Merge";
echo "<br>";
$show12 = print_r(array_merge($arr8,$arr9));
echo "<br>";
echo "<br>";

// Array Pop
echo "Array Pop";
echo "<br>";
$arr12 = array("Hey","hi","Hello","hi");
print_r($arr12);
echo "<br>";
$show13 = array_pop($arr12);
$show13= print_r($arr12);
echo "<br>";
echo "<br>";

// Array Push
echo " Array Push";
echo "<br>";
array_push($arr12,"Kem cho");
$show14 = print_r($arr12);
echo "<br>";
echo "<br>";

// Array Replace
echo " Array Replace";
echo "<br>";
$a3 = array("Hey","Hi");
$a4 = array("Hello","Kem cho");
$arr13 = array_replace($a3,$a4);
$show15 = print_r($arr13);
echo "<br>";
echo "<br>";

// Array Replace Recursive
echo " Array Replace Recursive";
echo "<br>";
$a5 = array("a" => array("Iron","Man"), "b"=> array("Spiderman"));
$a6 = array("a" => array("Iron-Man"), "b"=> array("Spider","Man"));
$arr14 =array_replace($a5,$a6);
$arr15=array_replace_recursive($a5,$a6);
echo "Array replace<br>";
print_r($arr14);
echo "<br>Array replace recursive<br>";
print_r($arr15);
echo "<br>";

echo "<br>Array reverse<br>"; //array reverse
print_r(array_reverse($arr15));
echo "<br>";

echo "<br>Array search<br>"; //array search
print_r(array_search("Spider",$arr8));
echo "<br>";

echo "<br>Array shift<br>"; //array shift
array_shift($arr8);
$show16 = print_r($arr8);
echo "<br>";

echo "<br>Array slice<br>"; //array slice 
$arr16 =array_slice($arr12,1,2,true);
$show17 = print_r($arr16);
echo "<br>";

echo "<br>Array splice<br>"; //array splice 
$arr17 =array_splice($arr12,1,2,$arr9);
$show18 = print_r($arr12);
echo "<br>";

echo "<br>Array unique<br>"; //array unique 
$arr18 = array("hello","Hi","Kem cho", "Hi");
$arr19 =array_unique($arr18);
$show19 = print_r($arr19);
echo "<br>";

echo "<br>Array unshift<br>"; //array unshift 
array_unshift($arr18,"Anio");
$show20 = print_r($arr18);
echo "<br>";

echo "<br>Array arsort<br>"; //array arsort 
$arr20 = array("hello","Hi","Kem cho", "Hi");
arsort($arr20);
$show21 = print_r($arr20);
echo "<br>Array sort<br>";
asort($arr20);
print_r($arr20);
echo "<br>";

// Array Compact
echo "<br>Array Compact<br>";
$a7= "Iron";
$a8 = "Man";
$arr21 = compact("a7", "a8");
$show22 =print_r($arr21);
echo "<br>";
echo "<br>";

// Array current, next, end,prev and each
echo "<br>Array current, next, end,prev and each<br>";
$cars = array("hey", "Hello", "Hi", "Kem cho");
print_r($cars);
echo "<br>";
echo current($cars) ."<br>";
print_r(next($cars)) ;
echo "<br>";
print_r(prev($cars)) ."<br>";
echo "<br>";
print_r(end($cars)) ."<br>";
echo "<br>";
print_r(reset($cars)) ."<br>";
echo "<br>";
echo "<br>";
// print_r (each($cars)) ."<br>";

// Extract in array
echo "Extract in array<br>";
$arr22 = array("a" => "Neeraj", "b"=>"Ankur");
extract($arr22);
echo "Name: $a<br>";
echo "Name: $b<br>";
echo "<br>";
echo "<br>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./dist/output.css">
  <title>Document</title>
</head>

<body>
  <!-- <h1>Session in PHP</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="text" name="name" class="border" placeholder="Enter name">
    <input type="submit" value="Submit" name="submit" class=" bg-blue-800 text-white rounded-lg border w-32 py-1 px-4">
    </form> -->
</body>

</html>