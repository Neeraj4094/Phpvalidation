<?php
include './user_validation.php';
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
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="h-full shadow flex-1 " name="registeration_form" enctype="multipart/form-data">
        <div class="flex items-center justify-center shadow bg-slate-50 w-full h-full">
            <div class="space-y-1  py-6 px-10 w-full">
                <div class="flex gap-4">
                    <div class="">
                    <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="border rounded-sm w-full p-1" value="<?php echo $fetch_user_name ?>">
                        <span class="text-red-600 text-sm">* <small><?php echo $err_name ?></small></span>
                    </div>
                    <div class="">
                    <label for="number">Phone Number</label>
                    <input type="text" name="phone_number" id="number" placeholder="Phone number" class="border rounded-sm w-full p-1" value="<?php echo $fetch_user_phone_no ?>">
                    <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_phone_number ?></small></span>
                </div>
                </div>
                <div class="">
                <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="border rounded-sm w-full p-1" value="<?php echo $fetch_user_email ?>">
                    <span class="text-red-600 text-sm">* <small><?php echo $err_email ?></small></span>
                </div>
                <div class="">
                <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="border rounded-sm w-full p-1" value="<?php echo $fetch_user_password ?>">
                    <span class="text-red-600 text-sm max-w-xs w-60">* <small><?php echo $err_password ?></small></span>
                </div>
                
                <div class="">
                <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Address" class="border rounded-sm w-full p-1" value="<?php echo $fetch_user_address ?>">
                    <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_user_address ?></small></span>
                </div>
                <div class="flex items-center justify-between ">
                <fieldset class=" space-y-2">
                        <legend>Gender :-</legend>
                        <div class="flex gap-10">
                            <div>
                                <input type="radio" name="gender" id="Male" value="Male" <?php echo ($fetch_user_gender == 'Male') ? 'checked' : '' ?> >
                                <label for="male">Male</label>
                            </div>
                            <div>
                                <input type="radio" name="gender" id="Female" value="Female" <?php echo ($fetch_user_gender == 'Female') ? 'checked' : '' ?> >
                                <label for="female">Female</label>
                            </div>
                            <div>
                                <input type="radio" name="gender" id="Other" value="Other" <?php echo ($fetch_user_gender == 'Other') ? 'checked' : '' ?> >
                                <label for="other">Other</label>
                            </div>
                        </div>
                        <span class="text-red-600 text-sm">* <small><?php echo $err_gender ?></small></span>
                    </fieldset>

                </div>
                
                <div>
                    <input type="submit" name="add_users" class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                </div>
            </div>
        </div>
        </form>
        
    </div>

</body>

</html>