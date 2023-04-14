<?php

namespace ex_7;

class Dog
{
    public string $name;
    public string $sex;

    public ?Dog $mother;

    public ?Dog $father;

    public function __construct(string $name, string $sex, ?Dog $mother = null, ?Dog $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;

    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function fathersName(): string
    {
        if ($this->father === null) {
            return "Unknown";
        } else {
            return $this->father->getName();
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if ($this->mother === null || $otherDog->mother === null) {
            return false;
        } else {
            return $this->mother->getName() === $otherDog->mother->getName();
        }
    }
}