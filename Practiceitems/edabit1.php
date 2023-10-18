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

    // Practice question 4
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
    echo "<br>";
    echo "<br>";

    // Practice question 5
    function func1($a, $b, $c = null)
    {
        // $c= (($a==10)|| ($b==10) || (($a+$b)==10))?"true":"false";
        // $a .= $c;
        $c = ($a % $b) == 0 ? "true" : "false";
        return ($c);
    }

    echo func1(90, 5);
    echo "<br>";
    echo "<br>";

    // Practice question 6
    function yearsInOneHouse($a, $b, $c = null)
    {
        $c = ($a / ($b + 1));
        return $c;
    }

    echo yearsInOneHouse(80, 0);
    echo "<br>";
    echo "<br>";

    // Practice question 7
    function prime($a)
    {
        if ($a <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($a); $i++) {
            if ($a % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if (prime(59)) {
        echo "Prime Number";
    } else {
        echo "Not prime number";
    }
    echo "<br>";
    echo "<br>";

    // Practice question 8
    function table($a){
        for($i=1;$i<=10;$i++){
        if($a%2==0){
            echo "$a*$i = " . $a*$i . "<br>";
            
        }
    }
    return true;
    }

    table(4);

    echo "<br>";
    echo "<br>";

    // Practice question 8
    function factorial($a,$b=null){
        for($i=2;$i<=$a;$i++){
        $b*= $i;
    }
    
    return $b;
    }
    echo factorial(2,1);
    echo "<br>";
    echo "<br>";

    // Practice question 9
    function func2($word,$c=null){
        $c=substr($word,0,2);
        $word = $c . "... " . $c . "... " . $word . "?";
        return $word; 
    }
    echo func2("Hey");
    echo "<br>";
    echo "<br>";

    // Practice question 9
    function func3($a,$b,$c=null){
        $c= ($a===$b)?"true":"false";
        return $c;
    }
    echo func3(4,4);
    echo "<br>";
    echo "<br>";

    // Practice question 10
    function func4($a,$b=null){
        $b = substr_count(strtolower($a),"hey");
        // $b= strrev(strtoupper($a));
        return $b;
    }
    echo func4("Hey bro hey");
    echo "<br>";
    echo "<br>";

    // Practice question 11
    $strtoint = "123";
    $strresult= intval($strtoint); //string to integer
    $inttostr = strval($strresult); // integer to string
    echo $strtoint;
    echo "(" . gettype($strtoint) . ")";
    echo "<br>" . $strresult;
    echo "(" . gettype($strresult) . ")";
    echo "<br>" . $inttostr;
    echo "(" . gettype($inttostr) . ")<br>";

    $a= [1, 2, 3, 4];
    $b= array_reverse($a);
    foreach($b as $c){
        echo "<br>" .$c;
    }
    echo "<br>";
    echo "<br>";

    // Practice question 12
    function func5($a,$b){
        $temp= $a;
        $a=$b;
        $b=$temp;
        
    }
    $a=100;
    $b=200;
     func5($a,$b);
     echo $a;
     echo $b;
     echo "<br>";
     echo "<br>";
     
     // Practice question 13 armstrong number
     function armstrong($x,$total=null){
        global $total;
         
         while($x!=0){
        $reminder=$x%10;
        $total+=$reminder*$reminder*$reminder;
        $x=$x/10;
     }
     return $total;
    }
    $x=1;
     armstrong($x);
     if($x==$total){
        echo "Armstrong";
     }
     else{
        echo "Not armstrong";
     }
     echo "<br>";
     echo "<br>";
     
     // Practice question 15 palindrome number
     function palindrome($b,$tot=null){
        global $tot;
        
        $b= strval($b);
        $tot=strrev($b);
        $b=intval($tot);
     }
     $b=1001;
     palindrome($b);
     if($b==$tot){
        echo "Palindrome";
     }
     else{
        echo "Not Palindrome";
     }
     echo "<br>";
     echo "<br>";
     
     // Practice question 16 fibonacci number
     $result=0;
     $a1=0;
     $a2=1;
     while($result<10){
        $a3=$a1+$a2;
        echo $a3 . "<br>";
        $a1=$a2;
        $a2=$a3;
        $result++;
     }
     echo "<br>";
     echo "<br>";
     
     // Practice question 17 leap number
     $a=1900;
     if(($a%400==0)||(($a%4==0)&&($a%100!=0))){
             echo "Leap Year";
        
    //  if{
    //  }
    }else{
        echo "Not a Leap Year";
     }

     echo "<br>";
     echo "<br>";
     
     // Practice question 18 shapes number
     $n=5;
     for($i=1;$i<=5;$i++){
         for($j=1;$j<=((2*$i)-1);$j++){
            echo " ";
            echo "*";
        }
        echo "<br>";
     }
    ?>
</body>

</html>