<?php

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

// add movies
$movieRepository = new MovieRepository();
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
$movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("Avatar", 2009, 7.8));

// search
$searchQuery = "m";

// Filtra películas por título que contienen la consulta
$filteredMovies = $movieRepository->filterByTitle(strtolower($searchQuery));

// Muestra las películas filtradas
if (empty($filteredMovies)) {
    echo "No se encontraron películas que coincidan con la búsqueda por title.\n";
} else {
    echo "Películas que coinciden con la búsqueda por title:\n";
    foreach ($filteredMovies as $movie) {
        echo "- Título: " . $movie->getTitle() . ", Año: " . $movie->getYear() . ", Valoración: " . $movie->getRating() . "\n";
    }
}
