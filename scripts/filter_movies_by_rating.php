<?php

require 'createMovies.php'; // Incluye el archivo que crea películas

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
    if ($rating == $ratingQuery ) {
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
