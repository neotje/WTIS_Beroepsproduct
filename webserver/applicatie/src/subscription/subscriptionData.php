<?php
require_once "src/database.php";

function getListOfSubscriptions() {
    $db = getDatabaseConnection();
    $data = $db->query("SELECT * FROM Subscription ORDER BY price");

    return $data->fetchAll();
}
