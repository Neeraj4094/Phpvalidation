<?php

session_start();

// variable are declare
$errname = $erremail = $errpasword = $errtextarea = $errgender = '';
$password = $gen = $name = $email = $textarea = '';

// Post method is used
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["fname"]);
  $email = $_POST["femail"];
  $password = $_POST["fpassword"];
  $textarea = $_POST["textarea"];
  if (isset($_POST['gen'])) {
    $gen = $_POST["gen"];
  }
  

  $match = "/^[a-zA-Z]$/";
// if(isset($_POST['submit'])){
  // Name validation
  $len = strlen($name);
  if ($len >= 3 && $len <= 16) {
    $name;
  } elseif (empty($name)) {
    $errname = "Invalid name";
  } if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
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
  // elseif(preg_match('@[A-Z]@', $password)){
  //   $name;
  // }
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
}
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
  <title>Document</title>
</head>

<body class="grid">

  <div class=" flex w-full">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="grid p-12 border space-y-2 w-1/2">

      <label class=" text-lg font-semibold ">Name:</label>
      <input name="fname" placeholder="Enter your name" class=" border w-96">
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
          <input type="radio" name="gen" value="Male" id="male" >
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
      <input type="submit" value="Google" class=" bg-white font-bold rounded-lg border py-1 px-4  w-full">
      <input type="submit" name="submit" value="Github" class=" bg-blue-800 text-white rounded-lg border py-1 px-4 ">

    </form>
  <div class="  w-full h-full">
    <h2 class="font-bold text-xl">
    <?php
      echo "Name :$name";
      echo "<br>";
      ?>
    </h2>
      <h3  class=" font-semibold">
      <?php
    echo "Email: $email";
    echo "<br>";
    ?>
      </h3>
      <h3 class=" font-semibold">
    <?php
      echo "Password: $password";
      echo "<br>";
  ?>
      </h3>
      <h3 class=" font-medium">
  <?php
      echo "Message: $textarea";
      echo "<br>";
?>
      </h3>
      <h3 class="font-semibold">
        <?php
echo "Gender: $gen";
echo "<br>";

        ?>
      </h3>
  
  

  
  </div>
  </div>
</body>

</html>