<?php
$url = 'assets/json/todo.json'; //Chemin url
$data = file_get_contents($url); //mets les données json dans une variable
$taches = json_decode($data); //décode les données json
function todo($taches) //Affichage des tâches à faire
{
    foreach ($taches as $value => $row){
        if ($taches[$value]->{'done'} == false){
            echo "<p class='todop'><input type='checkbox' name='name[]' value='".$taches[$value]->{'tache'}."' class='checkbox'>".$taches[$value]->{'tache'}."</p>";   
        }
    }
}
function done($taches)
{
    foreach ($taches as $value => $row){
        if ($taches[$value]->{'done'} == true){
            echo "<p class='isdop'><input type='checkbox' value='".$taches[$value]->{'tache'}."' class='checkbox' disabled='disabled' checked='checked'>".$taches[$value]->{'tache'}."</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ma ToDolist Json</title>
</head>
<body>
<h2>To Do List :</h2>
<form id="ToDo" method="post" action="formulaire.php">
    <fieldset class="1eresection">
        <div class='main'>
            <div id='encours'>
                <h3>À faire :</h3>
                <?php todo($taches) ?>
            </div>
        </div>
        <input type="submit" value="Archiver" name="afaire">
		<input type="submit" value="Supprimer" name="delete">
    </fieldset>
    <fieldset class="2emesection">
    <div class='main'>
        <div id='fait'>
            <h3>Archives :</h3>
            <?php done($taches) ?>
        </div>
    </div>
    </fieldset>
</form>
<form id="ajouter" method="post" action="formulaire.php">
    <fieldset class="3emesection">
        <legend class="w-auto">Ajouter</legend>
            <input type="text" name="ajouter">
        <input type="submit" value="Ajouter" name="ajout" id="ajout" class="col-md-9">
    </fieldset>
</form>
<?php
//foreach ($taches as $tache) {
//	echo $tache->tache . '<br>';
//}
?>
</body>
</html>