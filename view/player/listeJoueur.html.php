<h1>Liste des joueurs</h1>

<a href="/">Accueil</a>

<ul>
<?php
foreach ($players as $player) { ?>
    <div class="playerInfos">
        <div class="playerPicture">
            <img src="assets" alt="photo_joueur_<?= $player->getLastName()?>">
        </div>
        <div class="playerNames">
            <p><?= $player->getFirstName()." ".$player->getLastName()?></p>
        </div>
        <div class="playerBirth">
            <p>Née le: <?= $player->getBirthDate()->format('d-m-Y')?></p>
        </div>
        <div>
            <button>Supprimer</button>
            <a href="modif?id=<?= $player->getId()?>">Modifier</a>
        </div>
    </div>
<?php } ?>



