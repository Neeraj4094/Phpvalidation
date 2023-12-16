<?php

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

// function home_header(){}
$cancel_login = $user_details = '';
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["login_page"]))) {
    $user_details = (empty($login_email)) ?
        ('<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="../home_page"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
        </span></a>
        <div class="grid place-items-center gap-4">
        <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                    d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                </path>
            </svg>
            </button>
            <h2 class=" text-lg font-semibold text-white">Hello User</h2>
        <a href="/phpprogramms/task7/user_details/user_login" class=" bg-slate-100 p-2 rounded-lg">Click to Login</a>
        </div>
        </div>')
        :
        ('<div class="grid font-semibold place-items-center w-60 h-full border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="../home_page"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
        </span></a>
            <div class="grid place-items-center gap-4">
                <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
                <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                    <path
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                    </path>
                </svg>
                </button>
                <h2 class=" text-lg font-semibold text-white">Hello User</h2>
                <div class="grid gap-4">
                <a href="/phpprogramms/task7/user_details/update_users_data?email=' . $login_email . '" class=" bg-slate-100 p-2 rounded-lg">Update Your Account</a>
                <a href="/phpprogramms/task7/user_details/user_review" class=" bg-slate-100 p-2 rounded-lg text-center">Send Feedback</a>
                <a href="/phpprogramms/task7/user_details/lock_user?email=' . $login_email . '" class=" text-center bg-slate-100 p-2 rounded-lg">Delete Your Account</a>
                <a href="/phpprogramms/task7/user_details/user_logout" class=" text-center bg-slate-100 p-2 rounded-lg">Click to Logout</a>
                </div>
            </div>
        </div>
        
        ');


}

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
$user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';

if (!empty($_SESSION['login'])) {
    $login_user_name = substr($user_name, 0, 1);
    $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
    class="p-1 border rounded-full shadow"><div class="w-10 h-10 rounded-full border grid place-items-center bg-slate-200 shadow font-bold text-2xl">' .
        $login_user_name .
        '</div></button>';
} else {
    $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
    class="p-1 border rounded-full shadow">
    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
        <path
            d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
        </path>
    </svg>
    </button>';
}

if (isset($_POST['search'])) {
    $search = strtolower($_POST['search']);
}