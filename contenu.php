<?php
//Permet d'empêcher l'affichage d'erreurs avec un is_array() sur le formulaire
$current_data = file_get_contents('todolist.json');
$array_data = json_decode($current_data, true);
//Déclare la variable error vide pour l'utiliser dans les conditions
$error = " ";
if (isset($_POST['submit'])) {
    $taches = filter_var($_POST['taches'], FILTER_SANITIZE_STRING);
    // $taches = $_POST['taches'];
    if (!empty($taches)) {
        $current_data = file_get_contents('todolist.json');
        $array_data = json_decode($current_data, true);
        $extra = array(
            'ID' => $i = 0,
            'taches' => $taches,
            'bool' => 0
        );
        $array_data[] = $extra;
        foreach ($array_data as $key => $val) {
            $array_data[$key]['ID'] = $i++;
        }
        $final_data = json_encode($array_data);
        file_put_contents('todolist.json', $final_data);
    } else {
        $error = "Veuillez saisir une tâche dans le champ ci-dessus.";
    }
}
if (isset($_POST['archive'])) {
    if (!empty($_POST['checkbox'])) {
            for ($i = 0; $i < count($_POST['checkbox']); $i++) {
                $checkbox = $_POST['checkbox'][$i];
                foreach ($array_data as $key => $value) {
                    $array = $array_data[$key]['ID'];
                    if($array === (int)$checkbox){
                        $array_data[$key]['bool'] = 1;
                    }
                }
            }
            $final_data = json_encode($array_data);
            file_put_contents('todolist.json', $final_data);
        }
    }
if (isset($_POST['delete'])) {
    if (!empty($_POST['checkbox'])) {
        for ($i = 0; $i < count($_POST['checkbox']); $i++) {
            $checkbox = $_POST['checkbox'][$i];
            foreach ($array_data as $key => $value) {
                $array = $array_data[$key]['ID'];
                if($array === (int)$checkbox){
                    unset($array_data[$key]);
                }
            }
        }
        $final_data = json_encode($array_data);
        file_put_contents('todolist.json', $final_data);
    }
}