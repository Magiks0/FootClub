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


    public static function findSelected(): array
    {
        $connection = Database::Connect();

        $query = sprintf("SELECT * FROM player WHERE id = :id", self::databaseName());
        $query = $connection->prepare($query);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();

        $result = $query->fetch();

        return $result;
    }

    public static function modify(): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('UPDATE player SET firstname = :firstName, lastName = :lastName, birthdate = :birthdate WHERE id = :id');
        $request->bindValue(':firstName', $_POST['firstName']);
        $request->bindValue(':lastName', $_POST['lastName']);
        $birthdate = new \DateTime($_POST['birthDate']);

        // Stockez la valeur de birthdate dans une variable
        $birthdateValue = $birthdate->format('Y-m-d');

        $request->bindValue(':birthdate', $birthdateValue);
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
