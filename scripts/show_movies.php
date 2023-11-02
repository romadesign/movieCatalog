<?php

require 'createMovies.php'; // Incluye el archivo que crea películas

$movies = $_SESSION['movies']; // Obtiene las películas de la sesión

// Muestra las películas en la consola
foreach ($movies as $movie) {
    echo "Título: " . $movie->getTitle() . PHP_EOL;
    echo "Año: " . $movie->getYear() . PHP_EOL;
    echo "Valoración: " . $movie->getRating() . PHP_EOL;
    echo PHP_EOL;
}


