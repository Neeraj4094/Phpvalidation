<?php
session_start();
$errname = $erremail = $errpasword = $errtextarea = $errgender = '';
$password = $gen = $name = $email = $textarea = '';
if(isset($_POST["name"]) && isset($_POST["femail"]) && isset($_POST["fpassword"]) & isset($_POST["textarea"]) && isset($_POST["gen"])){
$name = trim($_POST["name"]);
$email = $_POST["femail"];
$password = $_POST["fpassword"];
$textarea = $_POST["textarea"];
$gen = $_POST["gen"];
}

$match = "/^[a-zA-Z]$/";
// Name validation
$len = strlen($name);
if ($len >= 3 && $len <= 16) {
    $name;
} elseif (empty($name)) {
    $errname = "Invalid name";
}
if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
    $errname = "Invalid ";
} else {
    $name;
}

// Email Validation
$emailpattern = "^[_a-z0-9]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
if (empty($email)) {
    $erremail = "Invalid email";
} elseif (!preg_match($emailpattern, $email)) {
    $erremail = "Invalid email";
} else {
    $email;
}

// Password Validation
$passlen = strlen($password);
$ucase = preg_match('@[A-Z]@', $password);
$lcase = preg_match('@[a-z]@', $password);
$number = preg_match("@[0-9]@", $password);
$specialcharacters = preg_match("@[^\w]@", $password);
if ($passlen >= 8 && $ucase && $lcase && $number && $specialcharacters) {
  $password;
}
elseif (empty($password)) {
    $errpasword = "Password empty";
  } else {
    $errpasword = "Password must be of 8 characters";
  }

  // Textarea Validation
  if (empty($textarea)) {
    $errtextarea = "Message is empty";
  } elseif (empty($textarea)) {
    $errtextarea = "Message can't start with space";
  } else {
    $textarea;
  }

  // Gender Validation
  if (empty($gen)) {
    $errgender = "Select any one gender";
  } else {
    $gen;
  }



// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Document</title>
</head>

<body class=" flex">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex flex-col flex-1 p-12 border-r space-y-2">

        <label class=" text-lg font-semibold ">Name:</label>
        <input type="text" name="name" placeholder="Enter your name" class=" border w-96">
        <span style="color: red;">* <?= $errname; ?></span>

        <label class=" text-lg font-semibold ">Email:</label>
        <input type="email" name="femail" placeholder="Enter your name" class=" border w-96">
        <span style="color: red;">* <?= $erremail; ?></span>


        <label class=" text-lg font-semibold ">Password:</label>
        <input type="password" name="fpassword" placeholder="Enter your name" class=" border w-96">
        <span style="color: red;">* <?= $errpasword; ?></span>

        <label class=" text-lg font-semibold ">Message:</label>
        <textarea name="textarea" id="textarea" cols="40" rows="5" class="border " placeholder="Enter your message"></textarea>
        <span style="color: red;">* <?= $errtextarea; ?></span>

        <label class=" text-lg font-semibold ">Select your gender:</label>
        <div class="flex gap-4">
            <div>
                <input type="radio" name="gen" value="Male" id="male">
                <label for="male">Male</label>
            </div>
            <div>
                <input type="radio" name="gen" value="Female" id="female">
                <label for="female">Female</label>
            </div>
            <div>
                <input type="radio" name="gen" value="Others" id="others">
                <label for="others">Others</label>
            </div>
        </div>
        <span style="color: red;">* <?= $errgender; ?></span>
        <input type="submit" name="submit" value="Google" class=" bg-white font-bold rounded-lg border py-1 px-4  w-full">
        <input type="submit" name="submit" value="Github" class=" bg-blue-800 text-white rounded-lg border py-1 px-4 ">

    </form>

    <div class="flex-1 bg-slate-100 p-12">
        <?php
        echo "<pre>";
        print_r($_SESSION);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['submit']) {
                    $_SESSION[$_POST['name']] = $_POST;
            }
        }
        foreach($_SESSION as $i=>$j){
            echo "<br>";
            echo "$i Data: ";
            print_r($j);
            // echo $j;
        }

        ?>
    </div>
</body>

</html>