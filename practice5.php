<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>
</head>

<body>
    <?php
    require 'registerationwithphp1.php';
    function det($userlist)
    {
        echo "<pre>";
        print_r($userlist);
        echo "</pre>";
    }

    class A
    {
        static $a = 2;
        public $b = 4;
    }
    $ab = new A();
    // print_r($ab);
    echo "Static class :-" . A::$a;
    echo "<br>Non-Static/Public class :-" . $ab->b;
    ?>
    <?php 
    $cards = array();
    foreach($_SESSION as $i => $j) : ?>
    <?php if (isset($j["first_name"])) : ?>
    <?php $cardcontent[] = '<div class="grid gap-2 py-2 sm:block md:grid mt-2 bg-white rounded-md border w-full">
                    <div class=" flex justify-between items-center p-2 gap-2 w-full">
                        <div class=" flex justify-between items-center gap-4">
                            <div class=" p-2 rounded-full bg-blue-600"></div>
                            <div class="ar">
                                <div class="flex items-center gap-1">
                                    <h2 class="font-bold">'
                                               . $j["first_name"] .'
                                           </h2>
                                    <p class=" px-1 rounded-lg mx-2 bg-purple-600 text-white">'
                                           . $j["role"] . '</p>
                                </div>
                                <div class="email">'
                                . $j["email"] . '</p>
                                </div>
                                <div class="skills flex justify-between items-center gap-4">
                                    <p>Associated Marketplace: Not Associated</p>
                                    <p>Service Provider : No</p>
                                    <p>Skills : '
                                    . $j["skills"] . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-8">
                            <p class=" bg-indigo-500 text-white px-3 rounded-full">Active</p>
                            <p class=" bg-purple-500 text-white px-3 rounded-full">'
                            . $j["occupation"] . '</p>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor">
                                <rect fill="none" height="24" width="24"></rect>
                                <path d="M13,3c-4.97,0-9,4.03-9,9c0,0.06,0.01,0.12,0.01,0.19l-1.84-1.84l-1.41,1.41L5,16l4.24-4.24l-1.41-1.41l-1.82,1.82 C6.01,12.11,6,12.06,6,12c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7c-1.9,0-3.62-0.76-4.88-1.99L6.7,18.42 C8.32,20.01,10.55,21,13,21c4.97,0,9-4.03,9-9S17.97,3,13,3z M15,11v-1c0-1.1-0.9-2-2-2s-2,0.9-2,2v1c-0.55,0-1,0.45-1,1v3 c0,0.55,0.45,1,1,1h4c0.55,0,1-0.45,1-1v-3C16,11.45,15.55,11,15,11z M14,11h-2v-1c0-0.55,0.45-1,1-1s1,0.45,1,1V11z">
                                </path>
                            </svg>
                            <button class="border-2 px-4 py-1 rounded-md">Archive</button>
                        </div>
                    </div>
                </div>'; ?>
                <?php endif; ?>
                <?php endforeach;
                array_push($cards,$cardcontent);
                foreach($cards as $key => $value){
                    print_r($value[0]);
                }
    ?>

                
</body>

</html>