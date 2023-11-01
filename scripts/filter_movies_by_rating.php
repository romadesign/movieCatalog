<?php

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

// add movies
$movieRepository = new MovieRepository();
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
$movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("Avatar", 1999, 7.8));
$movieRepository->addMovie(new Movie("X-men", 1995, 5.5));

// rating querys
$ratingQuery = 8.7;
$minRating = 5.5;
$maxRating = 8.5;

// Filtrar por valor exacto
$filteredMovieByRating = $movieRepository->filterByRating($ratingQuery, $ratingQuery, $ratingQuery);

// Muestra las películas filtradas solo por valor exacto
if (empty($filteredMovieByRating)) {
    echo "No se encontraron películas que coincidan con la búsqueda.\n";
} else {
    echo "Películas que coinciden con la búsqueda por rating exacto:\n";
    foreach ($filteredMovieByRating as $movie) {
        echo "- Título: " . $movie->getTitle() . ", Año: " . $movie->getYear() . ", Valoración: " . $movie->getRating() . "\n";
    }
}

// Filtrar por rango
$filteredMovieByRatingRange = $movieRepository->filterByRating(null, $minRating, $maxRating);
if (empty($filteredMovieByRatingRange)) {
    echo "No se encontraron películas que coincidan con la búsqueda.\n";
} else {
    echo "Películas que coinciden con la búsqueda por rating range:\n";
    foreach ($filteredMovieByRatingRange as $movie) {
        echo "- Título: " . $movie->getTitle() . ", Año: " . $movie->getYear() . ", Valoración: " . $movie->getRating() . "\n";
    }
}
