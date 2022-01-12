<?php
require_once "src/database.php";

function getUserByEmail($email) {
    $email = strtolower(cleanUpString($email));

    $query = databasePrepare("SELECT * FROM Users u WHERE u.email = :email");
    $query->execute([':email' => $email]);

    if ($query->rowCount() < 1) {
        return false;
    }

    $user = $query->fetch();
    return $user;
}

function isUserRegistered($email) {
    $email = strtolower(cleanUpString($email));

    $query = databasePrepare("SELECT * FROM Users u WHERE u.email = :email");
    $query->execute([':email' => $email]);

    return $query->rowCount() > 0;
}

function registerUser($firstname, $lastname, $birthYear, $accountNumber, $subscription, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = databasePrepare(
        "INSERT INTO Users(firstName, lastName, birthYear, accountNumber, subscription, email, password)
         VALUES (:firstname, :lastname, :birthYear, :accountNumber, :subscription, :email, :password)"
    );

    if (!is_numeric($birthYear) && $birthYear < 0) {
        return false;
    }

    try {
        return $query->execute([
            ':firstname' => cleanUpString($firstname),
            ':lastname' => cleanUpString($lastname),
            ':birthYear' => $birthYear,
            ':accountNumber' => cleanUpString($accountNumber),
            ':subscription' => cleanUpString($subscription),
            ':email' => strtolower(cleanUpString($email)),
            ':password' => $password
        ]);
    } catch (PDOException $th) {
        return false;
    }
}
