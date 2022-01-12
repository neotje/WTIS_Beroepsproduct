<?php
require_once "src/uiComponents.php";
require_once "src/user/userState.php";

$title = "Netflex login";
$messageHTML = "";
$state = array(
    "email" => "",
    "password" => "",
);

$allFieldsInPost = true;
foreach ($state as $field => $value) {
    if (isset($_POST[$field])) {
        $state[$field] = trim($_POST[$field]);
    } else {
        $allFieldsInPost = false;
    }
}

if ($allFieldsInPost) {
    if (loginUser($state["email"], $state["password"])) {
        header('Location: /films');
    } else {
        $messageHTML = "<p>Er is iets misgegaan. Controleer uw inloggegevens.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <section class="login">
            <form action="./login" method="post">
                <h3>Inloggegevens</h3>
                <?= getTextField("E-mail", "email", array("required", "type" => "email", "autocomplete" => "email"), $state["email"]) ?>
                <?= getTextField("Wachtwoord", "password", array("required", "type" => "password", "autocomplete" => "current-password")) ?>
                <button class="button--primary" type="submit">Login</button>
                <?= $messageHTML ?>
            </form>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>