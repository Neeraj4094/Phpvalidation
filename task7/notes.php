<!--
    //books price & description
    //class of crud
    //convert dbname to tablename
    //label should be used in the form
    //* if (empty($book_image_name)) { if (!empty($id)) { $book_image_name = $fetch_book_image_name; }
    //use if ($_SERVER["REQUEST_METHOD"] == "POST") in all form
    //use js for show boxes
    search
    remove isset from validation
    //remove class of validation for isset or empty
    //do not delete user, show active/ in-active
    //lock user and can't login again
    //Category db
    names of pages
    set link of anchor in header
    add radio button for choosing plan for days in buy_books.php
    using of foreach more times in payment successfull message
    encrypt payment card number
    handle payment option and show error if already show
    mistake in add to cart
    half payment advance
    add session['admin']
    password not show in update admin data
    if user has already purchase the book then show an error
    auto complete when submit
    
    //admin
    //user
    //router
    //add column "book_id" in rented_book table for checking double entry
    **add checkbox in add to cart
    Password hash
    forget password
    timing of return and if late send a mail to user
    Add rounter and make a class of authentication and handle errors whenever edit , update are used
    handle copies of books
    set router paths and specially for values passed in url
    book already exist
    ********** add comments in all files
    handle ordering books
    add remove button for ordering book through cart
    add a modal for showing fine details
}
 -->

 
 <?php


$users = [
    [
        'id' => 1,
        'name' => 'sajal'
    ],
    [
        'id' => 2,
        'name' => 'eeraj'
        ]
    ];
    
$books = [
    [
        'userid' => 1,
        'book' => 'abc',
    ],
    [
        'userid' => 1,
        'book' => 'xyz',
    ],
    [
        'userid' => 2,
        'book' => 'mno',
        ]
    ];
        
$maxCount = max(count($users), count($books));


for ($row = 0; $row <= $maxCount; $row++) {
    // echo $row;
    echo "<pre>";
    // print_r($image_array);
    if (isset($users[$row])) {
        print_r( $users[$row]);
    }


    if (isset($books[$row])) {
        print_r($books[$row]);
    }
    echo "</pre>";
}
?>