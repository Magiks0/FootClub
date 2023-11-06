<h1>Liste des équipes</h1>

<a href="/">Accueil</a>

<ul>
<?php

foreach ($teams as $team) { ?>
    <div class="teamInfos">
        <div class="teamPicture">
            <img src="" alt="photo_team_<?= $team[1]?>">
        </div>
        <div class="teamName">
            <p><?= $team[1] ?></p>
        </div>
        <div class="buttons">
            <button>Supprimer</button>
        </div>
    </div>
<?php } ?>
