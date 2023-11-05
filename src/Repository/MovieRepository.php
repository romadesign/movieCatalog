<?php


class MovieRepository
{
    private array $movies = [];

    private function getMoviesFromSession()
    {
        return $_SESSION['movies'] ?? $this->movies;
    }

    public function addMovie(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function getAllMovies(): array
    {
        $movies = $this->getMoviesFromSession();
        return $movies;
    }

    public function filterByTitle(string $query, string $mode = 'contains'): array
    {
        $movies = $this->getMoviesFromSession();

        $query = strtolower($query);
        $filteredMovies = [];

        foreach ($movies as $movie) {
            $title = strtolower($movie->getTitle());

            if ($mode === 'contains' && strpos($title, $query) !== false) {
                array_push($filteredMovies, $movie);
            } elseif ($mode === 'startswith' && strpos($title, $query) === 0) {
                array_push($filteredMovies, $movie);
            } elseif ($mode === 'endswith') {
                $queryLength = strlen($query);
                $titleLength = strlen($title);
                if ($queryLength <= $titleLength && substr($title, $titleLength - $queryLength) === $query) {
                    array_push($filteredMovies, $movie);
                }
            }
        }

        return $filteredMovies;
    }


    public function filterByYear(int $year)
    {
        $movies = $this->getMoviesFromSession();

        $filteredMovies = [];

        foreach ($movies as $movie) {
            if ($movie->getYear() === $year) {
                array_push($filteredMovies, $movie);
            }
        }

        return $filteredMovies;
    }

    public function filterByRating(?float $rating, float $minRating, float $maxRating)
    {
        $movies = $this->getMoviesFromSession();

        $filteredMovies = [];

        foreach ($movies as $movie) {
            if ($rating !== null) {
                // Filtrar por valor exacto
                if ($movie->getRating() == $rating) {
                    array_push($filteredMovies, $movie);
                }
            } else {
                // Filtrar por rango
                if ($movie->getRating() >= $minRating && $movie->getRating() <= $maxRating) {
                    array_push($filteredMovies, $movie);
                }
            }
        }

        return $filteredMovies;
    }
}
