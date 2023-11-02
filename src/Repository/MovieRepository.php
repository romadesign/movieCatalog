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
        @session_start();
        $movies = ($_SESSION['movies'] ?? null) ?: $this->movies;
        return $movies;
    }

    public function filterByTitle(string $query, string $mode = 'contains'): array
    {
        @session_start();
        $movies = $_SESSION['movies'] ?? $this->movies;

        $query = strtolower($query); // Convertir la consulta a minúsculas para una comparación insensible a mayúsculas y minúsculas
        return array_filter($movies, function (Movie $movie) use ($query, $mode) {
            $title = strtolower($movie->getTitle()); // Convertir a minúsculas para una comparación insensible a mayúsculas y minúsculas

            if ($mode === 'contains') {
                return strpos($title, $query) !== false;
            } elseif ($mode === 'startswith') {
                return strpos($title, $query) === 0;
            } elseif ($mode === 'endswith') {
                $queryLength = strlen($query);
                $titleLength = strlen($title);
                return $queryLength <= $titleLength && substr($title, $titleLength - $queryLength) === $query;
            }

            return false; // Modo no válido
        });
    }

    public function filterByYear(int $query)
    {
        @session_start();
        $movies = isset($_SESSION['movies']) ? $_SESSION['movies'] : $this->movies;

        return array_filter($movies, function (Movie $movie) use ($query) {
            return $movie->getYear() === $query;
        });
    }

    public function filterByRating(?float $rating, float $minRating, float $maxRating)
    {
        @session_start();
        $movies = isset($_SESSION['movies']) ? $_SESSION['movies'] : $this->movies;

        return array_filter($movies, function (Movie $movie) use ($rating, $minRating, $maxRating) {
            if ($rating !== null) {
                // Filtrar por valor exacto
                return $movie->getRating() == $rating;
            } else {
                // Filtrar por rango
                return $movie->getRating() >= $minRating && $movie->getRating() <= $maxRating;
            }
        });
    }
}
