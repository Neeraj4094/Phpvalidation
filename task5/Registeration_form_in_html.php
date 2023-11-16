<?php
include '../task5/Registeration_form_with_php.php';
//Database
function filt($array, $email)
{
    foreach ($array as $item) {

        if (in_array($email, $item)) {
            return $item;
        }
    }
    return $array;
}
$a[] = filt($registerationdata, $email);
foreach ($registerationdata as $item) {
    $b[] = $item[0];
}
$created_date = date('Y-m-d H:i:s');
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
        echo $errormsg;

        ?>
    </h2>
    <div class="flex w-full h-full">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="h-full shadow" name="registeration_form" enctype="multipart/form-data">
            <div class="h-full space-y-2 bg-slate-50 shadow-sm py-6 px-10">
                <div class="flex gap-10">
                    <div class="space-y-2">
                        First Name
                        <input type="text" name="name" id="first_name" placeholder="First Name" class="border rounded-sm w-full p-1">
                        <span class="text-red-600 text-sm">* <small><?php echo $errname ?></small></span>
                    </div>

                    <div class="pl-4 pt-2">
                        <label>Upload Your Image :-</label>
                        <div class="grid ">
                            <input type="file" name="image" id="image">
                            <span class="text-red-600 text-sm">* <small><?php echo $errimage ?></small></span>
                        </div>
                    </div>

                </div>
                <div class="">
                    Email
                    <input type="email" name="email" id="email" placeholder="Email" class="border rounded-sm w-full p-1">
                    <span class="text-red-600 text-sm">* <small><?php echo $erremail ?></small></span>
                </div>
                <div class="">
                    Password
                    <input type="password" name="password" id="password" placeholder="Password" class="border rounded-sm w-full p-1">
                    <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $errpassword ?></small></span>
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
                        <span class="text-red-600 text-sm">* <small><?php echo $erroccupation ?></small></span>
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
                        <span class="text-red-600 text-sm">* <small><?php echo $errrole ?></small></span>
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
                                <input type="radio" name="skills" id="Web_design" value="Web Design">
                                <label for="Web_design">Web Design</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="ui/ux" value="UI/UX">
                                <label for="ui/ux">UI/UX</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="app_design" value="App Design">
                                <label for="app_design">App Design</label>
                            </div>
                            <div class="">
                                <input type="radio" name="skills" id="management" value="Management">
                                <label for="management">Management</label>
                            </div>

                            <div class="">
                                <input type="radio" name="skills" id="others" value="Other">
                                <label for="others">Others</label>
                            </div>
                        </div>
                        <span class="text-red-600 text-sm">* <small><?php echo $errskills ?></small></span>
                    </fieldset>
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