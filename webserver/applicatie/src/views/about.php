<?php
require_once "src/uiComponents.php";

$title = "Over ons";
?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <article class="about">
            <h1>Over ons</h1>
            <p>
                Netflex is een snelle streamingdienst met zeer hoge kwaliteit. Opgericht door een echte film en serie liefhebber.
                En met het enorme aanbod kan iedereen een liefhebber worden. Er is altijd wel iets nieuws te kijken.
            </p>
            <p>
                Je kijk zo veel je wilt, wanneer je wilt, zonder reclame.
            </p>

            <div class="center">
                <?= getButton("/registreren", "Registreer vandaag nog", "", "primary") ?>
            </div>
        </article>
    </main>

    <?= getFooter() ?>
</body>

</html>