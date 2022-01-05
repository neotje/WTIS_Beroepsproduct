<?php
require_once "src/elements.php";
require_once "src/movieData.php";
require_once "src/genreData.php";
require_once "src/movieView.php";
require_once "src/genreView.php";

$title = "Films";
$movies = getMovies();
$genres = getAllGenres();


$genreFilter = "";
$titleFilter = "";

if (isset($_GET['genre']) && $_GET["genre"] !== "") {
    $genreFilter = $_GET['genre'];
}

if (isset($_GET['title']) && trim($_GET["title"]) !== "") {
    $titleFilter = $_GET['title'];
}
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