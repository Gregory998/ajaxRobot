<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemple de Select et Bouton</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-zk+ek57F4T4AJ58U6CIsz9J69/w1odwmYUU6eHf9j+3Sj/3X1jSn1/8O8gqYsYfzB12C+4r+fp2TnIc5HgC7eg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<a href="create_robot_form.php">Ajouter un noyau</a>
<a href="index_validation.php">Index de validation</a>


<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

$sql = "SELECT * FROM robotic_core WHERE isValid=1";
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
    </tr>



  <?php } ?>

  </tbody>


</table>


</body>
</html>
