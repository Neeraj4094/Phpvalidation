<?php
include 'home_header_validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="w-full p-2 px-4 flex justify-between items-center border shadow bg-white ">
    <!-- <div class="flex gap-4 items-center"> -->
        <div class="w-12 h-12 ">
            <img src="../../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex items-center gap-2">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="../home_page">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="../categories_details/book_categories">Categories</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="../books_details/book_store">Books</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="../book_return_details/return_home_page?email=<?php echo $login_email ?>">User
                        Details</a></li>
                        <?php if(empty($login_email)){ ?>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="../user_details/user_login.php">Sign Up</a></li>
                        <?php } ?>

            </ul>
        </nav>
    <!-- </div> -->
        <div class="px-1 relative flex items-center gap-4">
            <!-- <form action="" method="post" class="flex items-center gap-1 relative">
                <input type="search" name="search" id="search"
                    class="border shadow rounded-lg outline-none p-2 w-96" placeholder="Search...">
                <button type="submit"
                    class="p-2 pt-3 bg-slate-50 border rounded-r-lg absolute right-0 top-0">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                        </path>
                    </svg>
                </button>
            </form> -->
            <a href="/phpprogramms/task7/rented_book_details/add_to_cart" class="p-2 border rounded-lg hover:bg-slate-100">
                <svg class="w-6 h-6  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg>
            </a>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <?php echo $login_image ?>
            </form>

            <?php echo $user_details ?>
        </div>
</div>
</body>
</html>