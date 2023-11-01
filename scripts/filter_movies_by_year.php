<?php

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

// add movies
$movieRepository = new MovieRepository();
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
$movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("Avatar", 1999, 7.8));

// search
$searchQuery = 1999;

// Filtra películas por título que contienen la consulta
$filteredMovieByYear = $movieRepository->filterByYear(strtolower($searchQuery));

// Muestra las películas filtradas
if (empty($filteredMovieByYear)) {
    echo "No se encontraron películas que coincidan con la búsqueda.\n";
} else {
    echo "Películas que coinciden con la búsqueda por año:\n";
    foreach ($filteredMovieByYear as $movie) {
        echo "- Título: " . $movie->getTitle() . ", Año: " . $movie->getYear() . ", Valoración: " . $movie->getRating() . "\n";
    }
}
