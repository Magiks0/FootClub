<?php

namespace App\Database;

use App\Model\FootClubMatch;

final readonly class MatchDatabase
{
    private static function databaseName(): string
    {
        return 'team';
    }

    public static function add(FootClubMatch $match): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('INSERT INTO team (name) VALUES (:name);');
        // $teamName = $match->;
        $request->bindParam('name', $teamName);
        return $request->execute();
    }

    public static function findAll(): array
{
    $connection = Database::Connect();
    $query = sprintf("SELECT * FROM team", self::databaseName());
    $query = $connection->prepare($query);
    $query->execute();

    $results = $query->fetchAll();
    $teams = [];

    foreach ($results as $result) {
        // $teams[] = Team::fromArray($result);
    }
    return $teams;
}



    public static function findSelected(): array
    {
        $connection = Database::Connect();

        $query = sprintf("SELECT * FROM team WHERE id = :id", self::databaseName());
        $query = $connection->prepare($query);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();

        $result = $query->fetch();

        return $result;
    }

    public static function modify(): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('UPDATE team SET name = :name WHERE id = :id');
        $request->bindValue('name', $_POST['name']);
        
        $request->bindValue(':id', $_GET['id']);

        return $request->execute();
    }

    public static function delete(): bool
    {
        $connexion = Database::Connect();
        $request = $connexion->prepare('DELETE FROM team WHERE id = :id');
        $request->bindValue('id', $_GET['id']);

        return $request->execute();
    }
}
