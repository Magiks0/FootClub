<?php

namespace App\Model;

class PlayerHasTeam {
    private Player $player;
    private Team $team;
    private string $role;

    public function __construct(
        Player $player,
        Team $team,
        string $role
    )
    {
        $this->player = $player;
        $this->team = $team;
        $this->role = $role;
    }

    // Getter for player
    public function getPlayer(): Player {
        return $this->player;
    }

    // Setter for player
    public function setPlayer(Player $player): void {
        $this->player = $player;
    }

    // Getter for team
    public function getTeam(): Team {
        return $this->team;
    }

    // Setter for team
    public function setTeam(Team $team): void {
        $this->team = $team;
    }

    // Getter for role
    public function getRole(): string {
        return $this->role;
    }

    // Setter for role
    public function setRole(string $role): void {
        $this->role = $role;
    }
}
