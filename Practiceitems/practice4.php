<?php
// require 'practice5.php';
// class user{
//     protected $name;
//     protected $graduate= true;
//     public function __construct($name)
//     {
//         $this->name = $name;
//     }
// }
// $userlist= [
//     new user('Neeraj'),
//     new user('Ankur'),
//     new user('Sandeep'),
// ];
// det($userlist);

class cars{
    var $name;
    var $color;

    function set_name($name){
        $this->name = $name;
    }
    function set_color($color){
        $this->color = $color;
    }

    function get_name(){
        return $this->name;
    }
    function get_color(){
        return $this->color;
    }
}

$bmw = new cars();
$bmw->set_name('BMW');
$bmw->set_color('White');
echo "<i>My personal car is <u>" . $bmw->get_name();
echo "</u> and it's of <u>" . $bmw->get_color() . "</u> color<br></i>";

// class student {
//     public $name;
//     public $class;
//     public $sem;
    // function set_n($name){
    //     $this->name= $name;
    // }
    // function get_n(){
    //     return $this->name;
    // }
    // function set_c($class){
    //     $this->class = $class;
    // }
    // function get_c(){
    //     return $this->class;
    // }
    // function __construct($name,$sem){
    //     $this->name = $name;
    //     $this->sem = $sem;
    // }
    // protected function intro(){
    //     echo "Hey, this is {$this->name} and from {$this->sem} semester";
    // }
    // function __destruct()
    // {
    //     echo "The semester is {$this->sem}";
    // }
    // function get_s(){
    //     return $this->sem;
    // }
// }
// abstract class student{
//     public $name;
//     function __construct($name)
//     {
//         $this->name = $name;
//     }
//     abstract public function intro() : string;
// }
// class stream extends student{
//     public function intro() : string {
//         return "Your name is $this->name";
//     }
// }

// $stream = new stream('Neeraj','6');
// $student->set_n('Neeraj');
// $student->set_c('BCA');
// echo $student->get_n();
// echo "<br>";
// echo $student->get_c();
// echo $student->get_s();
// echo $stream->stream() . "<br>";
// echo $stream->intro();


// Abstract
// abstract class student1{
//     abstract protected function name($name);
// }
// class stream extends student1{
//     public function name($name,$greet= "Dear", $sep = "."){
//         if($name == "Neeraj"){
//             $add = "Hello";
//         }elseif($name == "Zania"){
//             $add = "Hey";
//         }else{
//             $add = "Hi";
//         }
//         return "{$add} {$greet} {$name}{$sep}";
//     }
// }

// $student = new stream();
// echo $student->name('Neeraj') . "<br>" . $student->name('Zania');


// Interface
// interface student{
//     public function name($name);
// }

// class bca implements student{
//     public $name;
//     public function name($name){
//         $this->name = $name;
//     }
//     function get(){
//         return $this->name;
//     }
// }

// class bba implements student{
//     public $name;
//     public function name($name){
//         $this->name = $name;
//     }
//     function get(){
//         return $this->name;
//     }
// }

// $bca = new bca();
// $bba = new bca();
// $bca->name('Neeraj');
// $bba->name('Zania');
// $a = $bca->get();
// $b = $bba->get();
// $array = array($a,$b);
// echo "<br>";
// print_r($array);

// Traits
trait stream1{
    private function m1(){
        echo "<br>Hey bro";
    }
}
trait stream2{
    public function m1(){
        echo "<br>Hello brother";
    }
}
class student2{
    use stream1{
        stream1::m1 as public;
    }
    use stream2{
        stream1::m1 insteadOf stream2;
        stream2::m1 as msg1;
    }
    private $data = "Neeraj";
    public function __get($property){
        echo "<br>You are trying to access non existing property ($property)";
    }
}

$stud = new student2();
echo $stud->m1();
echo $stud->msg1();
echo $stud->data;


// Static
class stat{
    public static function statmsg(){
        echo "<br>Hey whatsup bro";
    }
}
stat::statmsg();