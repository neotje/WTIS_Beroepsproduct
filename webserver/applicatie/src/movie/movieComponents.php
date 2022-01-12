<?php

function minutesToHourAndMinutes($minutes) {
    $hours = floor($minutes / 60);
    $remainingMinutes = $minutes % 60;

    return $hours . "h " . $remainingMinutes . "m";
}



function moviesToGridHTML($movies) {
    $moviesHTML = "";

    foreach ($movies as $movie) {

        $id = $movie["movieID"];
        $title = $movie["title"];
        $publicationYear = $movie["publicationYear"];
        $duration = minutesToHourAndMinutes($movie["duration"]);
        $img = $movie["coverImage"];

        $moviesHTML .= "
<a class='item' href='/film/$id'>
    <figure class='container'>
        <img src='$img' alt='$title' />
        <figcaption>
            <h4>$title</h4>
            <p>$publicationYear</p>
            <p>$duration</p>
        </figcaption>
    </figure>
</a>
        ";
    }

    return "<section class='image-grid'>$moviesHTML</section>";
}

function movieToHorizontalScrollList($movies) {

    $moviesHTML = "";

    foreach ($movies as $movie) {
        $id = $movie["movieID"];
        $title = $movie["title"];
        $img = getMovieCoverImageURL($movie);

        $moviesHTML .= "
<a href='/film/$id'>
    <img class='item' src='$img' alt='$title' />
</a>
        ";
    }

    return "
<div class='horizontal-scroll'>
    $moviesHTML
</div>
    ";
}

function movieDetailToAbout($movieDetails) {

    $title = $movieDetails['title'];
    $publicationYear = $movieDetails['publicationYear'];
    $duration = minutesToHourAndMinutes($movieDetails['duration']);
    $description = $movieDetails['description'];

    $genres = array();
    foreach ($movieDetails['genres'] as $genre) {
        $genres[] = $genre['genreName'];
    }

    $genresText = join(' ‧ ', $genres);

    return "
<section class='about'>
    <h1>$title</h1>
    <span>$publicationYear ‧ $genresText ‧ $duration</span>
    <p>
        $description
    </p>
</section>
    ";
}

function movieToTrailerVideo($movieDetails) {
    $url = "https://www.youtube.com/embed/XIMLoLxmTDw";

    if (isset($movieDetails['trailerURL']) && $movieDetails['trailerURL'] !== NULL) {
        $url = $movieDetails['trailerURL'];
    }

    return "
    <div class='movie-trailer elevation2'>
        <iframe src='$url?&autoplay=1&modestbranding=1' title='$movieDetails[title]' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
    </div>";
}

function movieToMoviePlayer($movieDetails) {
    $url = "https://www.youtube.com/embed/XIMLoLxmTDw";

    if (isset($movieDetails['movieURL']) && $movieDetails['movieURL'] !== NULL) {
        $url = $movieDetails['movieURL'];
    }

    return "
    <div class='movie-player elevation2'>
        <iframe src='$url?&autoplay=1&modestbranding=1' title='$movieDetails[title]' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
    </div>";
}

function movieToPlayButton($movieDetails, $show) {
    $html = "";
    $id = $movieDetails['movieID'];

    if ($show) {
        $html = "
        <p>Film afspelen:</p>
        <a href='/film/$id/kijken' class='play-button'>
            <div class='icon'></div>
        </a>
        ";
    }

    return $html;
}
