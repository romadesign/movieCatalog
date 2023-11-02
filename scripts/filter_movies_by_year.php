<?php

require 'createMovies.php'; // Incluye el archivo que crea películas

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
