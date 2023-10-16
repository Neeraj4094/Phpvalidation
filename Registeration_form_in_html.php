<?php
include 'registeration_form_with_php.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        if (isset($_POST['submit'])) {
            if ($erremail == null && $errfirstname == null && $errpassword == null && $erroccupation == null && $errrole == "" && $errskills == "") {
                    echo "Message sent successfully";
                    header("location:/phpprogramms/login_form_in_html.php");
                }
                else{
                    echo "Please complete the form";
                }
            }
                
        
        ?>
    </h2>
    <div class="flex w-full h-full">
        <form action="" method="post" class="h-full shadow" name="form">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" class="border rounded-sm w-full p-1">
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

                    <!-- <div class="">
                    Last Name 
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                        class="border rounded-sm w-full p-1">
                        <span>* <?php echo $errlastname ?></span>
                </div> -->
                </div>
                <div class="">
                    Email
                    <input type="email" name="email" id="email" placeholder="Email" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <?php echo $erremail ?></span>
                </div>
                <div class="">
                    Password
                    <input type="password" name="password" id="password" placeholder="Password" class="border rounded-sm w-full p-1">
                    <span class="text-red-600">* <?php echo $errpassword ?></span>
                </div>
                <div class="flex items-center justify-between ">
                    <div class="">
                        <div class="flex items-center gap-4">
                            <label class="w-auto">What is your Occupation :-</label>
                            <select name="occupation" id="role" class="rounded-lg bg-slate-100 text-slate-500 border w-48 p-2 ">
                                <option value="" class="bg-transparent p-1">Select Your Role</option>
                                <option value="Testing" class="bg-transparent p-1">Testing</option>
                                <option value="Designing" class="bg-transparent p-1">Designing</option>
                                <option value="Managining" class="bg-transparent p-1">Managining</option>
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
                                <input type="radio" name="role" id="employee" value="Employee">
                                <label for="employee">Employee</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="admin" value="Admin">
                                <label for="admin">Admin</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="other_role" value="Other">
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
                                <input type="checkbox" name="skills" id="Web_design" value="Web Design">
                                <label for="Web_design">Web Design</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="ui/ux" value="UI/UX">
                                <label for="ui/ux">UI/UX</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="app_design" value="App Design">
                                <label for="app_design">App Design</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="skills" id="management" value="Management">
                                <label for="management">Management</label>
                            </div>

                            <div class="">
                                <input type="checkbox" name="skills" id="others" value="Other">
                                <label for="others">Others</label>
                            </div>
                        </div>
                        <span class="text-red-600">* <?php echo $errskills ?></span>
                    </fieldset>
                </div>
                <div class="pt-2">
                    <input type="submit" name="submit" class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2">
                </div>
            </div>
        </form>
        <div class="flex-1">

            <img src="./Image/Balloon.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
    </div>

</body>

</html>