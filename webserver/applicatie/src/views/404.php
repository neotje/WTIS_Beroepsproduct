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
        <section class="landing">
            <div class="gradient"></div>
            <h1>Ik ken deze pagina niet.</h1>
        </section>
    </main>

    <?= getFooter() ?>
</body>

</html>