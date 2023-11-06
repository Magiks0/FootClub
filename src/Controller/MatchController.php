<?php

namespace App\Controller;

use App\Database\MatchDatabase;
use App\Model\Team;
use App\Model\FootClubMatch;
use App\Model\Form;


class TeamController extends AbstractController
{
    public function liste(): string
    {
        return $this->render('team/listeEquipes.html.php', [
            'matchs' => MatchDatabase::findAll()
            
        ]);
    }

    public function add()
    {
        // On instancie le formulaire
        $formAjoutMatch = new Form();
        
        // On ajoute chacune des parties qui nous intéressent
        $formAjoutMatch->debutForm()
            ->ajoutLabelFor('name', 'Nom de l équipe:')
            ->ajoutInput('text', 'name')
            ->ajoutBouton('Créer la team')
            ->finForm()
        ;

        if(!empty($_POST)){
            if($formAjoutMatch::validate($_POST, ['name'])){
                // $match = new FootClubMatch($_POST['name']);
                // $playerHasTeam = new PlayerHasTeam($player, $_POST['team'], $_POST['role']);
                // MatchDatabase::add($match);
            }
        }

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        // return $this->render('team/ajoutTeam.html.php', ['formAjout' => $formAjoutTeam->create()]);
    }

    // public function modify()
    // {

    //     $result = PlayerDatabase::findSelected();

    //     // On instancie le formulaire
    //     $formModifJoueur = new Form();

    //     // On ajoute chacune des parties qui nous intéressent
    //     $formModifJoueur->debutForm()
    //         ->ajoutLabelFor('lastName', 'Nom')
    //         ->ajoutFilledInput('text', 'lastName', 'value ='.$result['lastname'])
    //         ->ajoutLabelFor('firstName', 'Prénom')
    //         ->ajoutFilledInput('text', 'firstName', 'value = '.$result['firstname'])
    //         ->ajoutLabelFor('birthdate', 'Née le')
    //         ->ajoutFilledInput('date', 'birthDate','value ='.$result['birthdate'])
    //         ->ajoutBouton('Modifier')
    //         ->ajoutRetour('Annuler', 'players')
    //         ->finForm()
    //     ;
    //     if(!empty($_POST)){
    //             PlayerDatabase::modify();
    //             // PlayerHasTeamDatabase::modify();
    //             header('Location: players');  
    //     }

    //     return $this->render('player/modifJoueur.html.php',['formModif' => $formModifJoueur->create()]);
    // }
}