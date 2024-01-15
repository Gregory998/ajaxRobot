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

<a href="index_validation.php">Index de validation</a>
<h1>Créateur de pièce pour noyau</h1>

<form action="create_part.php" method="post">

    <label for="name">Nom de la pièce</label>
    <input type="text" name="name">

    <input type="submit" value="Créer une pièce">

</form>

<ul>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

$sql = "SELECT * FROM robotic_parts";
$stmt = $pdo->query($sql);
$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($parts as $part) {
?>

    <li><?= $part['name'] ?></li>


<?php } ?>


</ul>




</body>
</html>
