<?php
// include 'database_connection.php';

trait errorhandler
{
    // Name
    public function name_validation($value, $err = null)
    {
        $len = strlen($value);
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $err = "Invalid";
            
        } elseif ($len > 2 && $len < 45) {
            return false;
        } else {
            $err = "Invalid";
        }
        return $err;
    }

    // Email
    public function email_match($value, $err = null)
    {
        $emailpattern = "^[_a-z0-9]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (!preg_match($emailpattern, $value)) {
            $err = "Invalid";
            return $err;
        }
    }

    // Password
    public function validation_password($value, $err = null, $passlength = null, $ucase = null, $lcase = null, $passnumber = null, $spchar = null)
    {
        $passlength = strlen($value);
        $ucase = preg_match('@[A-Z]@', $value);
        $lcase = preg_match('@[a-z]@', $value);
        $passnumber = preg_match('@[0-9]@', $value);
        $spchar = preg_match('@[^\w]@', $value);

        if ($passlength >= 8 && $ucase && $lcase && $passnumber && $spchar && !empty($value)) {
            return false;
        }
        $err = "Must use Upper & lower case letters, number & Special character";
        return $err;
    }

    // Empty
    public function emp($value, $err = null)
    {
        if (empty($value)) {
            $err = "Invalid";
            return $err;
        }
    }
    // Phone Number
    public function card_expiry_check($user_card_expiration_date, $err = null , $length=null){
        $current_month = date("m");
        $current_year = date("Y");
        if(!empty($user_card_expiration_date)){
            $expiry = explode("-", $user_card_expiration_date);
            $expiry_year = $expiry[0];
            $expiry_month = $expiry[1];
        }else{
            $errmsg = "Invalid";
            $expiry_month = $expiry_year = '';
        }

        if((($current_month <= $expiry_month) && ($current_year <= $expiry_year)) || (($current_month <= $expiry_month) || ($current_year < $expiry_year))){
            $errmsg = '';
        }else{
            $errmsg = "Invalid";
        }
        return $errmsg;
    }

    public function image_validation($book_image,$id,$err_image = null){
        $imageerror = isset($book_image['error']) ? $book_image['error'] : '';

        if ($imageerror == UPLOAD_ERR_OK) {
            $extension = ["jpg", "png", "jpeg"];
            $ext = pathinfo($book_image["name"], PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                return array($ext);
                // $err_image = '';
                // $book_unique_image_name = uniqid("Img-", true) . '.' . $ext;
                // $upload = "../../Image/" . $book_unique_image_name;
                // if (move_uploaded_file($book_image["tmp_name"], $upload)) {
                    
                    
                    
                //     if($id == null){
                //         array_push($book_details_array, $book_unique_image_name);
                //         $sendtodb->insertindb('books_details', $book_column, $book_details_array, $conn); // Sending image data on db
                        
                //         header('location: ./books_dashboard.php');
                //         return false;
                //     }else{
                //         $book_details_array[count($book_details_array)-1] = $book_unique_image_name;
                //                     $update =$sendtodb->update_to_tb('books_details',$book_column,$book_details_array,'book_id',$id,$conn);
                //                     if(!$update){
                //                         echo "Error: " . mysqli_error($conn);
                //                     }
                //                     return false;
                //                 }
                // } else {
                //     echo "Error: " . mysqli_error($conn);
                // }
            } else {
                $err_image = "Only jpg & png files are allowed";
                return $err_image;
            }
        }else{
            if($id == null){
            $errmsg = "Please select image";
            return $errmsg;
            }
        }
    }

    public function phone_length($value,$value_length){
        $length = strlen($value);
        $err = is_numeric($value) ? '' : 'Invalid';
        if($length != $value_length){
            $err = "Invalid";
        }
        return $err;
    }
}

