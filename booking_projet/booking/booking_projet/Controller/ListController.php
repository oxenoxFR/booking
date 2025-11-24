<?php

require_once "Model/conf.php";  
require_once "Model/model.php"; 

class ListController {

    public function index()
    {
        global $pdo;

        $bookings = getBookings($pdo);

        require "views/list_bookings.php";
    }
}
