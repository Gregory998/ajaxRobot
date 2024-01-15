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

<a href="index_validation.php">Index de Validation</a>
<a href="index.php">Index</a>


<?php

$pdo = new PDO("mysql:host=localhost;dbname=robot", "gregory", "Stagiaire");

    if ( isset($_GET['id'])) {

        $id = $_GET['id'];
        $sql = "SELECT * FROM robotic_core WHERE id=$id";
        $stmt = $pdo->query($sql);
        $core = $stmt->fetch(PDO::FETCH_ASSOC);

        $show_button_text = $core['isValid'] ? "Invalider" : "Valider";
        $show_li_state = $core['isValid'] ? "Actuellement validé" : "Actuellement invalidé";

    }
?>

<h1><?= htmlentities($core['name'])?></h1>

<ul>
    <li><?= $core['id'] ?></li>
    <li><?= $core['brand']?></li>
    <li><?= htmlentities($core['power'])?></li>
    <li><?= $core['factoryId']?></li>
    <li id="liState"><?= $show_li_state?></li>
</ul>

<h4>Liste des pièces</h4>
<ul id="list">
    <?php
    $core_id = $core['id'];
    $sqlPartCore = "SELECT * FROM robotic_parts WHERE id_core = $core_id";
    $stmtPartCore = $pdo->query($sqlPartCore);
    $partsCore = $stmtPartCore->fetchAll(PDO::FETCH_ASSOC);
    foreach ($partsCore as $pc){
        $id_part = $pc['id'];
    ?>

        <li><?= htmlentities($pc['name']) ?> <button class="remove" data-part="<?= $id_part ?>" data-core="<?= $core_id ?>"   >❌</button></li>

    <?php }?>
</ul>


<button id="btn" data-core="<?= $core['id'] ?>"><?= $show_button_text ?></button>

<br>

<form id="addPart" action="">
    <label for="id_part">Selection d'une piece pour le noyau</label><br>
        <select name="id_part" id="select">
            <?php
            $sqlPart = "SELECT * FROM robotic_parts WHERE id_core IS NULL";
            $stmt_part = $pdo->query($sqlPart);
            $parts = $stmt_part->fetchAll(PDO::FETCH_ASSOC);
            foreach ($parts as $part) {
                ?>
                <option value="<?= $part['id'] ?>"><?= $part['name'] ?></option>
            <?php }?>
        </select>
    <input type="hidden" name="id_core" value="<?= $core['id'] ?>">

    <input type="submit" >Ajouter cette pièce</input>
</form>




<script>


    const btn = document.getElementById('btn');
    const li = document.getElementById('liState')

    btn.addEventListener('click', function (){

        id = this.dataset.core;
        const form = new FormData();
        form.append("id", id)

        data = {
            method: "POST",
            body: form
        }

        fetch('show_core_validation.php', data)
            .then(response => response.json())
            .then(dataCore => {
                if( dataCore.status === 200){

                    // La valeur d'affichage du bouton de validation est égale à :
                    // Si dataCore.state est true alors le bouton affichera "Invalider" sinon il affichera "Valider"

                    btn.innerHTML = dataCore.state ? "Invalider" : "Valider"

                    // La valeur d'affichage du li  est égale à :
                    // Si dataCore.state est true alors le bouton affichera "Actuellement validé" sinon il affichera "Actuellement invalidé"

                    li.innerHTML = dataCore.state ? 'Actuellement validé' : 'Actuellement invalidé'

                    // DANS UN TERNAIRE:

                    // valeur à assigner = une variable à verifier : si elle est true on prend la valeure apres le ?, si elle est fausse
                    // on prend la valeure apres le :
                }
            })
    })

//     __________.__
// \______   \__| ____   ____  ____
//     |     ___/  |/ __ \_/ ___\/ __ \
//     |    |   |  \  ___/\  \__\  ___/
//     |____|   |__|\___  >\___  >___  >
//                   \/     \/    \/

const add = document.getElementById("addPart");

    add.addEventListener("submit", function (e){

        e.preventDefault();

        const form = new FormData(e.target);
        const data = {
            body: form,
            method: "POST"
        }

        ajaxRobot('add_part.php', data)
    })


    // \______   \_   _____/  /     \  \_____  \   \ /   /\_   _____/ \______   \   \_   _____/\_   ___ \\_   _____/
    // |       _/|    __)_  /  \ /  \  /   |   \   Y   /  |    __)_   |     ___/   ||    __)_ /    \  \/ |    __)_
    // |    |   \|        \/    Y    \/    |    \     /   |        \  |    |   |   ||        \\     \____|        \
    // |____|_  /_______  /\____|__  /\_______  /\___/   /_______  /  |____|   |___/_______  / \______  /_______  /
    //     \/        \/         \/         \/                 \/                        \/         \/        \/

    function addListenerLi() {
        const links = document.querySelectorAll('.remove');

        links.forEach(link => {
        link.addEventListener("click", function(){

            id_part = this.dataset.part;
            id_core = this.dataset.core;
            const form = new FormData();
            form.append("id_part", id_part)
            form.append("id_core", id_core)


            const data = {
                method: "POST",
                body: form
            }

            ajaxRobot('remove_part.php', data)
        })
    })
    }

    function ajaxRobot(targetFile, data) {
        fetch(targetFile, data)
            .then(response => response.json())
            .then(dataPart => {
                console.log(dataPart.options)
                const update = document.getElementById("select")
                update.innerHTML = dataPart.options;

                const list = document.getElementById('list');
                list.innerHTML = dataPart.li;
                addListenerLi();
            })
    }

    addListenerLi();
</script>
</body>
</html>