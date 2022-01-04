<?php

function getHTMLHeader($title) {
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

function getButton($href, $name, $extraClasses = "", $type = "") {
    $class = "button";

    if ($type !== "") {
        $class .= "--$type";
    }

    return "<a href='$href' class='$class $extraClasses'>$name</a>";
}

function getHTMLNavBar() {
    return "
<nav>
    " . getButton("/", "<img src='/img/netflex.png' alt='home'>", "img-button") . "

    <div class='group'>
        " . getButton("/films", "Films") . "
        " . getButton("/over", "Over") . "
    </div>

    <div class='dropdown'>
        <div class='dropdown-button button--primary'>Account</div>
        <div class='dropdown-content'>
            " . getButton("/registreren", "Registreren") . "
            " . getButton("/login", "Login") . "
        </div>
    </div>
</nav>
    ";
}

function getHTMLFooter() {
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
                    <a href='/index.html'>Home</a>
                </li>
                <li>
                    <a href='/films.html'>Film overzicht</a>
                </li>
                <li>
                    <a href='/login.html'>login</a>
                </li>
                <li>
                    <a href='/registreren.html'>registratie</a>
                </li>
            </ul>
        </section>
        <section class='website-info'>
            <h6>Info</h6>
            <ul class='link-list'>
                <li>
                    <a href='/privacy.html'>Privacy Verklaring</a>
                </li>
                <li>
                    <a href='/about.html'>Over ons</a>
                </li>
            </ul>
        </section>
    </div>
</footer>
    ";
}
