<?php

namespace App\Model;

class FootClubMatch {
    private int $teamScore;
    private int $opponentScore;
    private \DateTime $date;
    private Team $team;
    private string $city;
    private OpposingClub $opposingClub;

    public function __construct(
        int $teamScore,
        int $opponentScore,
        \DateTime $date,
        Team $team,
        string $city,
        OpposingClub $opposingClub
    )
    {
        $this->teamScore = $teamScore;
        $this->opponentScore = $opponentScore;
        $this->date = $date;
        $this->team = $team;
        $this->city = $city;
        $this->opposingClub = $opposingClub;
    }

    // Getter for teamScore
    public function getTeamScore(): int 
    {
        return $this->teamScore;
    }

    // Setter for teamScore
    public function setTeamScore(int $teamScore): void {
        $this->teamScore = $teamScore;
    }

    // Getter for opponentScore
    public function getOpponentScore(): int {
        return $this->opponentScore;
    }

    // Setter for opponentScore
    public function setOpponentScore(int $opponentScore): void {
        $this->opponentScore = $opponentScore;
    }

    // Getter for date
    public function getDate(): \DateTime {
        return $this->date;
    }

    // Setter for date
    public function setDate(\DateTime $date): void {
        $this->date = $date;
    }

    // Getter for team
    public function getTeam(): Team {
        return $this->team;
    }

    // Setter for team
    public function setTeam(Team $team): void {
        $this->team = $team;
    }

    // Getter for city
    public function getCity(): string {
        return $this->city;
    }

    // Setter for city
    public function setCity(string $city): void {
        $this->city = $city;
    }

    // Getter for opposingClub
    public function getOpposingClub(): OpposingClub {
        return $this->opposingClub;
    }

    // Setter for opposingClub
    public function setOpposingClub(OpposingClub $opposingClub): void {
        $this->opposingClub = $opposingClub;
    }
}
