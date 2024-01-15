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
    <h1>Créateur de Noyau</h1>

    <form action="create_robot.php" method="post">

        <label for="name">Name</label>
        <input type="text" name="name">

        <label for="brand">Marque</label>
        <select name="brand" id="">
            <option value="Tulaissela">Tulaissela</option>
            <option value="Blouson Dynamite">Blouson Dynamite</option>
            <option value="Deux Laure et Anne">Deux Laure et Anne</option>
        </select>

        <label for="power">Puissance</label>
        <input type="text" name="power">

        <input type="submit" value="Créer le Noyau">

    </form>
</body>
</html>

