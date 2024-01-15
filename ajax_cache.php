<?php

function makeOption() {
    $pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");
    ob_start();
    $sqlPart = "SELECT * FROM robotic_parts WHERE id_core IS NULL";
    $stmt_part = $pdo->query($sqlPart);
    $parts = $stmt_part->fetchAll(PDO::FETCH_ASSOC);
    foreach ($parts as $part) {
        ?>
        <option value="<?= $part['id'] ?>"><?= $part['name'] ?></option>
    <?php }
    return ob_get_clean();
}

function makeLi($id_core) {
    $pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");
    ob_start();
    $sqlPartCore = "SELECT * FROM robotic_parts WHERE id_core = $id_core";
    $stmtPartCore = $pdo->query($sqlPartCore);
    $partsCore = $stmtPartCore->fetchAll(PDO::FETCH_ASSOC);
    foreach ($partsCore as $pc){
        $id_part = $pc['id'];
    ?>

        <li><?= htmlentities($pc['name']) ?> <button class="remove" data-part="<?= $id_part ?>" data-core="<?= $id_core ?>" >❌</button></li>

    <?php
    }
    return ob_get_clean();
}

?>