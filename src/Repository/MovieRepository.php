<?php

class MovieRepository
{
    private array $movies = [];

    public function addMovie(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function getAllMovies(): array
    {
        return $this->movies;
    }

    public function filterByTitle(string $query): array
    {
        $query = strtolower($query); // Convertir la consulta a minúsculas para una comparación insensible a mayúsculas y minúsculas
        return array_filter($this->movies, function (Movie $movie) use ($query) {
            $title = strtolower($movie->getTitle()); // Convertir a minúsculas para una comparación insensible a mayúsculas y minúsculas

            return strpos($title, $query) !== false;
        });
    }


    public function filterByYear(int $query)
    {
        return array_filter($this->movies, function (Movie $movie) use ($query) {
            return $movie->getYear() === $query;
        });
    }

    public function filterByRating(?float $rating, float $minRating, float $maxRating)
    {
        return array_filter($this->movies, function (Movie $movie) use ($rating, $minRating, $maxRating) {
            if ( $rating !== null) {
                // Filtrar por valor exacto
                return $movie->getRating() == $rating;
            } else {
                // Filtrar por rango
                return $movie->getRating() >= $minRating && $movie->getRating() <= $maxRating;
            }
        });
    }
}
