<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>
</head>

<body>

    <?php
    function det($userlist)
    {
        echo "<pre>";
        print_r($userlist);
        echo "</pre>";
    }

    class A
    {
        static $a = 2;
        public $b = 4;
    }
    $ab = new A();
    // print_r($ab);
    echo "Static class :-" . A::$a;
    echo "<br>Non-Static/Public class :-" . $ab->b;

    ?>
    <?php
    require '../login_with_php.php';
    $array1 = $_SESSION["Login"]["email"];
    if (in_array($_SESSION["Login"]["email"], array_keys($_SESSION))) {
        if (in_array($_SESSION["Login"]["password"], $_SESSION[$array1])) {
        }
    } else {
        header("location:Error.php");
    }
    echo "<pre>";
   
    echo "</pre>";

    ?>
    <div class="grid place-items-center space-y-4">
        <?php
        // print_r($_SESSION["data"]);
        $array1 = $_SESSION["Login"]["email"];
        $card="";
        if (empty($_SESSION["data"])) {
            $_SESSION["data"] = array();
            $card = '<div class="border w-auto h-auto rounded-lg bg-slate-100 flex p-1 shadow">'
            . $array1 .
            '</div>';
        }else{
            // if(isset($_POST["submit"])){
            if(in_array($_SESSION["Login"],$_SESSION)){
            $card = '<div class="border w-auto h-auto rounded-lg bg-slate-100 flex p-1 shadow">'
                . $array1 .
                '</div>';
            }
        }
        array_push($_SESSION["data"], $card);
        $same = array_unique($_SESSION["data"]);
        
        foreach ($same as $i => $j) {
            echo $j;
        }
        
        
        ?>
    </div>
</body>

</html>