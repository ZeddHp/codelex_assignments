<?php

namespace ex_4;

class Movie
{

    public $title;
    public $studio;
    public $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getStudio()
    {
        return $this->studio;
    }

    public function setStudio($studio)
    {
        $this->studio = $studio;
    }

    public function getPG($movies)
    {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->getRating() == "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }


}

$movies = [
    new Movie("Casino Royale", "Eon Productions", "PG13"),
    new Movie("Glass", "Buena Vista International", "PG13"),
    new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG"),
];

$pgMovies = $movies[0]->getPG($movies);

foreach ($pgMovies as $movie) {
    echo $movie->getTitle() . PHP_EOL;
}

