<?php
include 'admin_form_data_handler.php';
if (!$id) {
    header("location: ./admin");
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
        <form action="admin_update_data?id=<?php echo $id ?>" method="post" class="h-full shadow flex-1 "
            name="registeration_form" enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full h-full">
                <div class="space-y-1 bg-slate-50 rounded-xl shadow py-6 px-10">
                    <div class="flex gap-10">
                        <div class=" w-full">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="First Name"
                                class="border rounded-sm w-full p-1" value="<?php echo $fetch_name_from_id ?>">
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_name ?>
                                </small></span>
                        </div>

                    </div>
                    <div class="">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="border rounded-sm w-full p-1" value="<?php echo $fetch_email_from_id ?>">
                        <span class="text-red-600 text-sm">* <small>
                                <?php echo $err_email ?>
                            </small></span>
                    </div>
                    <div class="">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="border rounded-sm w-full p-1" value="<?php echo $password ?>">
                        <span class="text-red-600 text-sm max-w-xs w-60">* <small>
                                <?php echo $err_password ?>
                            </small></span>
                    </div>
                    <div class="">
                        <label for="number">Phone Number</label>
                        <input type="text" name="phone_number" id="number" placeholder="Phone number"
                            class="border rounded-sm w-full p-1" value="<?php echo $fetch_phone_number_from_id ?>">
                        <span class="text-red-600 text-sm max-w-xs w-96">* <small>
                                <?php echo $err_phone_number ?>
                            </small></span>
                    </div>
                    <div class="flex items-center justify-between ">
                        <div class="">
                            <div class="flex items-center gap-4">
                                <label for="role" class="w-auto">What is your Occupation :-</label>
                                <select name="occupation" id="role"
                                    class="rounded-lg bg-slate-100 text-slate-500 border w-48 p-2 ">
                                    <option value="" class="bg-transparent p-1">Select Your Role</option>
                                    <option value="Owner" class="bg-transparent p-1" <?php echo ($fetch_occupation_from_id == 'Owner') ? 'selected' : '' ?>>Owner</option>
                                    <option value="HR" class="bg-transparent p-1" <?php echo ($fetch_occupation_from_id == 'HR') ? 'selected' : '' ?>>HR</option>
                                    <option value="Employee" class="bg-transparent p-1" <?php echo ($fetch_occupation_from_id == 'Employee') ? 'selected' : '' ?>>Employee</option>
                                </select>
                            </div>
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_role ?>
                                </small></span>
                        </div>

                    </div>

                    <div>
                        <input type="submit" name="update"
                            class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>