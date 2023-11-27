<?php
include 'database_connection.php';
include 'send_fetch_data_from_db.php';


$fetch_data_from_db = new fetch_data_from_db ();
$fetch_book_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');

foreach($fetch_book_data_from_db as $key => $value) { 
    $actual_category_name = ucwords(isset($value[3])?$value[3]:'');
    $books_category_data_query = $fetch_data_from_db->fetchiddata('books_details',$actual_category_name, $conn, 'book_category');
    $books_category_data = mysqli_fetch_all($books_category_data_query);

    $actual_book_images[] = isset($books_category_data[0][5])?$books_category_data[0][5]:'';
    $actual_book_category_name[] = isset($books_category_data[0][3])?$books_category_data[0][3]:'';
    
}
$category_image_data = array_unique($actual_book_images);
$image_array = array_values($category_image_data);

$book_category_data = array_unique($actual_book_category_name);
$category_array = array_values($book_category_data);
$maxCount = max(count($image_array), count($category_array));
// for ($row = 0; $row <= $maxCount; $row++) {
//     // echo $row;
//     echo "<pre>";
//     // print_r($image_array);
//     if (isset($image_array[$row])) {
//         echo $image_array[$row];
//     }

    
//     if (isset($category_array[$row])) {
//         echo $category_array[$row];
//     }
//     echo "</pre>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Raj">
    <meta name="description" content="This is Product page">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Document</title>
</head>

<body class="relative w-full h-full">
    <header class="w-full p-2 px-4 flex justify-between items-center border">
        <div class="w-16 h-16 ">
            <img src="../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex gap-6">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#category">Categories</a></li>
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
            <button data-toggle="tooltip" data-placement="top" title="Login" class="p-1 border rounded-full shadow">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                    </path>
                </svg>
            </button>
        </div>
    </header>
    <main class="w-full h-full">
        <section class="grid place-items-center text-center text-white w-full h-full py-44 relative">
            <div
                class="after:content-[''] after:absolute after:top-0 after:left-0 after:bg-[url('https://cdn.pixabay.com/photo/2023/11/06/13/17/ai-generated-8369584_1280.jpg')] after:w-full after:h-full  after:bg-cover after:bg-bottom after:z-10 after:opacity-90">
            </div>
            <div
                class="after:content-[''] after:absolute after:inset-0 after:w-full after:h-full after:bg-gradient-to-t after:from-black after:to-transparent ">
            </div>
            <div class="z-20 space-y-4">
                <h1 class="font-semibold text-2xl "><span class="text-slate-50s font-bold text-3xl p-1">UcodeSoft</span>
                    Personal Book Store</h1>
                <span>Buy any programming book on Rent.</span>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, nobis?</p>
            </div>
            <div class="py-2 absolute bottom-20 z-20">
                <button type="button"
                    class="px-4 py-2 font-semibold border bg-indigo-600 text-blue-50 rounded-lg flex items-center gap-2 "><span>Rent
                        Now</span>
                    <div class="pt-1">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </section>
        <section class="w-full h-full px-2 py-10 grid place-items-center space-y-8" id="category">
            <h2 class="font-bold text-3xl">Books Categories</h2>
            <div class=" flex items-center justify-center flex-wrap gap-20 p-6">
                <?php for ($row = 0; $row <= $maxCount; $row++) {
                    if (isset($image_array[$row])) {

                    ?>
                <article class="w-60 h-80 border text-center rounded-xl relative ">
                    <div class="w-full h-full rounded-xl">
                        <img src="../Image/<?php echo  $image_array[$row] ?>" alt="Book1" class="w-full h-full object-cover rounded-xl">
                        <?php } if (isset($category_array[$row])) { ?>
                        </div>
                        <h2 class="font-bold text-2xl"><?php echo $category_array[$row];  ?></h2>
                        <a href="categories_books.php?book_category=<?php echo $category_array[$row]; ?>" class=" absolute inset-0 z-10"></a>
                    
                </article>
                <?php } } ?>
                
            </div>
        </section>
        <section class="w-full h-full grid place-items-center py-16 px-6 mt-12 bg-slate-50 space-y-6">
            <h2 class="font-bold text-3xl">User Reviews</h2>
            <div class=" overflow-x-scroll flex items-center justify-self-center gap-4 p-4">
            <article class="w-full h-full border rounded-xl flex flex-col justify-center px-5 py-8 space-y-3 bg-slate-100 relative">
                <div class="h-full">
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem provident dolor eius est vel atque amet aut voluptatibus reiciendis voluptatum fuga tenetur quaerat dolores enim nostrum, sed ab quisquam veritatis cum. Eaque quaerat fugit sapiente.</h3>
                </div>
                <span class="absolute bottom-0 right-0 px-4 py-1">---- by <i class="font-bold">Raj Kumar</i></span>
                </article>
            
            <article class="w-full h-full border rounded-xl flex flex-col justify-center px-5 py-8 space-y-3 bg-slate-100 relative">
                <div class="h-full">
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem provident dolor eius est vel atque amet aut voluptatibus reiciendis voluptatum fuga tenetur quaerat dolores enim nostrum, sed ab quisquam veritatis cum. Eaque quaerat fugit sapiente.</h3>
                </div>
                <span class="absolute bottom-0 right-0 px-4 py-1">---- by <i class="font-bold">Raj Kumar</i></span>
            </article>
            <article class="w-full h-full border rounded-xl flex flex-col justify-center px-5 py-8 space-y-3 bg-slate-100 relative">
                <div class="h-full">
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem provident dolor eius est vel atque amet aut voluptatibus reiciendis voluptatum fuga tenetur quaerat dolores enim nostrum, sed ab quisquam veritatis cum. Eaque quaerat fugit sapiente.</h3>
                </div>
                <span class="absolute bottom-0 right-0 px-4 py-1">---- by <i class="font-bold">Raj Kumar</i></span>
            </article>
        </div>
        </section>
    </main>

    <footer class="w-full h-full px-6  bg-slate-900 text-white">
        <div class="px-2 py-16">
            <svg class="w-10 h-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" version="1.1"
                viewBox="0 0 512 512" fill="currentColor">
                <path
                    d="M128,204.6666718C145.0624084,136.2265015,187.7375946,102,256,102c102.3999939,0,115.2000122,77,166.3999939,89.8333282c34.1376038,8.5598297,64-4.2734985,89.6000061-38.5C494.9375916,221.7734985,452.2623901,256,384,256c-102.3999939,0-115.2000122-77-166.3999939-89.8333282C183.4624023,157.606842,153.6000061,170.4401703,128,204.6666718z M0,358.6666565C17.0623989,290.2265015,59.7375984,256,128,256c102.3999939,0,115.1999969,77,166.3999939,89.8333435c34.1376038,8.5598145,64-4.2734985,89.6000061-38.5C366.9375916,375.7734985,324.2623901,410,256,410c-102.3999939,0-115.1999969-77-166.3999939-89.8333435C55.4624023,311.606842,25.6000004,324.440155,0,358.6666565z">
                </path>
            </svg>
        </div>
        <ul class=" w-full flex gap-2 max-w-7xl flex-wrap">
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Solutions</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Marketing</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Analytics</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Support</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Pricing</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Analytics</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Company</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">About</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Blog</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="">
                <span class="font-semibold py-2">Legal</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Claim</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Privacy</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                </ul>
            </li>
        </ul>
    </footer>

</body>

</html>