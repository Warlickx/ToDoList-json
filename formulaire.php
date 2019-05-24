<?php
require('contenu.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <section class="container-fluid maincontent">
        <div class="top">
            <h3>To Do List SQL</h3>
        </div>
        <div class="middle">
            <h5>Tâches</h5>
            <form method="POST">
                <?php
                if (is_array($array_data)) {
                    foreach ($array_data as $value) {
                        if ($value['bool'] === 0) {
                            echo "<p><input type='checkbox' name='checkbox[]' value='" . $value['ID'] . "' />" . " " . $value['taches'] . "</p>";
                        }
                    }
                } ?>
                <button type="submit" name="archive" class="btn btn-secondary my-3">Archiver</button>
                <button type="submit" name="delete" class="btn btn-danger my-3">Supprimer</button>
            </form>
            <h5>Archives</h5>
            <?php
            if (is_array($array_data)) {
                foreach ($array_data as $value) {
                    if ($value['bool'] === 1) {
                        echo "<p><input type='checkbox' name='checkbox[]' disabled='disabled' checked='checked' /><strike>" . " " . $value['taches'] . "</strike></p>";
                    }
                }
            } ?>
        </div>
        <form action="index.php" method="POST">
            <div class="bottom">
                <h6>Nouvelles Tâches</h6>
                <textarea rows="5" col="100" class="taches mt-3" name="taches"></textarea>
                <?php echo "<p>" . $error . "</p>" ?>
                <p><button type="submit" name="submit" value="Envoyer" class="btn btn-secondary my-3">Envoyer</button></p>
        </form>
        </div>
    </section>
</body>

</html>