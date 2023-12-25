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

        <div class="w-12 h-12 ">
            <img src="../../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex items-center gap-2">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="../home_page">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="../categories_details/book_categories">Categories</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="../books_details/book_store">Books</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="../book_return_details/return_home_page?user_id=<?php echo $user_id ?>">User
                        Details</a></li>
                <?php if (empty($login_email)) { ?>
                    <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                            href="../user_details/add_users">Sign Up</a></li>
                <?php } ?>

            </ul>
        </nav>

        <div class="px-1 relative flex items-center gap-4">

            <a href="/phpprogramms/task7/rented_book_details/add_to_cart"
                class="p-2 border rounded-lg hover:bg-slate-100">
                <svg class="w-6 h-6  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg>
            </a>

            <button id="show_home_Btn" class=" border p-1 rounded-full shadow" data-toggle="tooltip"
                data-placement="top" title="Login">
                <?php
                if (!empty($_SESSION['login'])) {
                    $login_user_name = substr($user_name, 0, 1); ?>
                    <div
                        class="w-10 h-10 rounded-full border grid place-items-center bg-slate-200 shadow font-bold text-2xl">
                        <?php echo $login_user_name ?>
                    </div>
                <?php } else { ?>
                    <div class="p-1 border rounded-full shadow">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                            <path
                                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                            </path>
                        </svg>
                    </div>
                <?php } ?>
            </button>
            <script>
                document.getElementById('show_home_Btn').addEventListener('click', function () {
                    var box = document.getElementById('home_login');
                    box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
                });
            </script>

            <div id="home_login" class="hidden">
                <?php if (empty($login_email)) { ?>
                    <div
                        class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
                        <form action="../home_page" method="post"
                            class=" text-white font-bold text-2xl absolute top-2 right-2">
                            <button type="submit"><svg class="w-6 h-6" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                        <div class="grid place-items-center gap-4">
                            <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
                                class="w-auto p-1 border rounded-full shadow">
                                <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 496 512">
                                    <path
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                                    </path>
                                </svg>
                            </button>
                            <h2 class=" text-lg font-semibold text-white">Hello User</h2>
                            <form action="/phpprogramms/task7/user_details/user_login" method="post">
                                <button type="submit" class=" bg-slate-100 p-2 rounded-lg">Click to Login</button>
                            </form>
                        </div>
                    </div>
                <?php } else { ?>
                    <div
                        class="grid font-semibold place-items-center w-60 h-full border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-0 text-black">
                        <form action="../home_page" method="post"
                            class=" text-white font-bold text-2xl absolute top-2 right-2">
                            <button type="submit"><svg class="w-6 h-6" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                        <div class="grid place-items-center gap-4">
                            <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
                                class="w-auto p-1 border rounded-full shadow">
                                <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 496 512">
                                    <path
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                                    </path>
                                </svg>
                            </button>
                            <h2 class=" text-lg font-semibold text-white">Hello User</h2>
                            <div class="grid gap-4 place-items-center">
                                <form
                                    action="/phpprogramms/task7/user_details/update_users_data?user_id=<?php echo $user_id ?>"
                                    method="post" class="w-full bg-slate-200 p-2 rounded-lg hover:bg-slate-50">
                                    <button type="submit">Update Your Account</button>
                                </form>
                                <form action="/phpprogramms/task7/user_details/user_review" method="post"
                                    class="w-full bg-slate-200 p-2 rounded-lg text-center hover:bg-slate-50">
                                    <button type="submit">Send Feedback</button>
                                </form>
                                <button id="delete_user_btn"
                                    class=" text-center bg-slate-200 p-2 rounded-lg hover:bg-slate-50">Delete Your
                                    Account</button>
                                <script>
                                    document.getElementById('delete_user_btn').addEventListener('click', function () {
                                        var box = document.getElementById('user_delete');
                                        box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
                                    });
                                </script>

                                <div id="user_delete" class="hidden">
                                    <div
                                        class="w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
                                        <form action="../home_page" method="post" class="w-80 h-36 ">
                                            <div
                                                class="grid font-semibold place-items-center w-full h-full border rounded-xl py-2 shadow z-20 bg-white text-black relative">
                                                <button type="submit"><span
                                                        class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
                                                        <svg class="w-6 h-6" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
                                                            </path>
                                                        </svg>
                                                    </span></a>
                                        </form>
                                        <form action="../user_details/lock_user?email=<?php echo $login_email ?>"
                                            method="post">
                                            <div class="grid place-items-center gap-4 pb-2">
                                                <h2 class="px-6 font-semibold pt-3 text-black text-center">Are you sure u
                                                    want
                                                    to delete this account</h2>
                                                <button type="submit"><span
                                                        class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <button id="logout_btn"
                                    class="w-full text-center bg-slate-200 p-2 rounded-lg hover:bg-slate-50"
                                    name="logout">Click to Logout</button>

                                <script>
                                    document.getElementById('logout_btn').addEventListener('click', function () {
                                        var box = document.getElementById('user_logout');
                                        box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
                                    });
                                </script>
                                <div id="user_logout" class="hidden">
                                    <div
                                        class="w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
                                        <form action="../home_page" method="post" class="w-80 h-36 ">
                                            <div
                                                class="grid font-semibold place-items-center w-full h-full border rounded-xl py-2 shadow z-20 bg-white text-black relative">
                                                <button type="submit"><span
                                                        class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
                                                        <svg class="w-6 h-6" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
                                                            </path>
                                                        </svg>
                                                    </span></a>
                                        </form>
                                        <form action="../user_details/user_logout?logout_email=<?php echo $login_email ?>"
                                            method="post">
                                            <div class="grid place-items-center gap-4 pb-2">
                                                <h2 class="px-6 font-semibold pt-3 text-black text-center">Are you sure u
                                                    want to logout</h2>
                                                <button type="submit"><span
                                                        class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>