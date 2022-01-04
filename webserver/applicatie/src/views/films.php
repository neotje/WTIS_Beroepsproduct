<?php
require_once "src/elements.php";
require_once "src/movieData.php";
require_once "src/movieView.php";

$title = "Films";
$movies = getMovies();

?>

<!DOCTYPE html>
<html lang="en">

<?= getHTMLHeader($title) ?>

<body>
    <?= getHTMLNavBar() ?>
    <?= moviesToGridHTML($movies) ?>
    <?= getHTMLFooter() ?>
</body>

</html>