<?php
require_once 'src/uiComponents.php';
require_once 'src/movie/movieComponents.php';
require_once 'src/movie/movieData.php';
require_once 'src/person/personComponents.php';
require_once 'src/user/userState.php';

try {
    $movieDetail = getMovieDetail(MOVIE_ID);
} catch (RuntimeException $e) {
    http_response_code(404);
    require_once 'src/views/404.php';
    die($e);
}

$title = "Netflex - $movieDetail[title]";

?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main class="movie-content">
        <?= movieToTrailerVideo($movieDetail) ?>

        <section class="controls">
            <?= movieToPlayButton($movieDetail, isAnUserLoggedIn()) ?>
        </section>

        <?= movieDetailToAbout($movieDetail) ?>

        <section class="cast">
            <h2>Regisseurs:</h2>
            <?= personsToAvatarList($movieDetail["directors"]) ?>
            <h2>Cast:</h2>
            <?= personsToAvatarList($movieDetail["cast"]) ?>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>