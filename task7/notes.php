<!--
    Category db
    books price & description
    admin
    user
    router
    class of crud
    convert dbname to tablename
    search
    label should be used in the form
    remove isset from validation
    remove class of validation for isset or empty
    * if (empty($book_image_name)) {
        if (!empty($id)) {
            $book_image_name = $fetch_book_image_name;
        }
    names of pages
    Password hash
    use if ($_SERVER["REQUEST_METHOD"] == "POST") in all form
    add column "book_id" in rented_book table for checking double entry
    forget password
    use js for show boxes
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