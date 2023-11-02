<?php
require '../src/Repository/MovieRepository.php';
require '../src/Model/Movie.php';

// Crear una instancia del repositorio
$movieRepository = new MovieRepository();

//Traer todas la peliculas
// $getAllMovies = $movieRepository->getAllMovies();
// $jsonMovies = json_encode($getAllMovies);

// Filtrar peliculas por title: empieza por, contiene, termina en
// $movies = $movieRepository->filterByTitle("The",'startswith');
$movies = $movieRepository->filterByTitle("The Dark Knight",'contains');
// $movies = $movieRepository->filterByTitle("on",'endswith');
$jsonMovies = json_encode($movies);

// Filtrar peliculas por año
// $moviesByYear = $movieRepository->filterByYear(1999);
// $jsonMovies = json_encode($moviesByYear);

// Filtrar peliculas por rating
// $filteredMovieByRating = $movieRepository->filterByRating(null, 7.5, 8.5); //rating null
// $filteredMovieByRating = $movieRepository->filterByRating(8.5, 8.5,8.5); 
// $jsonMovies = json_encode($filteredMovieByRating);

echo $jsonMovies;
session_write_close();
?>
