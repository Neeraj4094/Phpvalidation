<?php
include 'dbconnection.php';
include 'session.php';
//Database
class dbfetchdata
{
    public function fetchdatafromdb($con, $tablename, $show = null)
    {
        $select = "select * from $tablename";
        $query = mysqli_query($con, $select);
        $show = mysqli_fetch_all($query);
        return $show;
    }
    function filt($array, $email)
    {
        foreach ($array as $item) {
            if (in_array($email, $item)) {
                return $item;
            }
        }
        return $array;
    }
    public function fetchiddata($dbname, $id = null, $con, $column_id_name)
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select * from $dbname where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);

        return $query;
    }
}

class senddatatodb
{
    public function insertindb($dbname, $column_name, $row_data, $con, $result = null)
    {
        print_r($column_name);
        $columns = implode(', ', $column_name);
        $values = "'" . implode("', '", $row_data) . "'";

        $insert = "insert into $dbname ($columns) values ($values)";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            die("Error:" . mysqli_error($con));
        }
    }

    public function update($sendtodb, $dbname, $column_name, $column_data, $con, $col_id, $uniqueimagename = null, $id = null)
    {
        $errormsg = '';
        $updatequery = '';
        $updateValues = array();
        for ($i = 0; $i < count($column_name); $i++) {
            $updateValues[] = " $column_name[$i] =  '$column_data[$i]' ";
        }
        $update = implode(', ', $updateValues);

        if (is_array($uniqueimagename)) {
            if (!in_array($id, $uniqueimagename)) {
                $sendtodb->insertindb('record_of_image', $column_name, $column_data, $con);
                $errormsg = "Created successfully";
                return $errormsg;
            } else {
                $updateindb = "UPDATE $dbname set $update where $col_id = '$id'";
                $updatequery = mysqli_query($con, $updateindb);
                if (!$updatequery) {
                    die("Error:" . mysqli_error($con));
                }
                $errormsg = "Updated successfully";
                return $errormsg;
            }
        } else {
            $updateindb = "UPDATE $dbname set $update where $col_id = '$id'";
            $updatequery = mysqli_query($con, $updateindb);
            if (!$updatequery) {
                die("Error:" . mysqli_error($con));
            }
            $errormsg = "Updated successfully";
            return $errormsg;
        }
        header("location: ./admin3.php");
    }
}

class deletefromdb
{
    public function deletefromdb($tablename1, $tablename2, $con, $col_id1, $col_id2, $id, $location)
    {
        $deleteImageRecords = "DELETE FROM $tablename1 WHERE $col_id1 = $id";
        $queryImageRecords = mysqli_query($con, $deleteImageRecords);

        if (!$queryImageRecords) {
            echo "Error deleting image records: " . mysqli_error($con);
        } else {
            $deleteRegistration = "DELETE FROM $tablename2 WHERE $col_id2 = $id";
            $queryRegistration = mysqli_query($con, $deleteRegistration);

            if (!$queryRegistration) {
                echo "Error deleting registration record: " . mysqli_error($con);
            } else {
                echo "Deleted Successfully";
                header("location: $location");
            }
        }
    }
}
class emailcheck
{
    public function emailcheck($sendtodb, $imageerror, $arr, $data, $con, $imageid, $id, $name, $image, $size, $email, $registerationidlist, $modified_date)
    {
        if ($imageerror == UPLOAD_ERR_OK) {
            $errimage = $name->validation_image($sendtodb, $image, $size,$arr, $data, $email, $con, $registerationidlist, $imageid, $id);
            return $errimage;
        } else {
            $modified_date = date('Y-m-d H:i:s') . " " . date("h:i:sa");
            $imagecolumn = ['Modified_Date'];
            $imagecolumndata = [$modified_date];
            $sendtodb->update($sendtodb, 'record_of_image', $imagecolumn, $imagecolumndata, $con, 'user_id', null, $id);
        }
    }
}

$checkemail = new emailcheck();
$sendtodb = new senddatatodb();
$dbdata = new dbfetchdata();
$registerationdata = $dbdata->fetchdatafromdb($con, 'registeration_login');

