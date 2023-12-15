<?php

class authenticate{
    public $admin, $books, $category, $users, $orders, $return;

    public function secure_data(){
        $this->admin = "Admin data";
        $admin = $this->admin;
        $this->books = "Books data";
        $books = $this->books;
        $this->categories = "Categories data";
        $category = $this->category;
        $this->users = "Users data";
        $users = $this->users;
        $this->orders = "Orders data";
        $orders = $this->orders;
        $this->return = "Return data";
        $return = $this->return;

        return true;
    }
}

$authentication = new authenticate();

?>