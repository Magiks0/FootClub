<?php

namespace App\Database;

use App\Model\Player;

final readonly class PlayerDatabase
{
    private static function databaseName(): string
    {
        return 'player';
    }

    public static function add(Player $player): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('INSERT INTO player (firstname, lastname, birthdate) VALUES (:name, :lastname, :birthdate);');
        $playerName = $player->getFirstName();
        $playerLastName = $player->getLastName();
        $playerBirthdate = $player->getBirthdate();
    
        // Utilisez bindParam pour lier les variables par référence
        $request->bindParam('name', $playerName);
        $request->bindParam('lastname', $playerLastName);
    
        // Stockez la valeur de birthdate dans une variable
        $birthdateValue = $playerBirthdate->format('Y-m-d');
    
        $request->bindParam('birthdate', $birthdateValue);
    
        return $request->execute();
    }

    public static function findAll(): array
    {
        $connection = Database::Connect();

        $query = sprintf("SELECT * FROM player ORDER BY lastname;", self::databaseName());
        $query = $connection->prepare($query);
        $query->execute();

        $results = $query->fetchAll();

        $players = [];

        foreach ($results as $result) {
            $players[] = Player::fromArray($result);
        }

        return $players;
    }
}
