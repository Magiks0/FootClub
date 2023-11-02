<?php

namespace App\Controller;

use App\Database\PlayerDatabase;
use App\Model\Player;
use App\Model\Form;

class PlayerController extends AbstractController
{
    public function index(): string
    {
        return $this->render('player/listeJoueur.html.php', [
            'players' => PlayerDatabase::findAll()
        ]);
    }

    public function add(): string
    {
        // On instancie le formulaire
        $formAjoutJoueur = new Form();

        // On ajoute chacune des parties qui nous intéressent
        $formAjoutJoueur->debutForm()
            ->ajoutLabelFor('lastName', 'Nom')
            ->ajoutInput('text', 'lastName')
            ->ajoutLabelFor('firstName', 'Prénom')
            ->ajoutInput('text', 'firstName')
            ->ajoutLabelFor('birthdate', 'Née le')
            ->ajoutInput('date', 'birthdate')
            ->ajoutBouton('Créer le joueur')
            ->finForm()
        ;

        if(!empty($_POST)){
            if($formAjoutJoueur::validate($_POST, ['lastName', 'firstName', 'birthdate'])){
                $birthdate = new \DateTime($_POST['birthdate']);
                $player = new Player($_POST['firstName'], $_POST['lastName'], $birthdate);
                PlayerDatabase::add($player);
            }
        }

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        return $this->render('player/ajoutJoueur.html.php', ['formAjout' => $formAjoutJoueur->create()]);
    }

    public function modify()
    {

        $result = PlayerDatabase::findSelected();

        // On instancie le formulaire
        $formModifJoueur = new Form();

        // On ajoute chacune des parties qui nous intéressent
        $formModifJoueur->debutForm()
            ->ajoutLabelFor('lastName', 'Nom')
            ->ajoutFilledInput('text', 'lastName', 'value ='.$result['lastname'])
            ->ajoutLabelFor('firstName', 'Prénom')
            ->ajoutFilledInput('text', 'firstName', 'value = '.$result['firstname'])
            ->ajoutLabelFor('birthdate', 'Née le')
            ->ajoutFilledInput('date', 'birthDate','value ='.$result['birthdate'])
            ->ajoutBouton('Modifier')
            ->ajoutRetour('Annuler', 'players')
            ->finForm()
        ;
        if(!empty($_POST)){
                PlayerDatabase::modify();
                header('Location: players');  
        }

        return $this->render('player/modifJoueur.html.php',['formModif' => $formModifJoueur->create()]);
    }
}