<?php

class Coin {
    private string $name;
    private string $symbol;

    private int $rank;
    private int $id;
    private float $price;
    private float $marketCap;
    private float $dailyVolume;
    private float $circulatingSupply;

    public function __construct(string $name, string $symbol, int $rank, int $id, float $price, float $dailyVolume, float $circulatingSupply){
        $this->name = $name;
        $this->symbol = $symbol;
        $this->rank = $rank;
        $this->id = $id;
        $this->price = $price;
        $this->marketCap = $price * $circulatingSupply;
        $this->dailyVolume = $dailyVolume;
        $this->circulatingSupply = $circulatingSupply;
    }
    public function showInfo(): void {
        echo "===============================" . PHP_EOL;
        echo "       " . $this->getRank() . ": " . $this->getName() . " (" . $this->getSymbol() . ")" . PHP_EOL;
        echo "===============================" . PHP_EOL;
        echo "Coin ID: " . $this->getId() . PHP_EOL;
        echo "Price: " . number_format($this->getPrice(),2) . " USD" . PHP_EOL;
        echo "Market Cap: " . number_format($this->getMarketCap()) . " USD" . PHP_EOL;
        echo "24H Volume: " . number_format($this->getDailyVolume(),2) . " USD" . PHP_EOL;
        echo "Circulating Supply: " . number_format($this->getCirculatingSupply()) . " USD" . PHP_EOL;
        echo PHP_EOL;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getSymbol(): string {
        return $this->symbol;
    }
    public function getRank(): int {
        return $this->rank;
    }
    public function getId(): int {
        return $this->id;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getMarketCap(): float {
        return $this->marketCap;
    }
    public function getDailyVolume(): float {
        return $this->dailyVolume;
    }
    public function getCirculatingSupply(): float {
        return $this->circulatingSupply;
    }

}