<?php

require_once "Model/conf.php";
require_once "Model/model.php";

class AddController {

    public function showForm()
    {
        require "views/add_booking.php";
    }

    public function submit()
    {
        global $pdo;

        if (!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['time'])) {
            addBooking($pdo, $_POST['name'], $_POST['date'], $_POST['time']);
        }

        header("Location: index.php?action=list");
        exit;
    }
}
