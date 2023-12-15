<?php
// include 'database_connection.php';


/**
 * trait errorhandler
 *
 * This is a brief description of the errorhandler class.
 * This class is used to for book payment after the order is done
 */
trait errorhandler
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $value The is used to check the data is in format or not
     * @return bool Returns true if the data is inserted successfully, otherwise false.
     */
    public function name_validation(string $value): bool|string
    {
        $len = strlen($value);
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $err = "Invalid";
            return $err;
        } elseif ($len > 2 && $len < 45) {
            return false;
        }
        $err = "Invalid";
        return $err;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $value The is used to check the data is in format or not
     * @return string Returns true if the data is inserted successfully, otherwise false.
     */
    public function email_match(mixed $value): string
    {
        $err = '';
        $emailpattern = "^[_a-z0-9]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (!preg_match($emailpattern, $value)) {
            $err = "Invalid";
        }
        return $err;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $value The is used to check the data is in format or not
     * @return string Returns true if the data is inserted successfully, otherwise false.
     */
    public function validation_password(mixed $value): string
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

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $value The is used to check the data is in format or not
     * @return string Returns string if the data is matched with the condition, otherwise false.
     */
    public function check_empty(mixed $value): string
    {
        $err = "";
        if (empty($value)) {
            $err = "Invalid";
            return $err;
        }
        return $err;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $user_card_expiration_date The is used to check the expiry date and also checks it is empty or not
     * @return string Returns string if the data is matched with the condition, otherwise false.
     */
    public function card_expiry_check(string $user_card_expiration_date): string
    {
        $current_month = date("m");
        $current_year = date("Y");
        if (!empty($user_card_expiration_date)) {
            $expiry = explode("-", $user_card_expiration_date);
            $expiry_year = $expiry[0];
            $expiry_month = $expiry[1];
        } else {
            $errmsg = "Invalid";
            $expiry_month = $expiry_year = '';
        }

        if ((($current_month <= $expiry_month) && ($current_year <= $expiry_year)) || (($current_month <= $expiry_month) || ($current_year < $expiry_year))) {
            $errmsg = '';
        } else {
            $errmsg = "Invalid";
        }
        return $errmsg;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $book_image The is used to check the image is empty or not
     * @param mixed $id The is used to for updating image
     * @return string Returns string if the data is matched with the condition, otherwise false.
     */
    public function image_validation(mixed $book_image, mixed $id): string|array
    {
        $err_image = '';
        $imageerror = isset($book_image['error']) ? $book_image['error'] : '';

        if ($imageerror == UPLOAD_ERR_OK) {
            $extension = ["jpg", "png", "jpeg"];
            $ext = pathinfo($book_image["name"], PATHINFO_EXTENSION);

            if (in_array($ext, $extension)) {
                return array($ext);

            } else {
                $err_image = "Only jpg & png files are allowed";
                return $err_image;
            }
        } else {
            if ($id == null) {
                $errmsg = "Please select image";
                return $errmsg;
            }
        }
        return $err_image;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the data is in format or not.
     * @param mixed $value The is used to check the data length is equal to 10 or not
     * @param mixed $value_length This is used to assign the length of value
     * @return string Returns string if the data is matched with the condition, otherwise false.
     */
    public function phone_length(mixed $value, int $value_length): string|bool
    {
        $length = strlen($value);
        $err = is_numeric($value) ? '' : 'Invalid';
        if ($length != $value_length) {
            $err = "Invalid";
        }
        return $err;
    }
}


/**
 * class admin_data_validation
 *
 * This is a brief description of the admin_data_validation class.
 * This class is used for checking validation of form
 */
class admin_data_validation
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    use errorhandler;
    public $name, $email, $password, $occupation, $phone_number, $login_email, $login_password, $book_category_name, $book_name, $author_name, $book_copies, $book_image, $category_image, $user_gender, $user_address, $book_return_date, $book_price, $book_description;
    public $user_adress, $user_state, $user_city, $user_postal_code, $user_name_on_card, $user_card_number, $user_card_expiration_date, $user_card_cvc, $user_payment_method, $review, $user_review, $select_to_cart, $days_charges, $advance_charges, $new_password, $confirm_password;

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the registeration validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function registeration_data_validation()
    {
        $submitname = $submitemail = $submitpassword = $submitphone_number = $submitoccupation = $submit_user_gender = $submit_address = '';
        if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['phone_number']) || !empty($_POST['occupation']) || !empty($_POST['gender']) || !empty($_POST['address'])) {
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
        return array($submitname, $submitemail, $submitpassword, $submitphone_number, $submitoccupation, $submit_user_gender, $submit_address);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the login validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function login_data_validation()
    {
        $submit_login_email = $submit_login_password = '';
        if (!empty($_POST['login_email']) || !empty($_POST['login_password'])) {
            $this->login_email = (isset($_POST['login_email'])) ? $_POST['login_email'] : '';
            $submit_login_email = $this->login_email;
            $this->login_password = (isset($_POST['login_password'])) ? $_POST['login_password'] : '';
            $submit_login_password = $this->login_password;
        }
        return array($submit_login_email, $submit_login_password);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the book validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function books_data_validation()
    {
        // Add Books
        $submit_book_category_name = $submit_book_name = $submit_author_name = $submit_book_copies = $submit_book_image = $submit_book_price = $submit_book_description = '';
        if (!empty($_POST['category_name']) || !empty($_POST['book_name']) || !empty($_POST['author_name']) || !empty($_POST['copies']) || isset($_FILES['book_image']) || !empty($_POST['book_price']) || !empty($_POST['description'])) {
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
        return array($submit_book_category_name, $submit_book_name, $submit_author_name, $submit_book_copies, $submit_book_price, $submit_book_description, $submit_book_image);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the category validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function category_data_validation()
    {
        // Category_name
        $submit_category_image = $submit_select_to_cart = $submit_days_charges = '';
        if (isset($_FILES['category_image'])) {
            $this->category_image = (isset($_FILES['category_image'])) ? $_FILES['category_image'] : '';
            $submit_category_image = $this->category_image;
        }
        return array($submit_category_image);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the book returning date validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function return_data_validation()
    {
        $submit_book_return_date = '';
        if (isset($_POST['return_date'])) {
            $this->book_return_date = $_POST['return_date'];
            $submit_book_return_date = $this->book_return_date;
        }
        return array($submit_book_return_date);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the shipping data validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function shipping_data_validation()
    {
        $submit_user_state = $submit_user_city = $submit_user_postal_code = $submit_days_charges = '';
        if (!empty($_POST['state']) || !empty($_POST['city']) || !empty($_POST['postal_code']) || !empty($_POST['days_charges'])) {
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
        return array($submit_user_state, $submit_user_city, $submit_user_postal_code, $submit_days_charges);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the payment validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function payment_data_validation()
    {
        $submit_user_name_on_card = $submit_user_card_number = $submit_user_card_expiration_date = $submit_user_card_cvc = '';
        if (!empty($_POST['name_on_card']) || !empty($_POST['card_number']) || !empty($_POST['card_expiration_date']) || !empty($_POST['cvc']) || !empty($_POST['charges'])) {
            $this->user_name_on_card = $_POST['name_on_card'];
            $submit_user_name_on_card = $this->user_name_on_card;
            $this->user_card_number = $_POST['card_number'];
            $submit_user_card_number = $this->user_card_number;
            $this->user_card_expiration_date = $_POST['card_expiration_date'];
            $submit_user_card_expiration_date = $this->user_card_expiration_date;
            $this->user_card_cvc = $_POST['cvc'];
            $submit_user_card_cvc = $this->user_card_cvc;
        }
        return array($submit_user_name_on_card, $submit_user_card_number, $submit_user_card_expiration_date, $submit_user_card_cvc);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the user review validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function user_review_validation()
    {
        $submit_review = $submit_user_review = '';
        if (!empty($_POST['user_review']) || !empty($_POST['review'])) {
            $this->user_review = isset($_POST['user_review']) ? $_POST['user_review'] : '';
            $submit_user_review = $this->user_review;
            $this->review = isset($_POST['review']) ? $_POST['review'] : '';
            $submit_review = $this->review;
        }
        return array($submit_user_review, $submit_review);
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is to check the forget password validation and it also checks to ensure the data is in the correct format and may be used for form submissions and validation purposes.
     * @uses errorhandler The error handler class is used for handling errors during validation.
     * @return array Returns an array containing validation results.
     **/
    public function forget_password_validation()
    {
        $submit_new_password = $submit_confirm_password = '';
        if (isset($_POST["new_password"]) && isset($_POST["confirm_password"])) {
            $this->new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
            $submit_new_password = $this->new_password;
            $this->confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
            $submit_confirm_password = $this->confirm_password;
        }
        return array($submit_new_password, $submit_confirm_password);
    }
}

$admin_entered_details = new admin_data_validation();

$registeration_data_validation = $admin_entered_details->registeration_data_validation();
$login_data_validation = $admin_entered_details->login_data_validation();
$books_data_validation = $admin_entered_details->books_data_validation();
$category_data_validation = $admin_entered_details->category_data_validation();
$return_data_validation = $admin_entered_details->return_data_validation();
$shipping_data_validation = $admin_entered_details->shipping_data_validation();
$payment_data_validation = $admin_entered_details->payment_data_validation();
$user_review_validation = $admin_entered_details->user_review_validation();
$forget_password_validation = $admin_entered_details->forget_password_validation();

$name = $email = $password = $phone_number = $occupation = '';
$err_name = $err_email = $err_password = $err_phone_number = $err_occupation = $err_login_email = $err_login_password = $errmsg = null;

if (!empty($registeration_data_validation)) {
    $name = $registeration_data_validation[0];
    $email = $registeration_data_validation[1];
    $password = $registeration_data_validation[2];
    $phone_number = $registeration_data_validation[3];
    $occupation = $registeration_data_validation[4];
    $gender = $registeration_data_validation[5];
    $address = $registeration_data_validation[6];
}

if (!empty($login_data_validation)) {
    $login_email = $login_data_validation[0];
    $login_password = $login_data_validation[1];
}

if (!empty($books_data_validation)) {
    $category_name = $books_data_validation[0];
    $book_name = strtolower($books_data_validation[1]);
    $author_name = $books_data_validation[2];
    $book_copies = $books_data_validation[3];
    $book_price = $books_data_validation[4];
    $book_description = $books_data_validation[5];
    $book_image = $books_data_validation[6];
}

if (!empty($category_data_validation)) {
    $category_image = $category_data_validation[0];
}

if (!empty($return_data_validation)) {
    $book_return_date = $return_data_validation[0];
}

if (!empty($shipping_data_validation)) {
    $user_state = $shipping_data_validation[0];
    $user_city = $shipping_data_validation[1];
    $user_postal_code = $shipping_data_validation[2];
    $book_rented_days_charges = $shipping_data_validation[3];
}

if (!empty($payment_data_validation)) {
    $user_name_on_card = $payment_data_validation[0];
    $user_card_number = $payment_data_validation[1];
    $user_card_expiration_date = $payment_data_validation[2];
    $user_card_cvc = $payment_data_validation[3];
}

if (!empty($user_review_validation)) {
    $user_rating = $user_review_validation[0];
    $user_review = $user_review_validation[1];
}

if (!empty($forget_password_validation)) {
    // $user_selected_cart_item = $registeration_data_validation[27];
    // $book_rented_days_charges = $registeration_data_validation[28];
    $new_password = $forget_password_validation[0];
    $confirm_password = $forget_password_validation[1];
}

$book_image_name = isset($book_image['name']) ? $book_image['name'] : '';

$user_password = $password;
$admin_password = $login_password;
?>