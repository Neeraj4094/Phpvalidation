<?php
require 'new_password_validation.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="relative">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;
        ?>
    </h2>
    <div class="flex w-full h-screen ">
        <div class="flex-1 h-full">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="new_password?id=<?php echo $user_id ?>" method="post"
            class="grid px-12 py-8 border bg-white shadow-sm text-slate-500 flex-1" name="login_form">
            <div class="max-w-md space-y-4 px-16">

                <div class="relative">
                    <svg class="w-12 h-12 text-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"
                        fill="currentColor">
                        <path
                            d="M7.5 2.5c-1.026 0-1.908.277-2.6.87-.688.59-1.137 1.447-1.387 2.516a.5.5 0 00.897.4c.316-.452.632-.723.936-.863.294-.135.611-.162.975-.065.366.098.65.386 1.095.87l.015.016c.336.365.745.81 1.305 1.156.582.359 1.305.6 2.264.6 1.026 0 1.908-.277 2.6-.87.688-.59 1.138-1.447 1.387-2.516a.5.5 0 00-.897-.4c-.316.452-.632.723-.936.863-.294.135-.611.162-.975.065-.366-.098-.65-.386-1.095-.87l-.015-.016c-.336-.365-.745-.81-1.305-1.156-.582-.359-1.305-.6-2.264-.6zM4 7c-1.026 0-1.908.277-2.6.87C.712 8.46.263 9.317.013 10.386a.5.5 0 00.897.4c.316-.452.632-.723.936-.863.294-.135.611-.162.975-.065.366.098.65.386 1.095.87l.015.016c.336.365.745.81 1.305 1.156.582.359 1.305.6 2.264.6 1.026 0 1.908-.277 2.6-.87.688-.59 1.138-1.447 1.387-2.516a.5.5 0 00-.897-.4c-.316.452-.632.723-.936.863-.294.135-.611.162-.975.065-.366-.098-.65-.386-1.095-.87l-.015-.016c-.335-.365-.745-.81-1.305-1.156C5.682 7.24 4.959 7 4 7z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-semibold text-2xl">Reset your Password</h2>
                </div>

                <div class="grid space-y-2">
                    <input type="password" name="new_password" id="new_password" placeholder="New password"
                        class="border rounded-lg p-2" value="<?php echo $new_password ?>">
                    <span class="text-red-600 w-96">* <small>
                            <?php echo $err_new_password ?>
                        </small></span>
                </div>
                <div class="grid space-y-2">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password"
                        class="border rounded-lg p-2" value="<?php echo $confirm_password ?>">
                    <span class="text-red-600 w-96">* <small>
                            <?php echo $err_confirm_password ?>
                        </small></span>
                </div>

                <div class="">
                    <div>
                        <input type="submit" name="reset_password" id="reset_password"
                            class="bg-indigo-500 text-white px-10 py-2 rounded-lg cursor-pointer" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>