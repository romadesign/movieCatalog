<?php

require 'createMovies.php'; // Incluye el archivo que crea películas

function getMovies()
{
    $movies = $_SESSION['movies']; // Obtiene las películas de la sesión

    // Muestra las películas en la consola
    foreach ($movies as $movie) {
        echo "Título: " . $movie->getTitle() . PHP_EOL;
        echo "Año: " . $movie->getYear() . PHP_EOL;
        echo "Valoración: " . $movie->getRating() . PHP_EOL;
        echo PHP_EOL;
    }
}

function filterMoviesByYear()
{
    $movies = $_SESSION['movies']; // Obtiene las películas de la sesión

    // Define el año por el cual deseas filtrar
    $yearToFilter = 1999; // Cambia esto al año deseado

    // Inicializa un arreglo para almacenar las películas filtradas
    $filteredMovies = [];

    foreach ($movies as $movie) {
        // Obtiene el año de la película
        $year = $movie->getYear();

        // Compara el año de la película con el año especificado
        if ($year === $yearToFilter) {
            $filteredMovies[] = $movie;
        }
    }

    // Muestra las películas filtradas en la consola
    foreach ($filteredMovies as $movie) {
        echo "Título: " . $movie->getTitle() . PHP_EOL;
        echo "Año: " . $movie->getYear() . PHP_EOL;
        echo "Valoración: " . $movie->getRating() . PHP_EOL;
        echo PHP_EOL;
    }
}

function filterMoviesByTitle()
{
    $movies = $_SESSION['movies']; // Obtiene las películas de la sesión

    // Define el criterio de filtro y el tipo de filtro
    $filter = "on"; // Reemplaza esto con tu criterio de filtro
    $filterType = "endswith"; // Puedes cambiar esto a "contains" o "endswith" según tus necesidades

    // Inicializa un arreglo para almacenar las películas filtradas
    $filteredMovies = [];

    foreach ($movies as $movie) {
        // Aplica la lógica de filtro según el tipo especificado
        $title = strtolower($movie->getTitle());

        if ($filterType === "startswith" && strpos($title, strtolower($filter)) === 0) {
            $filteredMovies[] = $movie;
        } elseif ($filterType === "contains" && strpos($title, strtolower($filter)) !== false) {
            $filteredMovies[] = $movie;
        } elseif ($filterType === "endswith" && substr($title, -strlen($filter)) === strtolower($filter)) {
            $filteredMovies[] = $movie;
        }
    }

    // Muestra las películas filtradas en la consola
    foreach ($filteredMovies as $movie) {
        echo "Título: " . $movie->getTitle() . " ";
        echo "Año: " . $movie->getYear() . " ";
        echo "Valoración: " . $movie->getRating() . " ";
        echo PHP_EOL;
    }
}

function filterMoviesByRating()
{
    $movies = $_SESSION['movies']; // Obtiene las películas de la sesión

    // Define el valor de rating que deseas buscar (query) y el rango mínimo y máximo
    $ratingQuery = 6.4; // Cambia esto al valor deseado
    $minRating = 7.5;  // Cambia esto al valor mínimo deseado
    $maxRating = 8.5;  // Cambia esto al valor máximo deseado

    // Inicializa un arreglo para almacenar las películas filtradas
    $filteredMoviesMaxMin = [];
    $filteredMovies = [];

    foreach ($movies as $movie) {
        // Obtiene el valor de rating de la película
        $rating = $movie->getRating();

        // Compara el valor de rating con el rango especificado
        if ($rating == $ratingQuery) {
            $filteredMovies[] = $movie;
        }
        if (($rating >= $minRating && $rating <= $maxRating)) {
            $filteredMoviesMaxMin[] = $movie;
        }
    }

    // Muestra las películas filtradas en la consola por min and max rating
    echo "___Filtro por rating min and max____" . PHP_EOL;
    foreach ($filteredMoviesMaxMin as $movie) {
        echo "Título: " . $movie->getTitle() . PHP_EOL;
        echo "Año: " . $movie->getYear() . PHP_EOL;
        echo "Valoración: " . $movie->getRating() . PHP_EOL;
        echo PHP_EOL;
    }

    // Muestra las películas filtradas en la consola solo ratingQuery
    echo "___Filtro por rating query____" . PHP_EOL;
    foreach ($filteredMovies as $movie) {
        echo "Título: " . $movie->getTitle() . PHP_EOL;
        echo "Año: " . $movie->getYear() . PHP_EOL;
        echo "Valoración: " . $movie->getRating() . PHP_EOL;
        echo PHP_EOL;
    }
}

filterMoviesByRating();