class admin_data_validation{
    use errorhandler;
    public $name, $email , $password, $occupation, $phone_number,$login_email,$login_password, $book_category_name,$book_name,$author_name,$book_copies,$book_image,$category_image,$user_gender,$user_address,$book_return_date,$book_price,$book_description;
    public $user_adress,$user_state,$user_city,$user_postal_code,$user_name_on_card,$user_card_number,$user_card_expiration_date,$user_card_cvc,$user_payment_method,$review,$user_review,$select_to_cart,$days_charges,$advance_charges,$new_password,$confirm_password;
    public function admin_data_validation(){
        $submitname = $submitemail = $submitpassword= $submitphone_number = $submitoccupation= $submit_login_email = $submit_login_password = $submit_user_gender = $submit_address ='';
        if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['phone_number']) || !empty($_POST['occupation']) || !empty($_POST['gender']) || !empty($_POST['address'])){
            $this->name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $submitname = $this->name;
            $this->email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $submitemail = $this->email;
            $this->password = (isset($_POST['password'])) ? $_POST['password'] : '';
            $submitpassword = $this->password;
            $this->phone_number = (isset($_POST['phone_number'])) ? $_POST['phone_number'] : '';
            $submitphone_number = $this->phone_number;
            $this->occupation = (isset($_POST['occupation'])) ? $_POST['occupation'] : '';
            $submitoccupation = $this->occupation;
            $this->user_gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
            $submit_user_gender = $this->user_gender;
            $this->user_address = (isset($_POST['address'])) ? $_POST['address'] : '';
            $submit_address = $this->user_address;

        }

        // Login
        if(!empty($_POST['login_email']) || !empty($_POST['login_password'])){
        $this->login_email = (isset($_POST['login_email'])) ? $_POST['login_email'] : '';
        $submit_login_email = $this->login_email;
        $this->login_password = (isset($_POST['login_password'])) ? $_POST['login_password'] : '';
        $submit_login_password = $this->login_password;
        }

        // Add Books
        $submit_book_category_name= $submit_book_name = $submit_author_name = $submit_book_copies =$submit_book_image = $submit_book_price = $submit_book_description = $submit_advance_charges = '';
        if(!empty($_POST['category_name']) || !empty($_POST['book_name']) || !empty($_POST['author_name']) || !empty($_POST['copies']) || isset($_FILES['book_image']) || !empty($_POST['book_price']) || !empty($_POST['description'])){
            $this->book_category_name = (isset($_POST['category_name'])) ? $_POST['category_name'] : '';
            $submit_book_category_name = $this->book_category_name;
            $this->book_name = (isset($_POST['book_name'])) ? $_POST['book_name'] : '';
            $submit_book_name = $this->book_name;
            $this->author_name = (isset($_POST['author_name'])) ? $_POST['author_name'] : '';
            $submit_author_name = $this->author_name;
            $this->book_copies = (isset($_POST['copies'])) ? $_POST['copies'] : '';
            $submit_book_copies = $this->book_copies;
            $this->book_price = (isset($_POST['book_price'])) ? $_POST['book_price'] : '';
            $submit_book_price = $this->book_price;
            $this->book_description = (isset($_POST['description'])) ? $_POST['description'] : '';
            $submit_book_description = $this->book_description;
            
            $this->book_image = (isset($_FILES['book_image'])) ? $_FILES['book_image'] : '';
            $submit_book_image = $this->book_image;
        }

        // Category_name
        $submit_category_image = $submit_book_return_date = $submit_user_adress =$submit_user_state= $submit_user_city = $submit_user_postal_code= $submit_user_name_on_card = $submit_user_card_number = $submit_user_card_expiration_date = $submit_user_card_cvc = $submit_review = $submit_user_review = $submit_select_to_cart = $submit_days_charges = $submit_new_password = $submit_confirm_password = '';
        if(isset($_FILES['category_image'])){
            $this->category_image = (isset($_FILES['category_image'])) ? $_FILES['category_image'] : '';
            $submit_category_image = $this->category_image;
        }

        if(isset($_POST['return_date'])){
        $this->book_return_date = $_POST['return_date'];
        $submit_book_return_date = $this->book_return_date;
        }

        if(!empty($_POST['state']) || !empty($_POST['city']) || !empty($_POST['postal_code']) || !empty($_POST['days_charges'])){
        // $this->user_adress = $_POST['address'];
        // $submit_user_adress = $this->user_adress;
        $this->user_state = $_POST['state'];
        $submit_user_state = $this->user_state;
        $this->user_city = $_POST['city'];
        $submit_user_city = $this->user_city;
        $this->user_postal_code = $_POST['postal_code'];
        $submit_user_postal_code = $this->user_postal_code;
        $this->days_charges = isset($_POST['days_charges']) ? $_POST['days_charges'] : '';
        $submit_days_charges = $this->days_charges;
        }

        if(!empty($_POST['name_on_card']) || !empty($_POST['card_number']) || !empty($_POST['card_expiration_date']) || !empty($_POST['cvc']) || !empty($_POST['charges'])){
        $this->user_name_on_card = $_POST['name_on_card'];
        $submit_user_name_on_card = $this->user_name_on_card;
        $this->user_card_number = $_POST['card_number'];
        $submit_user_card_number = $this->user_card_number;
        $this->user_card_expiration_date = $_POST['card_expiration_date'];
        $submit_user_card_expiration_date = $this->user_card_expiration_date;
        $this->user_card_cvc = $_POST['cvc'];
        $submit_user_card_cvc = $this->user_card_cvc;
        }

        if(!empty($_POST['user_review']) || !empty($_POST['review'])){
            $this->user_review = isset($_POST['user_review']) ? $_POST['user_review'] : '';
            $submit_user_review = $this->user_review;
            $this->review = isset($_POST['review']) ? $_POST['review'] : '';
            $submit_review = $this->review;
        }

        if(!empty($_POST['select_to_cart'])){
            $cart = $_POST['select_to_cart'];
            foreach($cart as $cart_item){
            $this->select_to_cart[] = $cart_item;
            $submit_select_to_cart = $this->select_to_cart;
            }
        }

        if(isset($_POST["new_password"]) && isset($_POST["confirm_password"])){
            $this->new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
            $submit_new_password = $this->new_password;
            $this->confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
            $submit_confirm_password = $this->confirm_password;
        }

        return array($submitname,$submitemail,$submitpassword,$submitphone_number,$submitoccupation,$submit_login_email,$submit_login_password,$submit_book_category_name,$submit_book_name,$submit_author_name,$submit_book_copies,$submit_book_image,$submit_category_image,$submit_user_gender,$submit_address,$submit_book_return_date,$submit_book_price,$submit_book_description,$submit_user_state,$submit_user_city,$submit_user_postal_code,$submit_user_name_on_card,$submit_user_card_number,$submit_user_card_expiration_date,$submit_user_card_cvc,$submit_review,$submit_user_review,$submit_select_to_cart,$submit_days_charges,$submit_new_password,$submit_confirm_password);
    }
}

