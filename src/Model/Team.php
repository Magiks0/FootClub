<?php

namespace App\Model;


class Team {
    private string $name;

    public function __construct(
        string $name
    )
    {
        $this->name = $name;
    }

    // Getter for name
    public function getName(): string {
        return $this->name;
    }

    // Setter for name
    public function setName(string $name): void {
        $this->name = $name;
    }
}

