<!--Variables et fonctions-->

<?php
//Variables
$url = 'assets/json/todo.json'; //Chemin url
$data = file_get_contents($url); //mets les données json dans une variable
$taches = json_decode($data); //décode les données json
$json = json_encode($taches); //encode les changements
//Fonctions
function todo($taches) //Affichage des tâches à faire
{
    foreach ($taches as $value => $row){
        if ($taches[$value]->{'done'} == false){
            echo "<p><input type='checkbox' name='check1' value='value1' >".$taches[$value]->{'tache'}."</p>";   
        }
    }
}
function done($taches)
{
    foreach ($taches as $value => $row){
        if ($taches[$value]->{'done'} == true){
            echo "<p><input type='checkbox' name='check1' value='value1' disabled='true' checked='true'>".$taches[$value]->{'tache'}."</p>";
        }
    }
}
//CA MARCHE PAS
//function archiver()
//{
//    foreach ($taches as $value=> $row){
//        if (empty($_POST['check1'])){     //Si la checkbox est vide, on reste sur "todo"
//            todo();
//        }
//        else{                             //else on encode dans les lignes cochées true pour la valeur 'done'
//            $taches['done'] = true;
//            file_put_contents('todo.json', $json);
//            done();
//        }
//    }
//}

?>

<!--HTML-->

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

<!--A faire-->

    <fieldset class="1eresection">
        <div class='main'>
            <div id='encours'>
                <h3>À faire :</h3>
                <?php todo($taches) ?>
            </div>
        </div>
        <input type="submit" value="Archiver" onclick="archiver()" name="afaire">
		<input type="submit" value="Supprimer" onclick="supprimer()" name="delete">
    </fieldset>

<!--Fait-->

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

?>
</body>
</html>