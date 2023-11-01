<?php

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

// Crea una instancia del repositorio y agrega algunas películas (puedes hacerlo en tus pruebas o en este script).
$movieRepository = new MovieRepository();

$movie1 = new Movie("Rápidos y Furiosos 1", 2022, 8.5);
$movie2 = new Movie("Rápidos y Furiosos 2", 2020, 7.8);

$movieRepository->addMovie($movie1);
$movieRepository->addMovie($movie2);

// Obtiene todas las películas del repositorio
$movies = $movieRepository->getAllMovies();

// Muestra las películas en la consola
foreach ($movies as $movie) {
    echo "Título: " . $movie->getTitle() . PHP_EOL;
    echo "Año: " . $movie->getYear() . PHP_EOL;
    echo "Valoración: " . $movie->getRating() . PHP_EOL;
    echo PHP_EOL;
}
