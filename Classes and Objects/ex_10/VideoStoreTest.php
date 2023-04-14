<?php

require 'Video.php';
require 'VideoStore.php';

class VideoStoreTest
{

    public static function main()
    {
        $videoStore = new VideoStore();
        $videoStore->addVideo(new Video('The Matrix'));
        $videoStore->addVideo(new Video('Godfather II'));
        $videoStore->addVideo(new Video('Star Wars Episode IV: A New Hope'));


        //rate some videos
        $videoStore->receiveRating(new Video('The Matrix'), 5);
        $videoStore->receiveRating(new Video('The Matrix'), 4);
        $videoStore->receiveRating(new Video('The Matrix'), 5);

        $videoStore->receiveRating(new Video('Godfather II'), 5);
        $videoStore->receiveRating(new Video('Godfather II'), 2);

        $videoStore->receiveRating(new Video('Star Wars Episode IV: A New Hope'), 5);
        $videoStore->receiveRating(new Video('Star Wars Episode IV: A New Hope'), 3);
        $videoStore->receiveRating(new Video('Star Wars Episode IV: A New Hope'), 4);
        $videoStore->receiveRating(new Video('Star Wars Episode IV: A New Hope'), 5);

        //check out and return some videos

        $videoStore->checkOutVideo(new Video('The Matrix'));
        $videoStore->checkOutVideo(new Video('Godfather II'));
        //list the inventory
        $videoStore->listInventory();

        $videoStore->returnVideo(new Video('Godfather II'));


    }
}