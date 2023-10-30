<?php

namespace App\Model;


class StaffMember {
    private string $firstName;
    private string $lastName;
    private string $picture;
    private string $role;

    public function __construct(
        string $firstName,
        string $lastName,
        string $picture,
        string $role
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->picture = $picture;
        $this->role = $role;
    }

    // Getter for firstName
    public function getFirstName(): string {
        return $this->firstName;
    }

    // Setter for firstName
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    // Getter for lastName
    public function getLastName(): string {
        return $this->lastName;
    }

    // Setter for lastName
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    // Getter for picture
    public function getPicture(): string {
        return $this->picture;
    }

    // Setter for picture
    public function setPicture(string $picture): void {
        $this->picture = $picture;
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
