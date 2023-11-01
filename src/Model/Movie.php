<?php

class Movie
{
    private string $title;
    private int $year;
    private float $rating;

    public function __construct(string $title, int $year, float $rating)
    {
        $this->title = $title;
        $this->year = $year;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getRating(): float
    {
        return $this->rating;
    }
}
