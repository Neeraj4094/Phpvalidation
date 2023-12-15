<?php
include 'admin_update_fetch_data.php';
// echo $admin_password;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body>
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;
        ?>
    </h2>
    <div class="flex w-full h-screen ">
        <div class="flex-1 h-full">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="admin_login" method="post" class="grid px-12 py-8 border bg-white shadow-sm text-slate-500 flex-1" name="login_form">
            <div class="max-w-md space-y-4 px-16">
                
            <div class="relative">
                <svg class="w-10 h-10 text-slate-500" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>UIkit</title><path d="M17.697 3.292l-4.109 2.489 4.738 2.696v7.077l-6.365 3.538-6.258-3.538v-5.485L1.596 7.956V18l10.219 6 10.589-6V6.002l-4.707-2.71zm-1.904-.989L11.813 0 7.665 2.568l4.032 2.218 4.096-2.483z"></path></svg>
                </div>
                <div>
                    <h2 class="font-semibold text-2xl">Sign in to your account</h2>
                    
                </div>
                <div class="grid space-y-2 ">
                    <label for="email">Email</label>
                    <input type="email" name="login_email" id="email" placeholder="Enter email" class="border rounded-lg p-2" value="<?php echo $login_email ?>">
                    <span class="text-red-600 text-sm ">* <small><?php echo $err_login_email ?></small></span>
                    
                </div>
                <div class="grid space-y-2">
                    <label for="password">Password</label>
                    <input type="password" name="login_password" id="password" placeholder="Enter password" class="border rounded-lg p-2" value="<?php echo $admin_password ?>">
                    <span class="text-red-600 w-96">* <small><?php echo $err_login_password ?></small></span>
                    
                </div>
                
                <p class="flex items-center text-md"><small>Don't have any account?<a href="../admin_details/admin_registeration" class=" text-sm text-blue-700 font-medium">Create New Account</a></small></p>
                <div>
                    <input type="submit" name="login" id="submit" class="bg-indigo-500 text-white px-10 py-2 rounded-lg cursor-pointer" value="Login">
                </div>
            </div>

        </form>
    </div>
</body>

</html>