<?php
include '../database_connection.php';
include '../admin_session.php';
$errmsg = '';

if(isset($_POST['reset_password'])){
    $user_email = isset($_POST['email']) ? $_POST['email'] :'';
    $_SESSION['reset_password'] = $user_email;
    $reset_query = "SELECT * FROM user_details where user_email='$user_email'";
    $reset_result = mysqli_query($conn, $reset_query);
    if($reset_query){
        $emailcount = mysqli_num_rows($reset_result);
        if($emailcount > 0){
            include '../phpmailer_smtp/test.php';

            $user_email = isset($_SESSION['reset_password']) ? $_SESSION['reset_password'] : '';
            $body = "Click to reset password http://localhost/phpprogramms/task7/forget_password/new_password?user_email=" . $user_email;
            $errmsg = smtp_mailer('4094.neeraj@gmail.com','Reset Password',"$body");
        }else{
            $errmsg = "This email not exist in records";
        }
        
        // $userarray = mysqli_fetch_array($emailcount);
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="w-full h-screen "s>
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;
        ?>
    </h2>
    <div class="flex w-full h-full items-center justify-center">
        <div class=" w-full h-full flex-1">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="" method="post" class="flex-1 px-12 py-8 text-slate-500" name="login_form">
            <div class="max-w-md space-y-4 px-16">
                
                <div>
                    <h2 class="font-semibold text-2xl">Reset your account</h2>
                    <!-- <p class="text-lg">Not a member? Start a 14 day free trial</p> -->
                </div>
                <div class="grid space-y-2 ">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" class="border rounded-lg p-2">
                    
                </div>
                
                <div class="">
                <div>
                    <input type="submit" name="reset_password" id="user_login" class="bg-indigo-500 text-white px-10 py-2 rounded-lg cursor-pointer" value="Send Mail">
                </div>
                
                </div>
            </div>

        </form>
    </div>
</body>

</html>