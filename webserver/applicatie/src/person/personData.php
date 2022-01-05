<?php

function getPersonImageURL($person) {
    $personImage = $person["personImage"];

    $imgUrl = "/img/persons";
    $filePath = "public/$imgUrl/$personImage";

    if (is_file($filePath)) {
        $imgUrl .= "/$personImage";
    } else {
        $imgUrl .= "/unkown-person.jpg";
    }

    return $imgUrl;
}

function getMovieCast($id) {
    $query = databasePrepare(
        "SELECT p.firstName + ' ' + p.lastName AS name, p.gender, mc.characterName, p.personImage
        FROM Person p 
        JOIN MovieCast mc on p.personID = mc.personID 
        WHERE mc.movieID = :movieID"
    );

    $query->execute([":movieID" => $id]);
    $rows = $query->fetchAll();

    $cast = array();
    foreach ($rows as $row) {
        $row["personImage"] = getPersonImageURL($row);
        $cast[] = $row;
    }

    return $cast;
}

function getMovieDirectors($id) {
    $query = databasePrepare(
        "SELECT p.firstName + ' ' + p.lastName AS name, p.gender, p.personImage
        FROM Person p 
        JOIN MovieDirector md on p.personID = md.personID 
        WHERE md.movieID = :movieID"
    );

    $query->execute([":movieID" => $id]);
    $rows = $query->fetchAll();

    $directors = array();
    foreach ($rows as $row) {
        $row["personImage"] = getPersonImageURL($row);
        $directors[] = $row;
    }

    return $directors;
}
