<?php
$errmsg = $err_name = $err_email = $err_password = $err_phone_number = $err_role = '';
$name = $email = $user_password = $phone_number = '';
include 'admin_form_data_handler.php';

$admin = isset($_GET['admin_email']) ? $_GET['admin_email'] : '';
if (empty($admin)) {
    header("location: ./admin_login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;

        ?>
    </h2>
    <div class="flex w-full h-screen">
        <div class="flex-1 h-full">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="" method="post" class="h-full shadow flex-1 " name="registeration_form"
            enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full h-full">
                <div class=" bg-slate-50 rounded-xl shadow py-4 px-10">
                    <div>
                    </div>
                    <h2 class="font-semibold text-xl py-1">Sign up to your account</h2>
                    <div class="">
                        <div class=" w-full">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="first_name" placeholder="Name"
                                class="border rounded-sm w-full p-1" value="<?php echo $name ?>">
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_name ?>
                                </small></span>
                        </div>

                    </div>
                    <div class="">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="border rounded-sm w-full p-1" value="<?php echo $email ?>">
                        <span class="text-red-600 text-sm">* <small>
                                <?php echo $err_email ?>
                            </small></span>
                    </div>
                    <div class="">
                        <label for="password"><span>Password</span><small> (Enter atleast 8 characters)</small></label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="border rounded-sm w-full p-1" value="<?php echo $user_password ?>">
                        <span class="text-red-600 text-sm max-w-xs w-60">* <small>
                                <?php echo $err_password ?>
                            </small></span>
                    </div>
                    <div class="">
                        <label for="number">Phone Number</label>
                        <input type="text" name="phone_number" id="number" placeholder="Phone number"
                            class="border rounded-sm w-full p-1" value="<?php echo $phone_number ?>">
                        <span class="text-red-600 text-sm max-w-xs w-96">* <small>
                                <?php echo $err_phone_number ?>
                            </small></span>
                    </div>
                    <div class="grid ">
                        <div class="flex items-center gap-4">
                            <label for="role" class="w-auto">What is your Occupation :-</label>
                            <select name="occupation" id="role"
                                class="rounded-lg bg-slate-100 text-slate-500 border w-48 p-2 ">
                                <option value="" class="bg-transparent p-1">Select Your Role</option>
                                <option value="Owner" <?php echo ($occupation == 'Owner') ? 'selected' : '' ?>
                                    class="bg-transparent p-1">Owner</option>
                                <option value="HR" <?php echo ($occupation == 'HR') ? 'selected' : '' ?>
                                    class="bg-transparent p-1">HR</option>
                                <option value="Employee" <?php echo ($occupation == 'Employee') ? 'selected' : '' ?>
                                    class="bg-transparent p-1">Employee</option>
                            </select>
                        </div>
                        <span class="text-red-600 text-sm">* <small>
                                <?php echo $err_role ?>
                            </small></span>
                    </div>
                    <div>
                        <input type="submit" name="submit"
                            class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>