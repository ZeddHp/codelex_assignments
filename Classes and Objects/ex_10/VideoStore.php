<?php

class VideoStore
{

    private array $inventory;
    private bool $isEmpty;


    public function __construct()
    {
        $this->inventory = [];
        $this->isEmpty = true;
    }

    public function addVideo(Video $video)
    {
        $this->inventory[] = $video;
        $this->isEmpty = false;
    }

    public function checkOutVideo(Video $video)
    {
        $video->rent();
    }

    public function returnVideo(Video $video)
    {
        $video->putBack();
    }

    public function receiveRating(Video $video, int $rating)
    {
        $video->rate($rating);
    }

    public function listInventory()
    {
        if ($this->isEmpty) {
            echo "The inventory is empty.";
        } else {
            foreach ($this->inventory as $video) {
                echo $video->getTitle() . " (" . $video->getAverageRate() . ") " . $video->isAvailable() . PHP_EOL;
            }
        }
    }
}