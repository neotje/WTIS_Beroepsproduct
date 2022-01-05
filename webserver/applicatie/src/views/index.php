<?php
require_once "src/elements.php";
require_once "src/movieData.php";
require_once "src/movieView.php";

$title = "Netflex";
$recentlyAddedMovies = getRandomMovies(5);
$trendingMovies = getRandomMovies(5);

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
            <h2>Onlangs toegevoegd:</h2>
            <?= movieToHorizontalScrollList($recentlyAddedMovies) ?>
        </section>

        <section class="trending">
            <h2>Trending:</h2>
            <?= movieToHorizontalScrollList($trendingMovies) ?>
        </section>

        <section class="last-section">
            <h1><u>Nooit</u> meer vervelen.</h1>
            <?= getButton("/registreren", "Registreer nu", "", "primary") ?>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>