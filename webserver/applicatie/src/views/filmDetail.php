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

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main class="movie-content">
        <?= movieDetailToAbout($movieDetail) ?>
    </main>

    <?= getFooter() ?>
</body>

</html>