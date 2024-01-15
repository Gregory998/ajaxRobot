<?php
$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

if ( !empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql_r = "SELECT isValid FROM robotic_core WHERE id=$id";
    $stmt_r = $pdo->query($sql_r);
    $state_validation_array = $stmt_r->fetch(PDO::FETCH_ASSOC);

    // Mettre un ! devant un booléen inverse son état, true devient false, ou false devient true
    // (int) est un casting c'est à dire on convertit le type en un autre. Si c'est possible.
    $state_validation =  (int)!$state_validation_array['isValid'];



    $sql = "UPDATE robotic_core SET isValid=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $exec = $stmt->execute([$state_validation, $id]);
    if ( $exec) {
        echo json_encode([
            'status' => 200,
            'state' => $state_validation
        ]);
    }else {
        echo json_encode([
            'status' => 400
        ]);
    }
}else {
    echo json_encode("Tu n'arrives même pas à remplir correctement un putain d'AJAX !!!!!");
}