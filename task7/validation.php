<?php
include 'database_connection.php';

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
        } else {
            $err = "Must use Upper & lower case letters, number & Special character";
            return $err;
        }
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
    public function phone_length($value, $err = null , $length=null){
        $length = strlen($value);
        if($length != 10){
            $err = "Invalid";
        }
        return $err;
    }

    public function image_validation($book_image,$conn,$sendtodb,$book_details_array,$book_name_array,$id){
        $imageerror = isset($book_image['error']) ? $book_image['error'] : '';
        $book_name = isset($book_details_array[0])?$book_details_array[0] : '';
        $author_name = isset($book_details_array[1])?$book_details_array[1] : '';
        $category_name = isset($book_details_array[2])?$book_details_array[2] : '';
        $book_copies = isset($book_details_array[3])?$book_details_array[3] : '';
        $book_image_name = isset($book_details_array[4])?$book_details_array[4] : '';
        

        date_default_timezone_set('UTC');
        if ($imageerror == UPLOAD_ERR_OK) {
            $extension = ["jpg", "png", "jpeg"];
            $ext = pathinfo($book_image["name"], PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {

                $err_image = '';
                $book_unique_image_name = uniqid("Img-", true) . '.' . $ext;
                $upload = "../../Image/" . $book_unique_image_name;
                if (move_uploaded_file($book_image["tmp_name"], $upload)) {
                    
                        $created_date = date("Y-m-d H:i:s A");  //Created Date
                        $modified_date = date("Y-m-d H:i:s A");  // Modified Date

                                if($id == null){
                                    $book_column = ['book_name', 'book_author', 'book_category','book_copies','book_unique_image_name', 'book_image_name','created_date', 'modified_Date'];
                                    $book_column_data = [$book_name, $author_name, $category_name,$book_copies,$book_unique_image_name,$book_image_name,$created_date,$modified_date];
                                    $sendtodb->insertindb('books_details', $book_column, $book_column_data, $conn); // Sending image data on db
                                    header('location: ./books_dashboard.php');
                                    return false;
                                }else{
                                    $update_book_column = ['book_name', 'book_author', 'book_category','book_copies','book_unique_image_name', 'book_image_name','modified_Date'];
                                    $update_book_column_data = [$book_name, $author_name, $category_name,$book_copies,$book_unique_image_name,$book_image_name,$modified_date];
                                    $update =$sendtodb->update_to_tb('books_details',$update_book_column,$update_book_column_data,'book_id',$id,$conn);
                                    if(!$update){
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                    header('location: ./books_dashboard.php');
                                    return false;
                                }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                $err_image = "Only jpg & png files are allowed";
                return $err_image;
            }
        }else{
            if($id != null){
                $modified_date = date("Y-m-d H:i:s A");
                $update_book_column = ['book_name', 'book_author', 'book_category','book_copies', 'book_image_name','modified_Date'];
                $update_book_column_data = [$book_name, $author_name, $category_name,$book_copies,$book_image_name,$modified_date];
                $update =$sendtodb->update_to_tb('books_details',$update_book_column,$update_book_column_data,'book_id',$id,$conn);
                if(!$update){
                    echo "Error: " . mysqli_error($conn);
                }
                header('location: ./books_dashboard.php');
                return false;
            }else{
                $errmsg = "Please select image";
                return $errmsg;
            }
        }
    }
}

class admin_data_validation{
    use errorhandler;
    public $admin_name, $admin_email , $admin_password, $admin_occupation, $admin_phone_number,$admin_login_email,$admin_login_password, $book_category_name,$book_name,$author_name,$book_copies,$book_image;
    public function admin_data_validation(){
        $submitname = $submitemail = $submitpassword= $submitphone_number = $submitoccupation= $submit_login_email = $submit_login_password ='';
        if((!empty($POST['name']) || !empty($_POST['email']) || !empty($POST['password']) || !empty($POST['phone_number']) || !empty($POST['occupation']))){
            $this->admin_name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $submitname = $this->admin_name;
            $this->admin_email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $submitemail = $this->admin_email;
            $this->admin_password = (isset($_POST['password'])) ? $_POST['password'] : '';
            $submitpassword = $this->admin_password;
            $this->admin_phone_number = (isset($_POST['phone_number'])) ? $_POST['phone_number'] : '';
            $submitphone_number = $this->admin_phone_number;
            $this->admin_occupation = (isset($_POST['occupation'])) ? $_POST['occupation'] : '';
            $submitoccupation = $this->admin_occupation;

        }

        // Login
        if(!empty($_POST['login_email']) || !empty($_POST['login_password'])){
        $this->admin_login_email = (isset($_POST['login_email'])) ? $_POST['login_email'] : '';
        $submit_login_email = $this->admin_login_email;
        $this->admin_login_password = (isset($_POST['login_password'])) ? $_POST['login_password'] : '';
        $submit_login_password = $this->admin_login_password;
        }

        // Add Books
        $submit_book_category_name= $submit_book_name = $submit_author_name = $submit_book_copies =$submit_book_image ='';
        if(!empty($_POST['category_name']) || !empty($_POST['book_name']) || !empty($_POST['author_name']) || !empty($_POST['copies']) || isset($_FILES['book_image'])){
            $this->book_category_name = (isset($_POST['category_name'])) ? $_POST['category_name'] : '';
            $submit_book_category_name = $this->book_category_name;
            $this->book_name = (isset($_POST['book_name'])) ? $_POST['book_name'] : '';
            $submit_book_name = $this->book_name;
            $this->author_name = (isset($_POST['author_name'])) ? $_POST['author_name'] : '';
            $submit_author_name = $this->author_name;
            $this->book_copies = (isset($_POST['copies'])) ? $_POST['copies'] : '';
            $submit_book_copies = $this->book_copies;
            $this->book_image = (isset($_FILES['book_image'])) ? $_FILES['book_image'] : '';
            $submit_book_image = $this->book_image;
        }
        return array($submitname,$submitemail,$submitpassword,$submitphone_number,$submitoccupation,$submit_login_email,$submit_login_password,$submit_book_category_name,$submit_book_name,$submit_author_name,$submit_book_copies,$submit_book_image);
    }
}

$admin_entered_details = new admin_data_validation();

$resultofform = $admin_entered_details->admin_data_validation();

$admin_name = $admin_email = $admin_password = $admin_phone_number = $admin_occupation = '';
$err_name = $err_email = $err_password = $err_phone_number = $err_occupation = $err_login_email = $err_login_password = $errmsg = null;

if(!empty($resultofform)){
    $admin_name = $resultofform[0];
    $admin_email = $resultofform[1];
    $admin_password = $resultofform[2];
    $admin_phone_number = $resultofform[3];
    $admin_occupation = $resultofform[4];

    $admin_login_email = $resultofform[5];
    $admin_login_password = $resultofform[6];

    $category_name = $resultofform[7];
    $book_name = strtolower($resultofform[8]);
    $author_name = $resultofform[9];
    $book_copies = $resultofform[10];
    $book_image = $resultofform[11];
    $book_image_name = isset($book_image['name'])? $book_image['name'] :'';
    
}
?>