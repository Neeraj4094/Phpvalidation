<?php
// Interface
// class account{
//     private $balance;
//     public function balance(){
//         return $this->balance;
        
//     }
//     public function dep($amount){
//         if($amount>0){
//             $this->balance += $amount;
//         }
//         return $this;
//     }
// }
// class saving extends account{
//     private $interest;
//     public function interest($interest){
//         $this->interest = $interest;
//     }
//     public function inter(){
//         $inter = $this->interest * $this->balance();
//         $this->dep($inter);
//     }
// }
// $accdetails = new saving();
// $accdetails->dep(1000);
// $accdetails->interest(0.2);
// $accdetails->inter();
// echo $accdetails->balance();


// Abstract
// abstract class dump{
//     abstract function dump($data);
// }
// class hello extends dump{
//     public function dump($data)
//     {
//         var_dump($data);
//     }
// }
// class hi extends dump{
//     public function dump($data)
//     {
//         echo $data;
//     }
// }
// class mainclass{
//     public static function getdump(){
//         return PHP_SAPI === 'cli' ? new hello() : new hi();
//     } 
// }
// $dump = mainclass::getdump();
// $dump->dump("Hey Guy's");






// class shapes{
    
//     protected $l,$b,$r, $area;
//     function __construct($l=0,$b=0,$r=0)
//     {
//         $this->l=$l;
//         $this->b=$b;
//         $this->r=$r;
//     }
// }

// class triangle extends shapes{

//     private function area(){
//         $this->area= $this->l * $this->b;
//     }
//     public function getArea(){
//         $this->area();
//         echo "Area: $this->area<br>";
//         echo "Length: $this->l";
//     }
// }

// class circle extends shapes{
   
//     private function area(){
//         return "<br>Area of the Circle is = " . (22/7 * $this->r);
//     }
//     public function radius(){
//         return "{$this->area()}<br>Radius is {$this->r}";
//     }
// }

// class square extends shapes{
//     private function area(){
//         return "<br>Area of square :- " . $this->b * $this->b;
//     }
//     public function length(){
//         return "{$this->area()}<br>Lenght of the square :- {$this->b}";
//     }
// }
// $tri = new triangle(10,5);
// echo $tri->getArea();

// $cir = new circle(0,0,140);
// echo $cir->radius();

// $sqr = new square(0,10,0);
// echo $sqr->length();




class bankaccount{
    protected $totalbalance;
    function __construct($totalbalance)
    {
        $this->totalbalance = $totalbalance;
    }
    function gettoal(){
        return $this->totalbalance;
    }
    function total(){
        if($this->totalbalance == 0){
            return "Your balance is null";
        }else{
            return $this->totalbalance;
        }
    }
}
class savingaccount extends bankaccount{
    public $deposit,$withdraw;
    function showbalance(){
        return $this->totalbalance;
    }
    function deposit($deposit){
        echo "<br>Deposit amount :- " . $deposit;
        $this->totalbalance += $deposit;
    }
    function withdraw($withdraw){
        echo "<br> Withdrawal amount :-" . $withdraw;
        $this->totalbalance -= $withdraw;
    }
}

class checkingaccount extends bankaccount{
    public $interest;
    public function balance(){
        return $this->totalbalance;
    }
    public function interestrate($interest){
        echo "<br>Your Interest rate is " . $interest;
        $intrest = $this->totalbalance * $interest;
        echo "<br>After calculating your total interest :- " . ($intrest) . "<br>";
        $this->totalbalance += $intrest;
    }
}

$bank = new savingaccount(10000);
$bank->deposit(2000);
$bank->withdraw(1000);
echo "<br>Total balance :- " . $bank->showbalance();
echo "<br>";
echo "<br>";

$check = new checkingaccount($bank->showbalance());
echo "Your current balance :- " . $check->balance();
echo  $check->interestrate(0.02);
echo "Total balance :- " . $check->balance();



echo "<br>";
echo "<br>";


class database{
    function connect(){
        return 'Connected';
    }
}

class userdata{
    private $database;
    public function __construct($database)
    {
        $this->database= $database;
    }
    public function getdata(){
        return $this->database->connect() . "<br>User data connceted successfully";
    }
}

$database = new database();

$get = new userdata($database);
echo $get->getdata();
echo "<br>";
echo "<br>";




// Abstraction
// abstract class bank{
//     protected $balance;
//     public function __construct($mainbalance)
//     {
//         $this->balance = $mainbalance;
//     }
//     abstract public function deposit($money);
//     abstract public function withdraw($money);
// }

// class savingacc extends bank{
//     public function deposit($money)
//     {
//         echo "<br>Deposit amount :- " . $money;
//         $this->balance += $money;
//     }
//     public function total(){
//         return $this->balance;
//     }
//     public function withdraw($money)
//     {
//         if($this->balance >= $money){
//             echo "<br>Withdrawal amount :- " . $money;
//             $this->balance -= $money;
//         }else{
//             echo "<br>Insufficient balance";
//         }
//     }
// }

// class checkinacc extends bank {
//     public $additionalcharges = 90;
//     public function deposit($money)
//     {
//         echo "<br>Deposit amount :- " . $money;
//         $this->balance += $money;
//     }
//     public function total(){
//         return $this->balance;
//     }
//     public function withdraw($money)
//     {
//         if($this->balance >= ($money + $this->additionalcharges)){
//             echo "<br>Withdrawal amount :- " . $money;
//             $this->balance -= $money;
//         }else{
//             echo "<br>Insufficient balance";
//         }
//     }
// }
// $depositm = new savingacc(10000);
// $depositm->deposit(2000);
// $depositm->withdraw(1000);
// echo "<br>Total :- " . $depositm->total();
// echo "<br>";
// echo "<br>";

// $checking = new checkinacc($depositm->total());
// $checking->withdraw(500);
// echo "<br>Total amount = " .$checking->total();




// Interface
interface logger{
    public function logger($message);
}
class fileloader implements logger{
    private $fileload;
    public function __construct($loader)
    {
        $this->fileload = $loader;
    }
    public function logger($message){
        file_put_contents($this->fileload, '[' . date('Y-m-d H:i:s') . ']' . $message . '\n');
        echo "Ok";
    }
}

$file = new fileloader('../Image/Spider4.jpg');
echo $file->logger('This is file loader');
?>