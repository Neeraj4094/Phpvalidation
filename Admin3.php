<?php
include 'registerationwithphp1.php';
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
    <div class="grid grid-cols-12 grid-rows-6 p-1 gap-2 w-full h-full">
        <aside class=" row-span-6 col-span-2 bg-slate-100 px-2 py-2 space-y-3 sm:hidden lg:block ">
            <div class="px-2 flex items-center justify-center w-full">
                <div class="w-full h-10 rounded-full ">
                    <img src="./Image/Balloon.jpg" alt="Logo" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>
            <div class="flex relative gap-2">
                <a href="#" class="absolute inset-0 z-10"></a>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                    </path>
                    <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                        </path>
                                        <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Home</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                        </path>
                                        <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Projects</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                            </path>
                                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                        </path>
                                        <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>About Us</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                            </path>
                                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Clients</span>
                                    </div>
                                    <span class="px-2 py-1 border rounded-lg">5</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                        </path>
                                        <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                            </path>
                                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                            </path>
                                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                        </path>
                                        <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Settings</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                            </path>
                                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Details</span>
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
                                <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z">
                                </path>
                                <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd"></path>
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
                <div class="grid gap-2 py-2 sm:block md:grid mt-2 bg-white rounded-md border w-full">
                    <div class=" flex justify-between items-center p-2 gap-2 w-full">
                        <div class=" flex justify-between items-center gap-4">
                            <div class=" p-2 rounded-full bg-blue-600"></div>
                            <div class="ar">
                                <div class="flex items-center gap-1">
                                    <h2 class="font-bold"><?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["first_name"])) {
                                                print_r($j["first_name"]);
                                            }
                                        }
                                         ?></h2>
                                    <p class=" px-1 rounded-lg mx-2 bg-purple-600 text-white"><?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["role"])) {
                                                print_r($j["role"]);
                                            }
                                        } ?></p>
                                </div>
                                <div class="email">
                                    <p><?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["email"])) {
                                                print_r($j["email"]);
                                            }
                                        } ?></p>
                                </div>
                                <div class="skills flex justify-between items-center gap-4">
                                    <p>Associated Marketplace: Not Associated</p>
                                    <p>Service Provider : No</p>
                                    <p>Skills : <?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["skills"])) {
                                                print_r($j["skills"]);
                                            }
                                        } ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-8">
                            <p class=" bg-indigo-500 text-white px-3 rounded-full">Active</p>
                            <p class=" bg-purple-500 text-white px-3 rounded-full"><?php foreach ($_SESSION as $i => $j) {
                                            if (isset($j["occupation"])) {
                                                print_r($j["occupation"]);
                                            }
                                        } ?></p>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor">
                                <rect fill="none" height="24" width="24"></rect>
                                <path d="M13,3c-4.97,0-9,4.03-9,9c0,0.06,0.01,0.12,0.01,0.19l-1.84-1.84l-1.41,1.41L5,16l4.24-4.24l-1.41-1.41l-1.82,1.82 C6.01,12.11,6,12.06,6,12c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7c-1.9,0-3.62-0.76-4.88-1.99L6.7,18.42 C8.32,20.01,10.55,21,13,21c4.97,0,9-4.03,9-9S17.97,3,13,3z M15,11v-1c0-1.1-0.9-2-2-2s-2,0.9-2,2v1c-0.55,0-1,0.45-1,1v3 c0,0.55,0.45,1,1,1h4c0.55,0,1-0.45,1-1v-3C16,11.45,15.55,11,15,11z M14,11h-2v-1c0-0.55,0.45-1,1-1s1,0.45,1,1V11z">
                                </path>
                            </svg>
                            <button class="border-2 px-4 py-1 rounded-md">Archive</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>


</body>

</html>