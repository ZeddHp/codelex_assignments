<?php

class Video
{
    private string $title;
    private bool $available = true;
    private float $rating = 0;
    private int $timesRated = 0;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function isAvailable(): string
    {
        return $this->available ? 'available' : 'not available';
    }

    public function rate(int $rate)
    {
        $this->rating += $rate;
        $this->timesRated++;
    }

    public function rent()
    {
        $this->available = false;
    }

    public function putBack()
    {
        $this->available = true;
    }

    public function getAverageRate(): string
    {
        return $this->timesRated === 0 ? 'not rated' : number_format(($this->rating / $this->timesRated), 1);
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}