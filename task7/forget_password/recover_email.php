<?php

include '../send_fetch_data_from_db.php';
include '../admin_session.php';
$errmsg = $success = '';

if (isset($_POST['reset_password'])) {
    $user_email = isset($_POST['email']) ? $_POST['email'] : '';

    $user_id_data = $fetch_data_from_db->fetch_data('user_details', 'user_id', $user_email, $conn, 'email');
    $user_id = isset($user_id_data[0][0]) ? $user_id_data[0][0] : '';

    $_SESSION['reset_password'] = $user_email;
    $reset_query = "SELECT * FROM user_details where email='$user_email'";
    $reset_result = mysqli_query($conn, $reset_query);
    if ($reset_query) {
        $emailcount = mysqli_num_rows($reset_result);
        if ($emailcount > 0) {
            include '../forget.php';

            $to_email = "4020neeraj@gmail.com";
            $subject = "Reset Password";
            $from = "4094.neeraj@gmail.com";
            $headers = "From: $from";
            $user_email = isset($_SESSION['reset_password']) ? $_SESSION['reset_password'] : '';
            $body = "Click to reset password http://localhost/phpprogramms/task7/forget_password/new_password?id=" . $user_id;

            $errmsg = smtp_mailer($to_email, $subject, $body, $headers);
        } else {
            $errmsg = "This email not exist in records";
        }

    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $success = '<a href="../home_page" class=" text-sm text-blue-700 font-medium">Go to Home</a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="w-full h-screen " s>
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;
        ?>
    </h2>
    <div class="flex w-full h-full items-center justify-center">
        <div class=" w-full h-full flex-1">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="recover_email" method="post" class="flex-1 px-12 py-8 text-slate-500" name="login_form">
            <div class="max-w-md space-y-4 px-16">

                <div>
                    <h2 class="font-semibold text-2xl">Reset your account</h2>

                </div>
                <div class="grid space-y-2 ">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" class="border rounded-lg p-2">

                </div>
                <div>
                    <input type="submit" name="reset_password" id="user_login"
                        class="bg-indigo-500 text-white px-10 py-2 rounded-lg cursor-pointer" value="Send Mail">
                </div>

                <span class="p-4 mt-10">
                    <?php echo $success ?>
                </span>
            </div>

        </form>
    </div>
</body>

</html>