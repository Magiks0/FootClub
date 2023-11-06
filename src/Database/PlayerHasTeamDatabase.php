<?php

namespace App\Database;

use App\Model\PlayerHasTeam;
use App\Model\Team;

final readonly class PlayerHasTeamDatabase
{
    private static function databaseName(): string
    {
        return 'player_has_team';
    }

    public static function add(PlayerHasTeam $playerHasTeam)
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('INSERT INTO player_has_team (player_id, team_id, role) VALUES (:player, :team, :role);');
        $playerId = $playerHasTeam->getPlayer()->getId();
        $playerTeam = $playerHasTeam->getTeam()->getId();
        $playerRole = $playerHasTeam->getRole();

        // Utilisez bindParam pour lier les variables par référence
        $request->bindParam('player', $playerId);
        $request->bindParam('team', $playerTeam);
        $request->bindParam('role', $playerRole);

        return $request->execute();
    }

    public static function selectTeams(): array
    {
        $connection = Database::Connect();

        $query = sprintf("  SELECT id, name
                            FROM team T", self::databaseName());
        $query = $connection->prepare($query);
        $query->execute();
        
        $results = $query->fetchAll();

        $teams = [];

        foreach($results as $result){
            $teams[] = Team::fromArray($result);
        }

        return $teams;   
    }


    public static function findSelectedTeam(): array
    {
        $connection = Database::Connect();

        $query = sprintf("  SELECT name 
                            FROM team, player_has_team 
                            WHERE player_id = :id", self::databaseName());
        $query = $connection->prepare($query);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();

        $result = $query->fetch();

        return $result;
    }

    public static function modify(): bool
    {
        $connection = Database::Connect();
        $request = $connection->prepare('UPDATE player_has_team SET team_id = :team, role = :role WHERE player_id = :id');
        $request->bindValue('team', $_POST['team']);
        $request->bindValue('role', $_POST['role']);
        $request->bindValue(':id', $_GET['id']);

        return $request->execute();
    }

    public static function delete(): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('DELETE FROM player WHERE id = :id');
        $request->bindValue(':firstName', $_POST['firstName']);

        return $request->execute();
    }
}
