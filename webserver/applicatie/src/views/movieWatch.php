<?php
require_once 'src/uiComponents.php';
require_once 'src/movie/movieComponents.php';
require_once 'src/movie/movieData.php';
require_once 'src/user/userState.php';

try {
    $movieDetails = getMovieDetail(MOVIE_ID);
} catch (RuntimeException $e) {
    http_response_code(404);
    require_once 'src/views/404.php';
    die($e);
}

if (!isAnUserLoggedIn()) {
    http_response_code(404);
    require_once 'src/views/404.php';
    die($e);
}

$title = "Netflex - $movieDetails[title]";
$detailPageURL = "/film/" . MOVIE_ID;

?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <section class="movie">
            <a href="<?= $detailPageURL ?>">
                <h1>&lsaquo; <?= $movieDetails["title"] ?></h1>
            </a>

            <?= movieToMoviePlayer($movieDetails) ?>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>