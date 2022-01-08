<?php

declare(strict_types=1);

$dbPassword = rtrim(file_get_contents("/run/secrets/password_rdbms_app"));

if (!$dbPassword) {
    throw new RuntimeException("Database wacthwoord niet gevonden.");
}

$address = "sqlsrv:Server=" . DB_HOST . ";Database=" . DB_DATABASE . ";ConnectionPooling=0;";

try {
    $dbConnection = new PDO($address, DB_LOGIN, $dbPassword);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to SQL Server: " . $e->getMessage());
}

unset($dbPassword);

function getDatabaseConnection() {
    global $dbConnection;
    return $dbConnection;
}

function databasePrepare($sql) {
    global $dbConnection;

    $query = $dbConnection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $query->setFetchMode(PDO::FETCH_ASSOC);
    return $query;
}

function cleanUpString($str) {
    return strip_tags(htmlspecialchars($str));
}
