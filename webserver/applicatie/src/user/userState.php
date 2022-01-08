<?php
require_once "src/database.php";

session_start();

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

function isUserRegistered($email) {
    $email = strtolower(cleanUpString($email));

    $query = databasePrepare("SELECT * FROM Users u WHERE u.email = :email");
    $query->execute([':email' => $email]);

    return $query->rowCount() > 0;
}

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

function loginUser($email, $password) {
    $user = getUserByEmail($email);
    $result = true;

    if (!$user) {
        $result = false;
    } else {
        if (password_verify($password, $user["password"])) {
            $result = true;
            $_SESSION["user"] = $user;
            unset($_SESSION["user"]["password"]);
        } else {
            $result = false;
        }

        unset($user["password"]);
    }

    return $result;
}

function logoutUser() {
    unset($_SESSION["user"]);
    session_destroy();
}

function isLoggedIn() {
    return isset($_SESSION["user"]);
}

function getCurrentUser() {
    if (isLoggedIn()) {
        return $_SESSION["user"];
    }
    return NULL;
}
