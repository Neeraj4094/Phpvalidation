 <?php
include 'loginwithphp1.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>
</head>

<body>
    <div class="flex w-full h-screen ">
        <form action="loginsessionwithphp.php" method="post" class="grid px-12 py-8 border bg-white shadow-sm text-slate-500">
            <div class="max-w-md space-y-4 px-16">
                <div class="relative" >
                    <a href="http://" class="absolute inset-0" ></a>
                    <svg class="w-12 h-12 text-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor"><path d="M7.5 2.5c-1.026 0-1.908.277-2.6.87-.688.59-1.137 1.447-1.387 2.516a.5.5 0 00.897.4c.316-.452.632-.723.936-.863.294-.135.611-.162.975-.065.366.098.65.386 1.095.87l.015.016c.336.365.745.81 1.305 1.156.582.359 1.305.6 2.264.6 1.026 0 1.908-.277 2.6-.87.688-.59 1.138-1.447 1.387-2.516a.5.5 0 00-.897-.4c-.316.452-.632.723-.936.863-.294.135-.611.162-.975.065-.366-.098-.65-.386-1.095-.87l-.015-.016c-.336-.365-.745-.81-1.305-1.156-.582-.359-1.305-.6-2.264-.6zM4 7c-1.026 0-1.908.277-2.6.87C.712 8.46.263 9.317.013 10.386a.5.5 0 00.897.4c.316-.452.632-.723.936-.863.294-.135.611-.162.975-.065.366.098.65.386 1.095.87l.015.016c.336.365.745.81 1.305 1.156.582.359 1.305.6 2.264.6 1.026 0 1.908-.277 2.6-.87.688-.59 1.138-1.447 1.387-2.516a.5.5 0 00-.897-.4c-.316.452-.632.723-.936.863-.294.135-.611.162-.975.065-.366-.098-.65-.386-1.095-.87l-.015-.016c-.335-.365-.745-.81-1.305-1.156C5.682 7.24 4.959 7 4 7z" fill="currentColor"></path></svg>
                </div>
                <div>
                <h2 class="font-semibold text-2xl">Sign in to your account</h2>
                <p class="text-lg">Not a member? Start a 14 day free trial</p>
                </div>
                <div class="grid space-y-2 ">
                   <label>Email</label>
                    <input type="email" name="loginemail" id="email" placeholder="Enter email" class="border rounded-lg p-2">
                    <span class="text-red-600">* <?php echo $erremail ?></span>
                    <!-- <small>(Email must have "alphabets, @ and .")</small> -->
                </div>
                <div class="grid space-y-2">
                    <label>Password</label>
                    <input type="password" name="loginpassword" id="password" placeholder="Enter password" class="border rounded-lg p-2">
                    <span class="text-red-600">* <?php echo $errpassword ?></span>
                    <!-- <small>(Password must have 1 Capital alphabet, 1 small alphabet, 1 special character & 1 number)</small> -->
                </div>
                <a href="#" class="text-blue-700 px-1">Forget Password?</a>
                
                <div>
                <input type="submit" name="login" id="submit" class="bg-indigo-500 text-white px-10 py-2 rounded-lg" value="Login">
                </div>
            </div>
            
        </form>
        <div class="flex-1">
            <img src="./Image/Balloon.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
    </div>
</body>

</html>