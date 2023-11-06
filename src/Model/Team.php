<?php

namespace App\Model;


class Team {
    private int $id;
    private string $name;
    private array $playerHasTeam;

    public function __construct(
        string $name
    )
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    // Getter for name
    public function getName(): string {
        return $this->name;
    }

    // Setter for name
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function addPlayerHasTeam(Player $player): void {
        $this->playerHasTeam[] = $player;
    }

    public function getPlayerHasTeams(): array {
        return $this->playerHasTeam;
    }

     // Définir la méthode __toString()
     public function __toString(): string {
        return $this->name; // Convertit l'objet Team en une chaîne de caractères (le nom de l'équipe).
    }

    public static function fromArray(array $data): array
{
    // $team = new Team($data['name']);
    // $team->setId($data['id']); // Set a default value of 0 if 'id' is missing in the array
    $team = [$data['id'], $data['name']];

    return $team;
}
}

