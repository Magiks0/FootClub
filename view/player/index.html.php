<h1>Liste des joueurs</h1>

<a href="/FootClub/">Accueil</a>

<ul>
<?php

foreach ($players as $player) {
    echo '<li>'.$player->getFirstName()." ".$player->getLastName()." ".$player->getBirthdate()->format('d-m-Y').'</li>';
}

?>
</ul>
