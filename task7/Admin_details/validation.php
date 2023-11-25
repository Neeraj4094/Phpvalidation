<?php
include '../database_connection.php';

trait errorhandler
{
    // Name
    public function name_validation($value, $err = null)
    {
        $len = strlen($value);
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $err = "Invalid";
            
        } elseif ($len > 2 && $len < 35) {
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

    public function emp($value, $err = null)
    {
        if (empty($value)) {
            $err = "Invalid";
            return $err;
        }
    }
    public function phone_length($value, $err = null , $length=null){
        $length = strlen($value);
        if($length != 10){
            $err = "Invalid";
        }
        return $err;
    }
}


class admin_data_validation{
    use errorhandler;
    public $admin_name, $admin_email , $admin_password, $admin_occupation, $admin_phone_number,$admin_login_email,$admin_login_password;
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
        return array($submitname,$submitemail,$submitpassword,$submitphone_number,$submitoccupation,$submit_login_email,$submit_login_password);
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
}

?>