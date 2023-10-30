<?php
include './registeration_form_with_php.php';
include 'dbconnection.php';
include 'session.php';

$select = "select * from registeration_login";
$query = mysqli_query($con, $select);
$data = mysqli_fetch_all($query);


$id = $_GET['id'];
$result = "select * from registeration_login where id = $id";
$result1 = mysqli_query($con, $result);
$fetchdata = mysqli_fetch_all($result1);


$selectimagedata = "select * from record_of_image where user_id = $id";
$imagequery = mysqli_query($con, $selectimagedata);

while ($image = mysqli_fetch_assoc($imagequery)) {
    $im   = $image['user_image'];
    $ilist[] = $image;
    $usermainid = $image['user_id'];
}
function filt($array, $email)
{
    foreach ($array as $item) {
        $b = $item[0];
        if (in_array($email, $item)) {
            return $item;
        }
    }
    return $array;
}
$a[] = filt($show, $email);

if(isset($_POST['submit'])){
    $image = $_FILES['image'];
    $imagename = $_FILES['image']['name'];
}
$created_date= date('Y-m-d H:i:s');
$modified_date = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        if (isset($_POST['submit'])) {
            foreach ($a as $i) {
                if ($email == $fetchdata[0][2]) {
                    
                    if ($erremail == null && $erremail1 == null && $errfirstname == null && $errpassword == null && $erroccupation == null && $errrole == "" && $errskills == "") {
                        echo "Message sent successfully";
                        //Database
                        $update = "update registeration_login set name= '$firstname', email = '$email', password= '$password', occupation = '$occupation', role = '$role', skills= '$skills' where id= $id";
                        $result = mysqli_query($con, $update);
                        if($_SESSION['submit']['email'] == $fetchdata[0][2]){
                            $_SESSION["submit"] = ["email" => $email, "password" => $password];
                        }

                        print_r($_SESSION['submit']);
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
                                
                                if ($user_id_result) {
                                    $user_id_row = mysqli_fetch_assoc($user_id_result);
                                    $user_id = $user_id_row['ID'];
                                    // Inserting into record_of_image
                                    if($id != $usermainid){
                                        $insert = "INSERT INTO record_of_image (user_image, user_id,Image_name,Create_date,Modified_date) VALUES ('$newname', '$user_id','$imagename','$created_date','$modified_date')";
                                        $result = mysqli_query($con, $insert);
                                        echo "<br>Inserted successfully";
                                    }else{
                                        // echo "<pre>";
                                        // print_r($imagename);
                                        // echo "</pre>";
                                        $update = "UPDATE record_of_image set user_image = '$newname', Image_name = '$imagename',  Modified_Date = '$modified_date' where user_id = '$user_id'";
                                        $result = mysqli_query($con, $update);
                                        echo "<br>Updated successfully";
                                    }
                                    if (!$result) {
                                        echo "Error: " . mysqli_error($con);
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($con);
                                }
                            } else {
                                $errimage = "Only jpg & png files are allowed";
                            }
                        }
                        header("location: /phpprogramms/task4/admin3.php");
                    } else {
                        echo "Please complete the form";
                    }
                } elseif ($email != $i[2]) {
                    if ($erremail == null && $erremail1 == null && $errfirstname == null && $errpassword == null && $erroccupation == null && $errrole == "" && $errskills == "") {
                        echo "Message sent successfully";
                        //Database
                        $update = "update registeration_login set name= '$firstname', email = '$email', password= '$password', occupation = '$occupation', role = '$role', skills= '$skills' where id= $id";
                        $result = mysqli_query($con, $update);
                        if($_SESSION['submit']['email']==$fetchdata[0][2]){
                            $_SESSION["submit"] = ["email" => $email, "password" => $password];
                        }

                        print_r($_SESSION['submit']);
                        if ($size > 0) {
                            // print_r($_FILES);
                            $extension = ["jpg","png","jpeg"];
                            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
                            if (in_array($ext, $extension)) {
                                $errimage = '';
                                $newname = uniqid("Img-", true) . '.' . $ext;
                                $upload = "..\image/" . $newname;
                                move_uploaded_file($image["tmp_name"], $upload);
                    
                                $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
                                $user_id_result = mysqli_query($con, $user_id_query);
                                
                                if ($user_id_result) {
                                    $user_id_row = mysqli_fetch_assoc($user_id_result);
                                    $user_id = $user_id_row['ID'];
                                    // Inserting into record_of_image
                                    if($id != $usermainid){
                                        $insert = "INSERT INTO record_of_image (user_image, user_id,Image_name,Create_date,Modified_date) VALUES ('$newname', '$user_id','$imagename','$created_date','$modified_date')";
                                            $result = mysqli_query($con, $insert); 
                                            echo "<br>Inserted successfully";  
                                    }else{
                                        $update = "UPDATE record_of_image set user_image = '$newname', Image_name = '$imagename', Modified_Date = '$modified_date' where user_id = '$user_id'";
                                        $result = mysqli_query($con, $update);
                                        echo "<br>Updated successfully";
                                    }
                                    if (!$result) {
                                        echo "Error: " . mysqli_error($con);
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($con);
                                }
                            } else {
                                $errimage = "Only jpg & png files are allowed";
                            }
                        }

                        header("location: /phpprogramms/task4/admin3.php");
                    } else {
                        echo "Please complete the form";
                    }
                } else {
                    echo "This email already exists";
                }
            }
        }
        // }
        ?>
    </h2>
    <div class="flex w-full h-full">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="h-full shadow" name="registeration_form" enctype="multipart/form-data">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $fetchdata[0][1] ?>" class="border rounded-sm w-full p-1">
                        <span class="text-red-600">* <?php echo $errfirstname ?></span>
                    </div>

                    <div class="pl-4 pt-2">
                        <label>Upload Your Image :-</label>
                        <div class="grid ">
                            <input type="file" name="image" id="image">
                            <span class="text-red-600">* <?php echo $errimage ?></span>
                        </div>
                    </div>

                </div>
                <div class="">
                    Email
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $fetchdata[0][2] ?>" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <?php echo $erremail ?></span>
                </div>
                <div class="">
                    Password
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $fetchdata[0][3] ?>" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <?php echo $errpassword ?></span>
                </div>
                <div class="flex items-center justify-between ">
                    <div class="">
                        <div class="flex items-center gap-4">
                            <label class="w-auto">What is your Occupation :-</label>
                            <select name="occupation" id="role" class="rounded-lg bg-slate-100 text-slate-500 border w-48 p-2 ">
                                <option value="" class="bg-transparent p-1">Select Your Role</option>
                                <option value="Testing" <?php echo ($fetchdata[0][4] == 'Testing') ? 'selected' : '' ?> class="bg-transparent p-1">Testing</option>
                                <option value="Designing" <?php echo ($fetchdata[0][4] == 'Designing') ? 'selected' : '' ?> class="bg-transparent p-1">Designing</option>
                                <option value="Managining" <?php echo ($fetchdata[0][4] == 'Managining') ? 'selected' : ''; ?> class="bg-transparent p-1">Managining</option>
                            </select>
                        </div>
                        <span class="text-red-600">* <?php echo $erroccupation ?></span>
                    </div>

                </div>
                <div class="flex w-full justify-between">
                    <fieldset class=" space-y-2">
                        <legend>Role :-</legend>
                        <div class="flex gap-10">
                            <div>
                                <input type="radio" name="role" id="employee" value="Employee" <?php echo ($fetchdata[0][5] == 'Employee') ? 'checked' : ''; ?>>
                                <label for="employee">Employee</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="admin" value="Admin" <?php echo ($fetchdata[0][5] == 'Admin') ? 'checked' : ''; ?>>
                                <label for="admin">Admin</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="other_role" value="Other" <?php echo ($fetchdata[0][5] == 'Other') ? 'checked' : ''; ?>>
                                <label for="other_role">Other</label>
                            </div>
                        </div>
                        <span class="text-red-600">* <?php echo $errrole ?></span>
                    </fieldset>
                    <fieldset class=" space-y-2">
                        <legend>Associated :-</legend>
                        <div class="flex gap-10">
                            <div>
                                <input type="radio" name="associated" id="associated_yes" value="Yes">
                                <label for="associated_yes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" name="associated" id="associated_no" value="No">
                                <label for="associated_no">No</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="flex">
                    <fieldset class=" space-y-2">
                        <legend class="flex">Skills :-</legend>
                        <div class="flex items-center flex-wrap gap-6">
                            <div class="">
                                <input type="checkbox" name="skills" id="Web_design" value="Web Design" <?php echo ($fetchdata[0][6] == 'Web Design') ? 'checked' : '' ?>>
                                <label for="Web_design">Web Design</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="ui/ux" value="UI/UX" <?php echo ($fetchdata[0][6] == 'UI/UX') ? 'checked' : '' ?>>
                                <label for="ui/ux">UI/UX</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="app_design" value="App Design" <?php echo ($fetchdata[0][6] == 'App Design') ? 'checked' : '' ?>>
                                <label for="app_design">App Design</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="management" value="Management" <?php echo ($fetchdata[0][6] == 'Management') ? 'checked' : '' ?>>
                                <label for="management">Management</label>
                            </div>

                            <div class="">
                                <input type="checkbox" name="skills" id="others" value="Other" <?php echo ($fetchdata[0][6] == 'Other') ? 'checked' : '' ?>>
                                <label for="others">Others</label>
                            </div>
                        </div>
                        <span class="text-red-600">* <?php echo $errskills ?></span>
                    </fieldset>
                </div>
                <div class="pt-2">
                    <input type="submit" name="submit" value="Update" class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                </div>
            </div>
        </form>
        <div class="flex-1">

            <img src="../Image/Balloon.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
    </div>

</body>

</html>