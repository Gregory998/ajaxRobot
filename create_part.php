<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

if (!empty($_POST['name'])) {

    $sql = "INSERT INTO robotic_parts (name, id_core) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $exec = $stmt->execute([$_POST['name'],null]);

    if ($exec) {
        echo "Ok c'est ok";
        header("Location:index_validation.php");
    }else {
        echo "Probleme dans la BDD, appel le dèv !";
    }
}else {
    echo "T'as rempli comme une merde ton formulaire. Recommence !!!!!!!!!!";
}