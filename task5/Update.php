<?php
include './registeration_form_with_php.php';
// $data = $dbdata->fetchdatafromdb($con, 'registeration_login');

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
        echo $errormsg;
        ?>
    </h2>
    <div class="flex w-full h-full">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="h-full shadow" name="registeration_form" enctype="multipart/form-data">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="name" id="name" placeholder="First Name" value="<?php echo $fetchname ?>" class="border rounded-sm w-full p-1">
                        <span class="text-red-600">* <small><?php echo $errname ?></small></span>
                    </div>

                    <div class="pl-4 pt-2">
                        <label>Upload Your Image :-</label>
                        <div class="grid ">
                            <input type="file" name="image" id="image">
                            <span class="text-red-600">* <small><?php echo $errimage ?></small></span>
                        </div>
                    </div>

                </div>
                <div class="">
                    Email
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $fetchemaildata ?>" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <small><?php echo $erremail ?></small></span>
                </div>
                <div class="">
                    Password
                    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $fetchpassword ?>" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <small><?php echo $errpassword ?></small></span>
                </div>
                <div class="flex items-center justify-between ">
                    <div class="">
                        <div class="flex items-center gap-4">
                            <label class="w-auto">What is your Occupation :-</label>
                            <select name="occupation" id="role" class="rounded-lg bg-slate-100 text-slate-500 border w-48 p-2 ">
                                <option value="" class="bg-transparent p-1">Select Your Role</option>
                                <option value="Testing" <?php echo ($fetchoccupation == 'Testing') ? 'selected' : '' ?> class="bg-transparent p-1">Testing</option>
                                <option value="Designing" <?php echo ($fetchoccupation == 'Designing') ? 'selected' : '' ?> class="bg-transparent p-1">Designing</option>
                                <option value="Managining" <?php echo ($fetchoccupation == 'Managining') ? 'selected' : ''; ?> class="bg-transparent p-1">Managining</option>
                            </select>
                        </div>
                        <span class="text-red-600">* <small><?php echo $erroccupation ?></small></span>
                    </div>

                </div>
                <div class="flex w-full justify-between">
                    <fieldset class=" space-y-2">
                        <legend>Role :-</legend>
                        <div class="flex gap-10">
                            <div>
                                <input type="radio" name="role" id="employee" value="Employee" <?php echo ($fetchrole == 'Employee') ? 'checked' : ''; ?>>
                                <label for="employee">Employee</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="admin" value="Admin" <?php echo ($fetchrole == 'Admin') ? 'checked' : ''; ?>>
                                <label for="admin">Admin</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="other_role" value="Other" <?php echo ($fetchrole == 'Other') ? 'checked' : ''; ?>>
                                <label for="other_role">Other</label>
                            </div>
                        </div>
                        <span class="text-red-600">* <small><?php echo $errrole ?></small></span>
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
                                <input type="radio" name="skills" id="Web_design" value="Web Design" <?php echo ($fetchskills == 'Web Design') ? 'checked' : '' ?>>
                                <label for="Web_design">Web Design</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="ui/ux" value="UI/UX" <?php echo ($fetchskills == 'UI/UX') ? 'checked' : '' ?>>
                                <label for="ui/ux">UI/UX</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="app_design" value="App Design" <?php echo ($fetchskills == 'App Design') ? 'checked' : '' ?>>
                                <label for="app_design">App Design</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="management" value="Management" <?php echo ($fetchskills == 'Management') ? 'checked' : '' ?>>
                                <label for="management">Management</label>
                            </div>

                            <div class="">
                                <input type="radio" name="skills" id="others" value="Other" <?php echo ($fetchskills == 'Other') ? 'checked' : '' ?>>
                                <label for="others">Others</label>
                            </div>
                        </div>
                        <span class="text-red-600">* <small><?php echo $errskills ?></small></span>
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