<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Document</title>
</head>

<body class="grid place-items-center w-full h-full p-2 space-y-4">
    <h1 class="text-center text-xl font-bold underline">Chess Board</h1>
    <div class="flex">
        <?php
        $number_of_box = 9;
        for ($row = 1; $row < $number_of_box; $row++): ?>
            <div class="w-12 h-12 ">
                <?php for ($column = 1; $column < $number_of_box; $column++): ?>
                    <div class="w-12 h-12 border">
                        <?php
                        $bg_color = ($row + $column) % 2 == 0 ? 'bg-white' : 'bg-slate-600';

                        echo '<div class=" w-full h-full border shadow ' . $bg_color . '"></div>';
                        ?>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</body>

</html>