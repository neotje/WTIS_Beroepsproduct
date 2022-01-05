<?php
require_once 'src/uiComponents.php';
require_once 'src/movie/movieComponents.php';
require_once 'src/movie/movieData.php';
require_once 'src/person/personView.php';

try {
    $movieDetail = getMovieDetail(MOVIE_ID);
} catch (RuntimeException $e) {
    http_response_code(404);
    require_once 'src/views/404.php';
    die($e);
}

$title = $movieDetail["title"]

?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main class="movie-content">
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