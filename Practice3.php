<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function editing_data($User_Information, $option)
    {
        if (is_array($User_Information)) {

            if ($option == "Push") {
                $value = array(
                    "id" => "4018",
                    "name" => "Raj",
                    "email" => "4018.shekhar@gmail.com"
                );
                array_push($User_Information, $value);
                foreach ($User_Information as $v) {
                    echo "<pre>";
                    print_r($v);
                    echo "<br>";
                    echo "</pre>";
                }
            } elseif ($option == "Edit") {
                $value = array("Shekhar" => array(
                    "id" => "4018",
                    "name" => "Amit",
                    "email" => "4018.amit@gmail.com"
                ));
                $option = array_replace_recursive($User_Information, $value);
                foreach ($option as $v) {
                    echo "<pre>";
                    print_r($v);
                    echo "<br>";
                    echo "</pre>";
                }
            } elseif ($option == "Delete") {
                $User_Information["Shekhar"] =
                    array(
                        "name" => "Shekhar",
                        "email" => "4048.shekhar@gmail.com"
                    );
                foreach ($User_Information as $v) {
                    echo "<pre>";
                    print_r($v);
                    echo "<br>";
                    echo "</pre>";
                }
            } else {
                echo "Please enter the value of operation";
            }
        } else {
            echo "Invalid Array";
        }
    }

    $User_Information = array(
        "Neeraj" => array(
            "id" => "4094",
            "name" => "Neeraj",
            "email" => "4094.neeraj@gmail.com"
        ),
        "Ankur" => array(
            "id" => "4020",
            "name" => "Ankur",
            "email" => "4020.ankur@gmail.com"
        ),
        "Shekhar" => array(
            "id" => "4048",
            "name" => "Shekhar",
            "email" => "4048.shekhar@gmail.com"
        )
    );

    $option = "Push"; // Used for pushing data
    // $option = "Edit"; //Used for re-editing data
    // $option = "Delete"; //Used for Deleting data

    editing_data($User_Information, $option);

    ?>
</body>

</html>