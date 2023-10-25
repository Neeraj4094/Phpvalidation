<?php
include './registeration_form_with_php.php';
include 'dbconnection.php';


$id = $_GET['id'];
$result = "select * from registeration_login where id = $id";
$result1 = mysqli_query($con, $result);
$fetchdata = mysqli_fetch_all($result1);
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
            foreach ($fetchdata as $i => $j) {
                if ($erremail == null && $erremail1 == null && $errfirstname == null && $errfirstname1 == null && $errpassword == null && $erroccupation == null && $errrole == "" && $errskills == "") {
                    echo "Message sent successfully";
                    //Database
                    // $insert = "insert into registeration_login (name,email,password,occupation,role,skills) values ('$firstname','$email','$password','$occupation','$role','$skills')";
                    $update = "update registeration_login set name= '$firstname', email = '$email', password= '$password', occupation = '$occupation', role = '$role', skills= '$skills' where id= $id";
                    $result = mysqli_query($con, $update);
                    header("location: /phpprogramms/task4/admin3.php");
                    break;
                } else {
                    echo "Please complete the form";
                    break;
                }
            }
        }
        ?>
    </h2>
    <div class="flex w-full h-full">
        <form action="" method="post" class="h-full shadow" name="registeration_form">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $fetchdata[0][1] ?>" class="border rounded-sm w-full p-1">
                        <span class="text-red-600">* <?php echo $errfirstname ?></span>
                    </div>

                    <div class="pl-4 pt-2">
                        <label>Service Provider :-</label>
                        <div class="flex gap-8">
                            <div>
                                <input type="radio" name="service" id="serviceyes" value="Yes">
                                <label for="serviceyes">Yes</label>
                            </div>
                            <div>
                                <input type="radio" name="service" id="serviceno" value="No">
                                <label for="serviceno">No</label>
                            </div>
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