<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="create_robot_form.php">Ajouter un noyau</a>
<a href="index.php">Index</a>
<a href="create_part_form.php">Ajouter une pièce</a>

<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

    $sql = "SELECT * FROM robotic_core";
    $stmt = $pdo->query($sql);
    $cores = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Marque</th>
            <th>Puissance</th>
            <th>Id Usine</th>
            <th>Activé</th>
            <th>Voir</th>
        </tr>
    </thead>

    <tbody>

        <?php
            foreach ($cores as $core) {
        ?>

            <tr>
                <td><?= $core['id'] ?></td>
                <td><?= htmlentities($core['name'])?></td>
                <td><?= $core['brand'] ?></td>
                <td><?= htmlentities($core['power'])?></td>
                <td><?= $core['factoryId']?></td>
                <td><?= $core['isValid']?></td>
                <td><a href="<?= 'show_core.php?id=' . $core['id'] ?>">Voir</a></td>
            </tr>



        <?php } ?>

    </tbody>


</table>






</body>
</html>