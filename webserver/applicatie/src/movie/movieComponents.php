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

function movieDetailToAbout($details) {

    $title = $details['title'];
    $publicationYear = $details['publicationYear'];
    $duration = minutesToHourAndMinutes($details['duration']);
    $description = $details['description'];

    $genres = array();
    foreach ($details['genres'] as $genre) {
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
