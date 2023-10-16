<?php
include 'registeration_form_with_php.php';
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
    <div class="grid grid-cols-12 grid-rows-6 p-1 gap-1 w-full h-full">
        <aside class=" row-span-6 col-span-2 bg-slate-100 px-2 py-2 space-y-3 sm:hidden lg:block ">
            <div class="px-2 flex items-center justify-center w-full">
                <div class="w-full h-10 rounded-full ">
                    <img src="./Image/Balloon.jpg" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>
            <div class="flex relative gap-2 pt-1">
                <a href="#" class="absolute inset-0 z-10"></a>
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                </svg>
                <span>Home</span>
            </div>
            <nav class="overflow-auto">
                <ul>
                    <li class="">
                        <span class="text-blue-600 font-medium">General</span>
                        <ul class="px-2 space-y-2">
                            <li>
                                <div class="flex items-center gap-2 relative pt-2">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                                    </svg>
                                    <span>Home</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19,4H14.82A2.98811,2.98811,0,0,0,9.18,4H5A2.00583,2.00583,0,0,0,3,6V20a2.00587,2.00587,0,0,0,2,2H19a2.00591,2.00591,0,0,0,2-2V6A2.00587,2.00587,0,0,0,19,4ZM12,4a1,1,0,1,1-1,1A1.00291,1.00291,0,0,1,12,4ZM10,9l2.79065,2.79364,2.51886-2.51886L14,8h4v4l-1.27625-1.311-3.93151,3.93463L10,11.82971l-2.58575,2.584L6,13Zm9,10H5V17H19Z"></path>
                                    </svg>
                                    <span>Projects</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <rect fill="none" height="24" width="24"></rect>
                                                <rect fill="none" height="24" width="24"></rect>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M20,6h-4V4c0-1.1-0.9-2-2-2h-4C8.9,2,8,2.9,8,4v2H4C2.9,6,2,6.9,2,8v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z M10,4h4v2h-4V4z M15,15h-2v2c0,0.55-0.45,1-1,1s-1-0.45-1-1v-2H9c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1h2v-2 c0-0.55,0.45-1,1-1s1,0.45,1,1v2h2c0.55,0,1,0.45,1,1C16,14.55,15.55,15,15,15z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <span>Services</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"></path>
                                    </svg>
                                    <span>About Us</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"></path>
                                        </svg>
                                        <span>Clients</span>
                                    </div>
                                    <span class="px-2 py-1 border rounded-lg">5</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                                        <path d="m20 8-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9 19H7v-9h2v9zm4 0h-2v-6h2v6zm4 0h-2v-3h2v3zM14 9h-1V4l5 5h-4z"></path>
                                    </svg>
                                    <span>Reports</span>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="py-1 pb-2">
                        <span class="text-blue-600 font-medium">Others</span>
                        <ul class="px-2 space-y-3">
                            <li>
                                <div class="flex justify-between items-center pt-2">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M20 2v16H.32c-.318 0-.416-.209-.216-.465l4.469-5.748a.526.526 0 0 1 .789-.062l1.419 1.334a.473.473 0 0 0 .747-.096l3.047-4.74a.466.466 0 0 1 .741-.09l2.171 2.096c.232.225.559.18.724-.1l5.133-7.785C19.51 2.062 19.75 2 20 2z"></path>
                                        </svg>
                                        <span>Graphs</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center pt-2">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor">
                                            <title>roadmap.sh</title>
                                            <path d="M20.693 0H3.307A3.307 3.307 0 0 0 0 3.307v17.386A3.307 3.307 0 0 0 3.307 24h17.386A3.307 3.307 0 0 0 24 20.693V3.307A3.307 3.307 0 0 0 20.693 0zm-7.706 9.18c-.349.031-.689.078-1.021.142-.333.063-.65.134-.95.214a3.64 3.64 0 0 0-.736.237v8.097a5.522 5.522 0 0 1-.76.143c-.333.047-.68.07-1.045.07a5.87 5.87 0 0 1-.95-.07 1.588 1.588 0 0 1-.688-.285 1.476 1.476 0 0 1-.452-.57c-.095-.253-.142-.578-.142-.974V9.061c0-.364.063-.673.19-.926.142-.27.34-.507.594-.713a3.93 3.93 0 0 1 .926-.546 9.133 9.133 0 0 1 2.54-.736 8.093 8.093 0 0 1 1.378-.119c.76 0 1.361.15 1.804.451.444.285.665.76.665 1.425 0 .222-.032.443-.095.665a3.075 3.075 0 0 1-.237.57c-.341 0-.682.016-1.021.047zm5.113 8.453c-.412.443-.974.665-1.686.665s-1.274-.222-1.686-.665c-.412-.443-.617-.998-.617-1.662 0-.665.205-1.22.617-1.663.412-.443.974-.664 1.686-.664s1.274.221 1.686.664c.411.444.617.998.617 1.663 0 .664-.206 1.219-.617 1.662z"></path>
                                        </svg>
                                        <span>Roadmap</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                                        <path d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-9 14H5v-2h6v2zm8-4H5v-2h14v2zm0-4H5V7h14v2z"></path>
                                    </svg>
                                    <span>Details</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"></path>
                                        </svg>
                                        <span>Settings</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480" fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center gap-2 relative border-t px-2 py-2">
                            <a href="#" class="absolute inset-0 z-10"></a>
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M16.8 2h-2.6C11 2 9 4 9 7.2v4.05h6.25c.41 0 .75.34.75.75s-.34.75-.75.75H9v4.05C9 20 11 22 14.2 22h2.59c3.2 0 5.2-2 5.2-5.2V7.2C22 4 20 2 16.8 2z"></path>
                                <path d="M4.561 11.25l2.07-2.07c.15-.15.22-.34.22-.53s-.07-.39-.22-.53a.754.754 0 00-1.06 0l-3.35 3.35c-.29.29-.29.77 0 1.06l3.35 3.35c.29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06l-2.07-2.07h4.44v-1.5h-4.44z"></path>
                            </svg>
                            <span>Log Out</span>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="row-span-6 col-span-10 bg-slate-100 w-full sm:col-span-12 lg:col-span-10">
            <div class="flex justify-between items-center border-b-2 py-3 px-2">
                <span>Welcome Admin, <?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["first_name"])) {
                                                print_r($j["first_name"]);
                                            }
                                        } ?></span>
                <div class="p-2 border rounded-full bg-slate-100">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="p-2 ">
                <h1 class="text-2xl font-semibold py-2">Manage Customers</h1>
                <div class="flex items-center justify-between ">
                    <div class="flex items-center relative">
                        <svg class="w-4 h-4 absolute left-2 top-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                        <input type="search" class="px-10 py-2 rounded-lg text-slate-400" placeholder="Search...">
                    </div>
                    <button class=" uppercase px-4 py-2 bg-blue-600 text-white rounded-lg">+ Add Customes</button>
                </div>
            </div>

            <div class="px-2 ">
                <?php
                $cards = array();
                foreach ($_SESSION as $i => $j) : ?>
                    <?php if (isset($j["first_name"]) && isset($j["skills"]) && isset($j["role"])) : ?>
                        <?php $cardcontent[] = '<div class="grid gap-2 py-2 sm:block md:grid mt-2 bg-white rounded-md border w-full">
                    <div class=" flex justify-between items-center p-2 gap-2 w-full">
                        <div class=" flex justify-between items-center gap-4">
                            <div class=" p-2 rounded-full bg-blue-600"></div>
                            <div class="ar">
                                <div class="flex items-center gap-1">
                                    <h2 class="font-bold">'
                            . $j["first_name"] . '
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

                array_push($cards, $cardcontent);

                foreach ($cards as $key => $value) {
                    print_r($value[0]);
                }
                ?>
            </div>

        </main>
    </div>


</body>

</html>