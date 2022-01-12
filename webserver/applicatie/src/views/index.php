<?php
require_once "src/uiComponents.php";
require_once "src/movie/movieComponents.php";
require_once "src/movie/movieData.php";

$title = "Netflex";
$randomMovies = getRandomMovies(6);

?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <section class="landing">
            <div class="gradient"></div>
            <h1><u>Onbeperkt</u> series, films en meer kijken.</h1>
            <p>Kijk waar je wilt. Wanneer je wilt.</p>

            <?= getButton("/registreren", "Registreer nu", "", "primary") ?>
        </section>

        <section class="recently-added">
            <h2>Een selectie uit ons aanbod:</h2>
            <?= movieToHorizontalScrollList($randomMovies) ?>
        </section>

        <section class="last-section">
            <h1><u>Nooit</u> meer vervelen.</h1>
            <?= getButton("/registreren", "Registreer nu", "", "primary") ?>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>