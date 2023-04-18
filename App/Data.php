<?php

class Data
{
    private string $name;
    private int $regNumber;
    private string $address;
    private string $regDate;

    public function __construct(string $name, int $regNumber, string $address, string $regDate)
    {
        $this->name = $name;
        $this->regNumber = $regNumber;
        $this->address = $address;
        $this->regDate = $regDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegNumber(): int
    {
        return $this->regNumber;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getRegDate(): string
    {
        return $this->regDate;
    }
}