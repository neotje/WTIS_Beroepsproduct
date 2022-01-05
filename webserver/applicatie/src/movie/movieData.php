<?php
require_once "src/database.php";
require_once "src/genre/genreData.php";
require_once "src/person/personData.php";

function getMovieCoverImageURL($movie) {
    $coverImage = $movie["coverImage"];
    $imgUrl = "img/covers/";
    $filePath = "public/img/covers/$coverImage";

    if (is_file($filePath)) {
        $imgUrl .= $coverImage;
    } else {
        $imgUrl .= "unkown-cover.jpg";
    }

    return $imgUrl;
}

function getMovies($genre = "", $title = "") {
    $sql = "SELECT m.* FROM Movie m";
    $params = array();

    $genre = trim($genre);
    $title = trim($title);

    if ($genre !== "") {
        $sql .= " JOIN MovieGenre mg on m.movieID = mg.movieID";
        $sql .= " WHERE mg.genreName = :genre";
        $params[":genre"] = $genre;
    }

    if ($title !== "") {
        if ($genre !== "") {
            $sql .= " AND";
        } else {
            $sql .= " WHERE";
        }

        $sql .= " LOWER(m.title) LIKE '%' + LOWER(:title) + '%'";
        $params[":title"] = $title;
    }

    $sql .= " ORDER BY m.title";
    $query = databasePrepare($sql);
    $query->execute($params);

    $rows = $query->fetchAll();
    $movies = array();

    foreach ($rows as $row) {
        $row["coverImage"] = getMovieCoverImageURL($row);
        $movies[] = $row;
    }

    return $movies;
}

function getRandomMovies($amount) {
    $query = databasePrepare("SELECT TOP $amount * FROM Movie m ORDER BY NEWID()");
    $query->execute();

    return $query->fetchAll();
}

function getMovieDetail($id) {
    $query = databasePrepare("
SELECT m.title, m.publicationYear, m.duration, m.description, m.coverImage, m.trailerURL, m.movieURL
FROM Movie m 
WHERE m.movieID = :movieID 
    ");

    $query->execute([":movieID" => $id]);

    if ($query->rowCount() < 1) {
        throw new RuntimeException("Movie does not exists!", 404);
    }

    $movie = $query->fetch();

    $movie["cast"] = getMovieCast($id);
    $movie["genres"] = getMovieGenres($id);
    $movie["directors"] = getMovieDirectors($id);

    return $movie;
}
