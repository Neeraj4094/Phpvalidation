

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Document</title>
</head>
<body>
<div class="flex w-full h-full">
        <form action="" method="post" class="h-full shadow" name="registeration_form">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" class="border rounded-sm w-full p-1">
                        <!-- <span class="text-red-600">* <?php echo $errfirstname ?></span> -->
                    </div>
                </div>
                
                <div class="pt-2">
                    <input type="submit" name="submit" class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                </div>
            </div>
        </form>
        <div class="flex-1">

            <img src="../Image/Balloon.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
    </div>
</body>
</html>

<?php
include 'dbconnection.php';
if(isset($_POST["submit"])){
    $name= $_POST["first_name"];
    $insert = "insert into loginpage (name) values ('$name')";

    $result = mysqli_query($con,$insert);

    if($result){
        echo "Ok";
    }else{
        echo "Not OK";
    }
}
?>