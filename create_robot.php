<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

if (!empty($_POST['name']) && !empty($_POST['brand']) && !empty($_POST['power'])) {

    $factory_id = sha1($_POST['name'] . $_POST['power']); // CHAWANNE

    $sql = "INSERT INTO robotic_core (name, brand, power, factoryId, isValid) VALUES (?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $exec = $stmt->execute([$_POST['name'], $_POST['brand'], $_POST['power'], $factory_id, 0]);

    if ($exec) {
        echo "Ok c'est ok";
        header("Location:index_validation.php");
    }else {
        echo "Probleme dans la BDD, appel le dèv !";
    }
}else {
    echo "T'as rempli comme une merde ton formulaire. Recommence !!!!!!!!!!";
}