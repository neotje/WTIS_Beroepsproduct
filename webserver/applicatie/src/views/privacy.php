<?php
require_once "src/uiComponents.php";

$title = "404";
?>

<!DOCTYPE html>
<html lang="en">

<?= getHeader($title) ?>

<body>
    <?= getNavBar() ?>

    <main>
        <section class="statement">
            <h1>Privacy Verklaring</h1>
            <article>
                <h2>Contact opnemen</h2>
                <p>
                    Voor vragen? Neem dan contact op via
                    <a href="tel:+31639775282">+31 6 39775282</a>
                    of mail naar
                    <a href="mailto:NP.Hop@Student.HAN.nl">NP.Hop@Student.HAN.nl</a>
                </p>
            </article>
            <article>
                <h2>Verwerken wij persoonsgegevens?</h2>
                <p>
                    Ja, wij slaan persoonsgegevens op. Deze worden gebruikt om u te kunnen identificeren als u inlogt.
                </p>
            </article>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>