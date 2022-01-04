<?php
require_once "src/database.php";

function getMovies() {
    $query = databasePrepare("select * from Movie");
    $query->execute();

    return $query->fetchAll();
}

function getMovieGenres($id) {
    $query = databasePrepare("
SELECT g.genreName, g.description
FROM Genre g 
JOIN MovieGenre mg on g.genreName = mg.genreName 
WHERE mg.movieID = :movieID
    ");

    $query->execute([":movieID" => $id]);

    return $query->fetchAll();
}

function getMovieCast($id) {
    $query = databasePrepare("
SELECT p.firstName + ' ' + p.lastName AS name, p.gender, mc.characterName
FROM Person p 
JOIN MovieCast mc on p.personID = mc.personID 
WHERE mc.movieID = :movieID
    ");

    $query->execute([":movieID" => $id]);
    return $query->fetchAll();
}

function getMovieDirectors($id) {
    $query = databasePrepare("
SELECT p.firstName + ' ' + p.lastName AS name, p.gender
FROM Person p 
JOIN MovieDirector md on p.personID = md.personID 
WHERE md.movieID = :movieID
    ");

    $query->execute([":movieID" => $id]);
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
