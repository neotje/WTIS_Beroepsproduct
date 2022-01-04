<?php
require_once 'src/elements.php';
require_once 'src/movieData.php';
require_once 'src/movieView.php';

try {
    $movieDetail = getMovieDetail(MOVIE_ID);
} catch (RuntimeException $e) {
    http_response_code(404);
    require_once 'src/views/404.php';
}

$title = $movieDetail["title"]

?>

<!DOCTYPE html>
<html lang="en">

<?= getHTMLHeader($title) ?>

<body>
    <?= getHTMLNavBar() ?>

    <main class="movie-content">
        <?= movieDetailToAbout($movieDetail) ?>
    </main>

    <?= getHTMLFooter() ?>
</body>

</html>