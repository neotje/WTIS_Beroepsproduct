<?php

declare(strict_types=1);

$dbPassword = rtrim(file_get_contents("/run/secrets/password_rdbms_app"));

if (!$dbPassword) {
    throw new RuntimeException("Database wacthwoord niet gevonden.");
}

$address = "sqlsrv:Server='" . DB_HOST . "';Database='" . DB_DATABASE . "';ConnectionPooling=0;";
echo $address;
echo DB_LOGIN;
$dbConnection = new PDO($address, DB_LOGIN, $dbPassword);

unset($dbPassword);

$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getDatabaseConnection() {
    global $dbConnection;
    return $dbConnection;
}
