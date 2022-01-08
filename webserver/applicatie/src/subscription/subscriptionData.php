<?php
require_once "src/database.php";

function getListOfSubscriptions() {
    $query = databasePrepare("SELECT * FROM Subscription ORDER BY price");
    $query->execute();

    return $query->fetchAll();
}
