<?php

require_once "Model/conf.php";
require_once "Model/model.php";

class DeleteController {

    public function delete()
    {
        global $pdo;

        if (!isset($_GET['name'])) {
            die("Erreur : nom manquant.");
        }

        deleteBooking($pdo, $_GET['name']);

        header("Location: index.php?action=list");
        exit;
    }
}
