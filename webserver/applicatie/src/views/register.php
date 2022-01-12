<?php
require_once "src/uiComponents.php";
require_once "src/subscription/subscriptionData.php";
require_once "src/subscription/subscriptionComponents.php";
require_once "src/user/userState.php";

$title = "Registreren";
$subscriptions = getListOfSubscriptions();

$state = array(
    "firstName" => "",
    "lastName" => "",
    "birthYear" => date("Y") - 18,
    "accountNumber" => "",
    "email" => "",
    "password" => "",
    "passwordRepeat" => "",
    "subscription" => $subscriptions[0]["name"]
);

$messageHTML = "";
$passwordInvalid = "";

$allFieldsInPost = true;
foreach ($state as $field => $value) {
    if (isset($_POST[$field])) {
        $state[$field] = trim($_POST[$field]);
    } else {
        $allFieldsInPost = false;
    }
}

if ($allFieldsInPost) {
    if ($state["password"] !== $state["passwordRepeat"]) {
        $passwordInvalid = "invalid";
    } elseif (isUserRegistered($state["email"])) {
        $messageHTML = "<p>Er is all een gebruiker met uw e-mail adres.</p>";
    } else {
        $result = registerUser(
            $state["firstName"],
            $state["lastName"],
            $state["birthYear"],
            $state["accountNumber"],
            $state["subscription"],
            $state["email"],
            $state["password"]
        );

        if ($result) {
            $messageHTML = "<p>Registratie is gelukt! U kunt nu <a href='/login'>hier</a> inloggen</p>";
        } else {
            $messageHTML = "<p>Er is iets misgegaan, probeer het opnieuw.</p>";
        }
    }
}
unset($state["password"]);
unset($state["passwordRepeat"]);
?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <main class="registration">
            <section>
                <h1>Registratie</h1>
                <form method="POST" action="">
                    <fieldset name="persoon">
                        <h3>Persoonsgegevens</h3>
                        <?= getTextField("Voornaam", "firstName", array("type" => "text", "required"), $state["firstName"]) ?>
                        <?= getTextField("Achternaam", "lastName", array("type" => "text", "required"), $state["lastName"]) ?>
                        <?= getTextField("Geboortejaar", "birthYear", array("type" => "number", "min" => 0, "max" => date("Y"), "required"), $state["birthYear"]) ?>
                        <?= getTextField("Rekeningnummber", "accountNumber", array("type" => "text", "required"), $state["accountNumber"]) ?>
                    </fieldset>
                    <fieldset name="account">
                        <h3>Accountgegevens</h3>
                        <?= getTextField("E-mail", "email", array("type" => "email", "required"), $state["email"]) ?>
                        <?= getTextField("Wachtwoord", "password", array("type" => "password", "required", "minlength" => 8,  $passwordInvalid)) ?>
                        <?= getTextField("Wacthwoord herhalen", "passwordRepeat", array("type" => "password", "minlength" => 8, "required", $passwordInvalid)) ?>
                    </fieldset>
                    <fieldset>
                        <div class="form-field">
                            <label for="genre">Abbonement:</label>
                            <?= subscriptionsToSelect($subscriptions, $state["subscription"]) ?>
                        </div>
                    </fieldset>
                    <button class="button--primary" type="submit">Registreren</button>
                    <?= $messageHTML ?>
                </form>
            </section>
            <section class="prices">
                <h2>Prijzen</h2>
                <?= subscriptionsToPriceTable($subscriptions) ?>
            </section>
        </main>
    </main>

    <?= getFooter() ?>
</body>

</html>