<?php

function genresToSelect($genres, $selectedGenre) {
    $options = "<option value=''>Alles</option>";

    foreach ($genres as $genre) {
        $selectedAttr = "";

        if ($genre == $selectedGenre) {
            $selectedAttr = "selected";
        }

        $options .= "<option value='$genre' $selectedAttr>$genre</option>";
    }

    return "
<div class='select-field'>
    <select id='genre' name='genre'>
        $options
    </select>
</div>
    ";
}
