<?php
require_once "src/database.php";

function getAllGenres() {
    $query = databasePrepare("
select g.genreName 
from Genre g 
order by g.genreName
    ");

    $query->execute();
    $rows = $query->fetchAll();
    $genres = array();

    foreach ($rows as $row) {
        $genres[] = $row["genreName"];
    }

    return $genres;
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
