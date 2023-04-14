<?php

class Odometer
{

    private $mileage = 0;

    public function getMileage()
    {
        return $this->mileage;
    }

    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    public function incrementMileage()
    {
        if ($this->mileage < 999999) {
            $this->mileage++;
        } else {
            $this->mileage = 0;
        }
    }


}