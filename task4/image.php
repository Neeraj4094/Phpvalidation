<?php
include 'dbconnection.php';
// $create = "CREATE TABLE record_of_image (id int auto_increment NOT NULL, user_image text(100), user_id int,primary key(id), foreign key (user_id) references registeration_login(ID))";

// $show = mysqli_query($con,$create);

$select = "select * from record_of_image";
$query = mysqli_query($con,$select);
$show = mysqli_fetch_all($query);

$select1 = "select * from registeration_login";
$query1 = mysqli_query($con, $select1);
$show1 = mysqli_fetch_all($query1);

$image = $name = $email = $size='';
if (isset($_POST['submit'])) {
    if (isset($_FILES['image']) && isset($_POST['email'])) {
        $image = $_FILES['image'];
        // && isset($_POST['name']) 
        // $name = $_POST['name'];
        // empty($name) || 
        $email = $_POST['email'];
        if(empty($email)){
            echo "Shit";
        }
    }
    // ...
    if(isset($image["size"])){
    $size = $image["size"];
    // print_r($_FILES);
    }
    if ($size > 0) {
        $extension = ["jpg","png","jpeg"];
        $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            $errimage = '';
            $newname = uniqid("Img-", true) . '.' . $ext;
            $upload = "..\image/" . $newname;
            move_uploaded_file($image["tmp_name"], $upload);

            $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
            $user_id_result = mysqli_query($con, $user_id_query);
            // print_r($user_id_result);
            if ($user_id_result) {
                $user_id_row = mysqli_fetch_assoc($user_id_result);
                if(isset($user_id_row['ID'])){
                $user_id = $user_id_row['ID'];
                }else{
                    echo "No";
                }
                // print_r($user_id_row);
                echo "Ok";
                // Inserting into record_of_image
                // $insert = "INSERT INTO record_of_image (user_image, user_id) VALUES ('$newname', '$user_id')";
                // $result = mysqli_query($con, $insert);
                // if (!$result) {
                //     echo "Error: " . mysqli_error($con);
                // }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            $errimage = "Only jpg & png files are allowed";
        }
    }

// ...

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
    <!-- <input type="text" name="name" id="name" placeholder="First Name" class="border rounded-sm w-full p-1"> -->
    <input type="email" name="email" id="email" placeholder="Email" class="border rounded-sm w-full p-1">
        <input type="file" name="image" id="image" class="border">
        <input type="submit" name="submit" value="submit" class="border">
    </form>
</body>

</html>