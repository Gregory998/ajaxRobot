<?php

include_once "ajax_cache.php";

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

if (!empty($_POST['id_part']) && !empty($_POST['id_core'])) {



    $sql = "UPDATE robotic_parts SET id_core=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $exec = $stmt->execute([$_POST['id_core'], $_POST['id_part']]);
    if ($exec) {
        $options = makeOption();
        $li = makeLi($_POST['id_core']);
        echo json_encode([
            'status' => 200,
            'options' => $options,
            'li' => $li
        ]);
    } else {
        echo json_encode([
            'status' => 400
        ]);
    }
} else {
    echo json_encode("Tu n'arrives même pas à remplir correctement un putain d'AJAX !!!!!");
}

?>