$admin_entered_details = new admin_data_validation();

$resultofform = $admin_entered_details->admin_data_validation();

$name = $email = $password = $phone_number = $occupation = '';
$err_name = $err_email = $err_password = $err_phone_number = $err_occupation = $err_login_email = $err_login_password = $errmsg = null;

if(!empty($resultofform)){
    $name = $resultofform[0];
    $email = $resultofform[1];
    $password = $resultofform[2];
    $phone_number = $resultofform[3];
    $occupation = $resultofform[4];

    $login_email = $resultofform[5];
    $login_password = $resultofform[6];

    $category_name = $resultofform[7];
    $book_name = strtolower($resultofform[8]);
    $author_name = $resultofform[9];
    $book_copies = $resultofform[10];
    $book_image = $resultofform[11];
    $category_image = $resultofform[12];
    $gender = $resultofform[13];
    $address = $resultofform[14];
    $book_return_date = $resultofform[15];
    $book_price = $resultofform[16];
    $book_description = $resultofform[17];
    $user_state = $resultofform[18];
    $user_city = $resultofform[19];
    $user_postal_code = $resultofform[20];
    $user_name_on_card = $resultofform[21];
    $user_card_number = $resultofform[22];
    $user_card_expiration_date = $resultofform[23];
    $user_card_cvc = $resultofform[24];
    $user_rating = $resultofform[25];
    $user_review = $resultofform[26];
    $user_selected_cart_item = $resultofform[27];
    $book_rented_days_charges = $resultofform[28];
    $new_password = $resultofform[29];
    $confirm_password = $resultofform[30];
    $book_image_name = isset($book_image['name']) ? $book_image['name'] : '';
}
$user_password = $password;
$admin_password = $login_password;
?>