<?php
include './book_fetch_validation.php';
if(empty($book_category) && empty($book_author)) {
    $book_category = '';
    $book_author = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Raj">
    <meta name="description" content="This is Product page">
    <link rel="icon" href="/Image/Balloon.jpg" class=" rounded-full" type="image/jpg">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class=" w-full h-full text-slate-600 ">
    <header class="w-full p-2 px-4 flex justify-between items-center border bg-white text-black">
        <div class="w-16 h-16 ">
            <img src="../../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex gap-6">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#category">Categories</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Books</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Sign Up</a></li>

            </ul>
        </nav>
        <div class="px-1 relative flex items-center gap-4">
            <form action="" method="post" class="flex items-center gap-1 relative">
                <input type="search" name="search" id="search" class="border shadow rounded-lg outline-none p-2 w-96"
                    placeholder="Search...">
                <button type="submit" class="p-2 pt-3 bg-slate-100 border rounded-r-lg absolute right-0 top-0">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                        </path>
                    </svg>
                </button>
            </form>
            <button class=" shadow rounded-lg" aria-label="Cart" data-toggle="tooltip" data-placement="left"
                title="View Cart">

                <div class="p-2 border rounded-lg hover:bg-slate-100">
                    <svg class="w-6 h-6  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </div>
            </button>
            <button data-toggle="tooltip" data-placement="top" title="Login" class="p-1 outline rounded-full shadow">
                <svg class="w-8 h-8 " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                    </path>
                </svg>
            </button>
        </div>
    </header>
    <main class="flex h-full w-full gap-4">
        <div class="flex-1 w-full h-full bg-slate-50 py-20 relative">
            <div class="grid place-items-center ">
                <div class="w-60 h-80 border rounded-xl ">
                <img src="../../Image/<?php echo $book_image ?>" alt="Book1" class="w-full h-full object-cover rounded-xl">
            </div>
            <div class="absolute top-2 right-2">
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12.89 5.879H5.11A3.12 3.12 0 002 8.989v11.36c0 1.45 1.04 2.07 2.31 1.36l3.93-2.19c.42-.23 1.1-.23 1.51 0l3.93 2.19c1.28.7 2.32.09 2.32-1.36V8.989c0-1.71-1.4-3.11-3.11-3.11z"></path>
                    <path d="M22 5.11v11.36c0 1.45-1.04 2.06-2.31 1.36l-1.93-1.08a.509.509 0 01-.26-.44V8.99c0-2.54-2.07-4.61-4.61-4.61H8.82c-.37 0-.63-.39-.46-.71C8.88 2.68 9.92 2 11.11 2h7.78C20.6 2 22 3.4 22 5.11z"></path>
                </svg>
            </div>
                

                <!-- <picture class="flex justify-between gap-4 py-6">
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book_image"
                        class="h-20 w-20 rounded-lg focus:ring-4  focus:ring-blue-900  hover:outline hover:outline-blue-800 hover:outline-offset-2">
                    
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book_image"
                        class="h-20 w-20 rounded-lg border-blue-800 hover:outline hover:outline-blue-800 hover:outline-offset-2">
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book_image"
                        class="h-20 w-20 rounded-lg border-blue-800 hover:outline hover:outline-blue-800 hover:outline-offset-2">
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book_image"
                        class="h-20 w-20 rounded-lg border-blue-800 hover:outline hover:outline-blue-800 hover:outline-offset-2">
                </picture> -->
            </div>
        </div>

        <div class="w-full flex-1 py-10 px-6">
            <div class="px-4 space-y-1">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold ">Book / Title :- <span class=" underline"><?php echo $book_name ?></span></h1>
                    <span class="font-semibold text-xl"><?php echo "$" . $book_price ?></span>
                </div>
                
                <div class="flex gap-2">
                    <span>3.9</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-yellow-300 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 text-slate-100" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="py-1">
                <div class=" gap-2">
                        
                    <div class="flex gap-2">
                        <p class="font-semibold">Category :- </p>
                        <span class="font-bold"><?php echo $book_category ?></span>
                    </div>
                    <div class="flex gap-2">
                        <p class="font-semibold">Author :- </p>
                        <span class="font-bold"><?php echo $book_author ?></span>
                    </div>
                    <div class=" py-3 border-b">
                        <details class="text-xl">
                            <summary
                                class="font-semibold cursor-pointer list-none text-2xl flex items-center justify-between pr-2 pb-2">
                                <span>Description</span>
                                <span>+</span>
                            </summary>
                            <ul class="list-disc px-4 list-inside text-base py-2 max-w-lg">
                                <li><?php echo $book_description ?></li>
                            </ul>
                        </details>
                    </div>
                </div>
                <form class="flex flex-col space-y-6 py-6">
                    
                    
                    <!-- <a href="/Totalcarts.html"
                        class="py-3 border flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Add
                        to Cart</a> -->
                    <a href="./rented_book_details.php?buy_book_id=<?php echo $book_id ?>"
                        class="py-3 border flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Buy
                        Now</a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>