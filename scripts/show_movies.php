<?php

require './createMovies.php';

$movies = $_SESSION['movies'];

// Muestra las películas en la consola
foreach ($movies as $movie) {
    echo "Título: " . $movie->getTitle() . PHP_EOL;
    echo "Año: " . $movie->getYear() . PHP_EOL;
    echo "Valoración: " . $movie->getRating() . PHP_EOL;
    echo PHP_EOL;
}

