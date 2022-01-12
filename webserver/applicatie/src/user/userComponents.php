<?php
require_once "src/user/userState.php";
require_once "src/uiComponents.php";

function getUserNavBarHTML() {
    if (isAnUserLoggedIn()) {
        $user = getCurrentUser();
        return "
        <div class='dropdown'>
            <div class='dropdown-button button--primary'>$user[email]</div>
            <div class='dropdown-content'>
                " . getButton("/uitloggen", "Uitloggen") . "
            </div>
        </div>
        ";
    } else {
        return "
        <div class='dropdown'>
            <div class='dropdown-button button--primary'>Account</div>
            <div class='dropdown-content'>
                " . getButton("/registreren", "Registreren") . "
                " . getButton("/login", "Login") . "
            </div>
        </div>
        ";
    }
}
