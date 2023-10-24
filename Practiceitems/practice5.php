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
    
</body>

</html>