<?php
require_once "src/database.php";
require_once "src/user/userData.php";

session_start();

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

function isAnUserLoggedIn() {
    return isset($_SESSION["user"]);
}

function getCurrentUser() {
    if (isAnUserLoggedIn()) {
        return $_SESSION["user"];
    }
    return NULL;
}
