<?php

namespace App\Model;


class OpposingClub {
    private string $address;
    private string $city;

    public function __construct(
        string $address,
        string $city
    )
    {
        $this->address = $address;
        $this->city = $city;
    }

    // Getter for address
    public function getAddress(): string {
        return $this->address;
    }

    // Setter for address
    public function setAddress(string $address): void {
        $this->address = $address;
    }

    // Getter for city
    public function getCity(): string {
        return $this->city;
    }

    // Setter for city
    public function setCity(string $city): void {
        $this->city = $city;
    }
}
