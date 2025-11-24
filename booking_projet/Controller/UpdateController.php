<?php

require_once "Model/conf.php";
require_once "Model/model.php";

class UpdateController {

    public function showForm()
    {
        global $pdo;

        if (!isset($_GET['name'])) {
            die("Erreur : nom manquant.");
        }

        $bookings = getBookings($pdo);
        $bookingToUpdate = null;
        foreach ($bookings as $b) {
            if ($b['name'] === $_GET['name']) {
                $bookingToUpdate = $b;
                break;
            }
        }

        require "views/update_booking.php";
    }

    public function submit()
    {
        global $pdo;

        if (!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['time'])) {
            updateBooking($pdo, $_POST['name'], $_POST['date'], $_POST['time']);
        }

        header("Location: index.php?action=list");
        exit;
    }
}
