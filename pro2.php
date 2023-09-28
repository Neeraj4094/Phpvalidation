<?php

session_start();
// $_SESSION["formd"]?array_push($data):array($value)

$array ='';
if (isset($_POST['submit'])) {
    if (isset($_POST['fname'])) {
        $name = $_POST['fname'];
    }


    if (isset($_POST['femail'])) {
        $email = $_POST['femail'];
    }
    $_SESSION['submit'] = array($name, $email);

    $array1= $_SESSION['submit'];

    foreach($_SESSION['submit'] as $key){
        echo $key;
        echo "<br>";
    }
}

if(isset($_SESSION['submit'])){
    $array = array_merge($_SESSION['submit'],$array1);
    // echo $array;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class=" p-12 space-y-2 border h-full">
        <label class=" text-lg font-semibold ">Name:</label>
        <div>
            <input name="fname" placeholder="Enter your name" class=" border w-96">
            <!-- <span style="color: red;">* <?= $errname; ?></span> -->
        </div>
        <br>

        <label class=" text-lg font-semibold ">Email:</label>
        <div>
            <input type="email" name="femail" placeholder="Enter your name" class=" border w-96">
            <!-- <span class="text-red-500" style="color: red;">* <?= $erremail; ?></span> -->
        </div>
        <br>

        <input type="submit" value="Submit" name="submit" class=" bg-blue-800 text-white rounded-lg border w-32 py-1 px-4">
    </form>
</body>

</html>