<?php
require_once "src/user/userComponents.php";

function getHeader($title) {
    return "
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='/img/netflex-logo.png' type='image/png'>
    <link rel='stylesheet' href='/css/style.css'>
    <title>$title</title>
</head>
    ";
}

function getButton($href, $name, $extraClasses = "", $type = "", $element = "a") {
    $class = "button";

    if ($type !== "") {
        $class .= "--$type";
    }

    return "<$element href='$href' class='$class $extraClasses'>$name</$element>";
}

function getNavBar() {
    return "
<nav>
    " . getButton("/", "<img src='/img/netflex.png' alt='home'>", "img-button") . "

    <div class='group'>
        " . getButton("/films", "Films") . "
        " . getButton("/over", "Over") . "
    </div>

    " . getUserNavBarHTML() . "
</nav>
    ";
}

function getFooter() {
    return "
<footer>
    <div class='footer-container'>
        <p class='contact'>
            Vragen? Bel <a href='tel:+31639775282'>+31 6 39775282</a>
            of mail naar <a href='mailto:NP.Hop@Student.HAN.nl'>NP.Hop@Student.HAN.nl</a>
        </p>
        <section class='overview'>
            <h6>Pagina's</h6>
            <ul class='link-list'>
                <li>
                    <a href='/'>Home</a>
                </li>
                <li>
                    <a href='/films'>Film overzicht</a>
                </li>
                <li>
                    <a href='/login'>login</a>
                </li>
                <li>
                    <a href='/registreren'>registratie</a>
                </li>
            </ul>
        </section>
        <section class='website-info'>
            <h6>Info</h6>
            <ul class='link-list'>
                <li>
                    <a href='/privacy'>Privacy Verklaring</a>
                </li>
                <li>
                    <a href='/over'>Over ons</a>
                </li>
            </ul>
        </section>
    </div>
</footer>
    ";
}

function getTextField($label, $name, $attributes = array("type" => "text"), $value = "") {
    $attributesHTML = "";

    foreach ($attributes as $key => $val) {
        if (is_int($key)) {
            $attributesHTML .= " $val";
        } else {
            $attributesHTML .= " $key='$val'";
        }
    }

    return "
<div class='text-field'>
    <input name='$name' placeholder=' ' value='$value' $attributesHTML>
    <label>$label</label>
</div>
    ";
}
