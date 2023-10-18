<?php
require 'practice5.php';
class user{
    protected $name;
    protected $graduate= true;
    public function __construct($name)
    {
        $this->name = $name;
    }

}
$userlist= [
    new user('Neeraj'),
    new user('Ankur'),
    new user('Sandeep'),
];

det($userlist);

