<?php

class MovieRepository
{
    private array $movies = [];

    public function addMovie(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

}

