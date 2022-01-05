<?php
require_once "src/uiComponents.php";
require_once "src/movie/movieComponents.php";
require_once "src/movie/movieData.php";
require_once "src/genre/genreComponents.php";
require_once "src/genre/genreData.php";

$title = "Films";


$genreFilter = "";
$titleFilter = "";

if (isset($_GET['genre']) && $_GET["genre"] !== "") {
    $genreFilter = $_GET['genre'];
}

if (isset($_GET['title']) && trim($_GET["title"]) !== "") {
    $titleFilter = $_GET['title'];
}

$movies = getMovies($genreFilter, $titleFilter);
$genres = getAllGenres();
?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <form class="filters" method="get" action="">

            <?= getTextField("Zoeken...", "title", $titleFilter) ?>

            <div class="form-field">
                <label for="genre">genre:</label>
                <?= genresToSelect($genres, $genreFilter) ?>
            </div>

            <div class="form-field">
                <button class="button--primary">Zoeken</button>
            </div>
        </form>

        <?= moviesToGridHTML($movies) ?>
    </main>

    <?= getFooter() ?>
</body>

</html>