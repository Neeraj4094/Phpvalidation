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
    session_start();
    // session_destroy();
    $err = $password = $errpassword = $a=$b=$c=$d=$e="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["submit"]) {
            if ($_POST["password"]) {
                $password = $_POST["password"];
            }
            $_SESSION[$_POST["password"]] = $_POST;

            $errpassword = func1($password,$err,$a,$b,$c,$d,$e);
            
        }
    }
    function func1($value,$err, $a, $b, $c, $d, $e)
    {
        $a = strlen($value);
        $b = preg_match('@[A-Z]@', $value);
        $c = preg_match('@[a-z]@', $value);
        $d = preg_match('@[0-9]@', $value);
        $e = preg_match('@[^\w]@', $value);

        
            if(empty($email1)){
                $erremail = "Invalid";
            }else{
                $email1;
            }
            if($a >= 8 && $b && $c && $d && $e && !empty($value)){
                $value;
            }
            else{
                $err = "Invalid";
                return $err;
            }
        
    }
    
    ?>
    <form action="" method="post" class="p-2">
        <input type="password" name="password" class="border-2" placeholder="Enter password">
        <span>* <?php echo $errpassword; ?></span>
        <input type="submit" name="submit" id="submit">
    </form>

    <?php
    // function det($userlist)
    // {
    //     echo "<pre>";
    //     print_r($userlist);
    //     echo "</pre>";
    // }

    // class A
    // {
    //     static $a = 2;
    //     public $b = 4;
    // }
    // $ab = new A();
    // // print_r($ab);
    // echo "Static class :-" . A::$a;
    // echo "<br>Non-Static/Public class :-" . $ab->b;
    // 
    ?>
    <?php
    // require 'login_with_php.php';
    // $array1 = $_SESSION["Login"]["email"];
    // if (in_array($_SESSION["Login"]["email"], array_keys($_SESSION))) {
    //     if (in_array($_SESSION["Login"]["password"], $_SESSION[$array1])) {
    //     }
    // } else {
    //     header("location:Error.php");
    // }
    // echo "<pre>";
    // print_r($_SESSION);

    // echo "</pre>";
    // 
    ?>
    <div class="grid place-items-center space-y-4">
        <?php
        //         $_SESSION["data"] = array();

        //         $card = '<div class="border w-auto h-auto rounded-lg bg-slate-100 flex p-1 shadow">'
        //         . $_SESSION["Login"]["email"] .
        //         '</div>';

        //     array_push($_SESSION["data"],$card);
        //     foreach($_SESSION["data"] as $i=>$j){
        //         print_r($j);
        //     }
        // // print_r($_SESSION);
        ?>
    </div>
</body>

</html>