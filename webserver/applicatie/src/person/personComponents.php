<?php

function personsToAvatarList($persons) {
    $personsHTML = "";

    foreach ($persons as $person) {

        $personImage = $person["personImage"];
        $name = $person["name"];

        $secondaryNameHTML = "";

        if (isset($person["characterName"])) {
            $secondaryNameHTML = "<p class='secondary-name'>Als $person[characterName]</p>";
        }

        $personsHTML .= "
<li>
    <figure>
        <img src='$personImage' alt='$name'>
        <figcaption class='names'>
            <p class='name'>$name</p>
            $secondaryNameHTML
        </figcaption>
    </figure>
</li>
        ";
    }

    return "<ul class='avatar-list'>$personsHTML</ul>";
}
