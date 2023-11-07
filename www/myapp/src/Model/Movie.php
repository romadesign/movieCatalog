<?php


class Movie implements JsonSerializable
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



    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
            'rating' => $this->rating,
        ];
    }

    public function jsonserializeTitle(): array
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
        ];
    }

    public function jsonSerializeTitleYear(): array
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
        ];
    }

    public function jsonSerializeTitleRating(): array
    {
        return [
            'title' => $this->title,
            'rating' => $this->rating,
        ];
    }
}
