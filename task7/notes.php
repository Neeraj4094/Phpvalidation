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
    //add radio button for choosing plan for days in buy_books.php
    //encrypt payment card number
    //handle payment option and show error if already show
    //password not show in update admin data
    //if user has already purchase the book then show an error
    //half payment advance
    //mistake in add to cart
    names of pages
    set link of anchor in header
    using of foreach more times in payment successfull message
    add session['admin']
    auto complete when submit
    show user to update data
    
    //admin
    //user
    //router
    //add column "book_id" in rented_book table for checking double entry
    //Password hash
    //timing of return and if late send a mail to user
    //Add rounter and make a class of authentication and handle errors whenever edit , update are used
    //**add checkbox in add to cart
    //out of stock
    //forget password
    //book already exist
    //handle ordering books (buy_books.php)
    //add a modal for showing fine details
    set router paths and specially for values passed in url
    ********** add comments in all files
    add remove button for ordering book through cart
    remove classes of validation 
    add are you sure u want to delete
    remove nested if
    add mysqli_num_rows in sql syntax
    pagination


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