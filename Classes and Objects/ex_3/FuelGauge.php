<?php

class FuelGauge
{
    private $fuel = 0;

    public function getFuel()
    {
        return $this->fuel;
    }

    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
    }

    public function incrementFuel()
    {
        if ($this->fuel < 70) {
            $this->fuel++;
        }
    }

    public function decrementFuel()
    {
        if ($this->fuel > 0) {
            $this->fuel--;
        }
    }

}