$firstname = $image = $imagename = $email = $password = $occupation = $role = $skills = $passlength = $ucase = $lcase = $passnumber = $spchar = $extension = $ext = $size = $errormsg = $arr = $data = $id = $created_date = "";
$err = $errname = $errimage =  $erremail = $errpassword = $erroccupation = $errrole = $errskills = "";
$emailinlogin = $passwordinlogin = '';
$fetchname = $fetchemaildata = $fetchpassword = $fetchoccupation = $fetchrole = $fetchskills = '';
$registerationidlist = [];
$emaillist = [];

//Image
$showimage = $dbdata->fetchdatafromdb($con, 'record_of_image');
foreach ($registerationdata as $item) {
    $registerationidlist[] = $item[0];
    $emaillist[] = $item[2];
    $passwordlist[] = $item[3];
}
foreach ($showimage as $item) {
    $imageid[] = $item[2];
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$querydata = $dbdata->fetchiddata('registeration_login', $id, $con, 'ID');
$fetchdata = mysqli_fetch_all($querydata);

$fetchname = isset($fetchdata[0][1]) ? $fetchdata[0][1] : '';
$fetchemaildata = isset($fetchdata[0][2]) ? $fetchdata[0][2] : '';
$fetchpassword = isset($fetchdata[0][3]) ? $fetchdata[0][3] : '';
$fetchoccupation = isset($fetchdata[0][4]) ? $fetchdata[0][4] : '';
$fetchrole = isset($fetchdata[0][5]) ? $fetchdata[0][5] : '';
$fetchskills = isset($fetchdata[0][6]) ? $fetchdata[0][6] : '';

class date
{
    public function date_time_in_us()
    {
        date_default_timezone_set("America/New_York");
    }
    public function date_time_in_india($datelist)
    {
        $indian_date_time = [];
        foreach ($datelist as $date) {
            $us_date_time = '';
            $us_date_time = $date;
            $date_time = new DateTime($us_date_time, new DateTimeZone('America/New_York'));
            $date_time->setTimezone(new DateTimeZone('Asia/Kolkata'));
            $indian_date_time[] = $date_time->format('Y-m-d H:i:s');
        }
        return $indian_date_time;
    }
}
$date = new date();
$date->date_time_in_us();
$created_date = date('Y-m-d H:i:s') . " " . date("h:i:sa");
$modified_date = date('Y-m-d H:i:s') . " " . date("h:i:sa");

// Validation in Classes
trait namevalid1
{
    // Name
    public function validation_match($value, $err = null)
    {
        $len = strlen($value);
        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $err = "Invalid";
            return $err;
        } elseif (preg_match('@[0-9]@', $value)) {
            $err = "No";
            return $err;
        } elseif (empty($value)) {
            $err = "Invalid dude";
            return $err;
        } elseif ($len > 2 && $len < 35) {
            return false;
        } else {
            $err = "Invalid";
            return $err;
        }
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

        // if (empty($value)) {
        //     $err = "Invalid";
        // }
        if ($passlength >= 8 && $ucase && $lcase && $passnumber && $spchar && !empty($value)) {
            $value;
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

    // Image
    public function validation_image($sendtodb, $image, $size, $column_array, $column_data, $email, $con, $registerationidlist, $imageid = null, $id = null)
    {
        $imageerror = isset($image['error']) ? $image['error'] : '';
        if ($imageerror == UPLOAD_ERR_OK) {


            $extension = ["jpg", "png", "jpeg"];
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {

                $errimage = '';
                $newname = uniqid("Img-", true) . '.' . $ext;
                $upload = "..\image/" . $newname;

                if (move_uploaded_file($image["tmp_name"], $upload)) {
                    
                    if (!in_array($id, $registerationidlist)) {
                        $sendtodb->insertindb('registeration_login', $column_array, $column_data, $con);
                        $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
                        $user_id_result = mysqli_query($con, $user_id_query);
                        if ($user_id_result) {
                            $imagename = isset($image['name']) ? $image['name'] : ''; //Image name
                            $modified_date = date('Y-m-d H:i:s') . " " . date("h:i:sa"); // Modified Date
                            $user_id_row = mysqli_fetch_assoc($user_id_result);
                            $user_id = isset($user_id_row['ID']) ? $user_id_row['ID'] : '';

                            $imagecolumn = ['user_image', 'user_id', 'Image_name', 'Modified_Date'];
                            $imagecolumndata = [$newname, $user_id, $imagename, $modified_date];

                            $sendtodb->insertindb('record_of_image', $imagecolumn, $imagecolumndata, $con); // Sending image data on db

                            $errimage = '';
                            return $errimage;
                        } else {
                            echo "Error: " . mysqli_error($con);
                        }
                    } else {
                        
                        $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
                        $user_id_result = mysqli_query($con, $user_id_query);
                        if($user_id_result){
                            echo "Error:" . mysqli_error($con);
                        }

                        if ($user_id_result) {
                            $imagename = isset($image['name']) ? $image['name'] : ''; //Image name
                            $modified_date = date('Y-m-d H:i:s') . " " . date("h:i:sa"); // Modified Date
                            $user_id_row = mysqli_fetch_assoc($user_id_result);
                            $user_id = isset($user_id_row['ID']) ? $user_id_row['ID'] : '';

                            $imagecolumn = ['user_image', 'user_id', 'Image_name', 'Modified_Date'];
                            $imagecolumndata = [$newname, $user_id, $imagename, $modified_date];

                            $sendtodb->update($sendtodb, 'record_of_image', $imagecolumn, $imagecolumndata, $con, 'user_id', $imageid, $id);

                            $errimage = '';
                            return $errimage;
                        } else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                $errimage = "Only jpg & png files are allowed";
                return $errimage;
            }
        } else {
            $sendtodb->insertindb('registeration_login', $column_array, $column_data, $con);
            $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
            $user_id_result = mysqli_query($con, $user_id_query);
            if ($user_id_result) {
                $user_id_row = mysqli_fetch_assoc($user_id_result);
                $user_id = isset($user_id_row['ID']) ? $user_id_row['ID'] : '';
                $modified_date = date('Y-m-d H:i:s') . " " . date("h:i:sa");
                $imagecolumn = ['user_id', 'Modified_Date'];
                $imagecolumndata = [$user_id, $modified_date];
                $sendtodb->insertindb('record_of_image', $imagecolumn, $imagecolumndata, $con);
            }
        }
    }
}

class validation
{
    use namevalid1;
    public $errpassword = '';
    public $name, $email, $password, $occupation, $role, $skills, $image;
    public $loginemail, $loginpassword;
    public function getname($con)
    {
        $submitname = $submitemail = $submitpassword = $submitoccupation = $submitrole = $submitskill = $submitimage = '';
        if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['occupation']) || !empty($_POST['role']) || !empty($_POST['skills']) || isset($_FILES['image']) || isset($_POST['loginemail'])) {
            $this->name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $submitname = $this->name;
            $this->email = (isset($_POST['email'])) ? $_POST['email'] : '';
            $submitemail = $this->email;
            $this->password = (isset($_POST['password'])) ? $_POST['password'] : '';
            $submitpassword = $this->password;
            $this->occupation = (isset($_POST['occupation'])) ? $_POST['occupation'] : '';
            $submitoccupation = $this->occupation;
            $this->role = (isset($_POST['role'])) ? $_POST['role'] : '';
            $submitrole = $this->role;
            $this->skills = (isset($_POST['skills'])) ? $_POST['skills'] : '';
            $submitskill = $this->skills;

            // Image
            $this->image = (isset($_FILES['image'])) ? $_FILES['image'] : '';
            $submitimage = $this->image;
        }
        // Login Page
        $loginemail = $loginpassword = '';
        if (isset($_POST['loginemail']) || isset($_POST['loginpassword'])) {
            $this->loginemail = (isset($_POST['loginemail'])) ? $_POST['loginemail'] : '';
            $loginemail = $this->loginemail;
            $this->loginpassword = (isset($_POST['loginpassword'])) ? $_POST['loginpassword'] : '';
            $loginpassword = $this->loginpassword;
        }
        return array($submitname, $submitemail, $submitpassword, $submitoccupation, $submitrole, $submitskill, $submitimage, $loginemail, $loginpassword);
    }
}

$name = new validation();
$resultofform = $name->getname($con);
if (isset($resultofform[0]) || isset($resultofform[1]) || isset($resultofform[2]) || isset($resultofform[3]) || isset($resultofform[4]) || isset($resultofform[5]) || isset($resultofform[6])) {
    $username = $resultofform[0];
    $email = $resultofform[1];
    $password = $resultofform[2];
    $occupation = $resultofform[3];
    $role = $resultofform[4];
    $skills = $resultofform[5];
    $image = $resultofform[6];
    if (isset($image["size"])) {
        $size = $image["size"];
    }

    // Login
    $emailinlogin = $resultofform[7];
    $passwordinlogin = $resultofform[8];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $errname = $name->validation_match($username);
        $erremail = $name->email_match($email);
        $errpassword = $name->validation_password($password);
        $erroccupation = $name->emp($occupation);
        $errrole = $name->emp($role);
        $errskills = $name->emp($skills);

        $column_array = ['name', 'email', 'password', 'occupation', 'role', 'skills', 'created_date'];
        $column_data = ["$username", "$email", "$password", "$occupation", "$role", "$skills", "$created_date"];
        $arr = ['name', 'email', 'password', 'occupation', 'role', 'skills'];
        $data = ["$username", "$email", "$password", "$occupation", "$role", "$skills"];

        if ($errname == '' && $erremail == '' && $errpassword == '' && $erroccupation == '' && $errrole == '' && $errskills == '') {

            // Insert
            if (empty($registerationdata)) {
                // $sendtodb->insertindb('registeration_login', $column_array, $column_data, $con);
                $errimage = $name->validation_image($sendtodb, $image, $size, $column_array, $column_data, $email, $con, $registerationidlist);
                if ($errimage == null) {
                    header("location: ./login_form_in_html.php");
                }
            } else {
                if (!in_array($id, $registerationidlist)) {
                    if (!in_array($email, $emaillist)) {
                        // $sendtodb->insertindb('registeration_login', $column_array, $column_data, $con);

                        $errimage = $name->validation_image($sendtodb, $image, $size, $column_array, $column_data, $email, $con, $registerationidlist);
                        if ($errimage == null) {
                            header("location: ./login_form_in_html.php");
                        }
                    } else {
                        $errormsg = "This email already exists";
                    }
                } else {
                    // Update
                    $imageerror = isset($image['error']) ? $image['error'] : '';

                    $fetchemail = '';
                    $fetchemail = isset($fetchdata[0]) ? $fetchdata[0] : '';
                    $fetchemaildata = (isset($fetchdata[0][2])) ? $fetchdata[0][2] : '';

                    
                    if (in_array($fetchemaildata, $_SESSION)) {
                        $_SESSION = ['email' => $email, 'password' => $password];
                        if (in_array($email, $fetchemail)) {
                            $sendtodb->update($sendtodb, 'registeration_login', $arr, $data, $con, 'ID', null, $id);

                            $errimage = $checkemail->emailcheck($sendtodb, $imageerror, $arr, $data, $con, $imageid, $id, $name, $image, $size, $email, $registerationidlist, $modified_date);
                            if ($errimage == null) {
                                header("location: ./admin3.php");
                            }
                        } elseif (!in_array($email, $emaillist)) {

                            $sendtodb->update($sendtodb, 'registeration_login', $arr, $data, $con, 'ID', null, $id);
                            $errimage = $checkemail->emailcheck($sendtodb, $imageerror, $arr, $data, $con, $imageid, $id, $name, $image, $size, $email, $registerationidlist, $modified_date);
                            if ($errimage == null) {
                                header("location: ./admin3.php");
                            }
                        } else {
                            $errormsg = "This email already exists";
                        }
                    } else {
                       
                        if (in_array($email, $fetchemail)) {
                            $sendtodb->update($sendtodb, 'registeration_login', $arr, $data, $con, 'ID', null, $id);
                            $errimage = $checkemail->emailcheck($sendtodb, $imageerror, $arr, $data, $con, $imageid, $id, $name, $image, $size, $email, $registerationidlist, $modified_date);
                            if ($errimage == null) {
                                header("location: ./admin3.php");
                            }
                        } elseif (!in_array($email, $emaillist)) {
                            $sendtodb->update($sendtodb, 'registeration_login', $arr, $data, $con, 'ID', null, $id);
                            $errimage = $checkemail->emailcheck($sendtodb, $imageerror, $arr, $data, $con, $imageid, $id, $name, $image, $size, $email, $registerationidlist, $modified_date);
                            if ($errimage == null) {
                                header("location: ./admin3.php");
                            }
                        } else {
                            $errormsg = "This email already exists";
                        }
                    }
                }
            }
        } else {
            $errormsg = "Please complete the form";
        }
    }
}
