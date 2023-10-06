
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Document</title>
</head>

<body>
    <h2> <!--  Video 4 Associative arrays  -->
        <?php
        // $name = $_GET['name']; 
        // echo "Hello " . $_GET['name'];
        ?>


        <b><?php  // Video 5 joining 2 php fles
            echo $a;
            ?></b>
    </h2>
    <br>

    <ul>

        <?php // Video 6 Understanding array
        foreach ($arr as $i => $j) {
            echo "<li>$i => $j</li>";
        }
        echo "<br>";
        ?>
    </ul>

    <ul> <!--  Video 7 Associative arrays  -->
        <?php foreach ($arr as $key => $value) : ?>
            <li><?= " $key => "; ?><?php echo $value ?></li>
        <?php endforeach; ?>
    </ul>
    <br>

    <ul>
        <?php foreach ($arr as $k => $v) : ?>
            <li>
                <strong><?= "$k => $v" ?></strong>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>

    <ul> <!--  Video 8 Booleans  -->
        <li><strong>Name :- <span><?= $arr['Name']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name1']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name2']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name3']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name4']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name5']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name6'] ? 'Complete' : 'Not complete' ?></span></strong></li>
    </ul>
    <br>

    <ul> <!--  Video 8 Booleans  -->
        <li><strong>Name :- <span><?= $arr['Name']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name1']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name2']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name3']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name4']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name5']; ?></span></strong></li>
        <li><strong>Name :- <span><?= $arr['Name6']; ?></span></strong>
            <span>
                <?php
                if ($arr['Name6'] == true) {
                    echo "Completed";
                } else {
                    echo "InCompleted";
                }
                ?>

                <?php if ($arr['Name6'] == true) : ?>
                    <span>&#9989;</span>
                <?php else : ?>
                    <span>&#9899;</span>
                <?php endif; ?>
            </span>
        </li>
    </ul>
    <br>

    <b>
        <?php
        echo "Creating Table with Php ";
        ?></b>
    <ul class="border w-10">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <li class="border w-20">
                <ul class="w-10">
                    <?php for ($j = 1; $j <= 10; $j++) : ?>
                        <li class="w-10 border"><?php echo "$i * $j =" . $i * $j; ?></li>
                    <?php endfor; ?>
                </ul>
                <?php echo "<br>" ?>
            </li>
        <?php endfor; ?>
    </ul>
</body>

</html>