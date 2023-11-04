<?php
// Comentar o eliminar si ya no se requiere utilizar los datos en memoria
require 'createMovies.php';
include './src/Lib/errors.php';
// Descomentar cuando ya tengamos una DDBB
// require 'src/Repository/MovieRepository.php';
// require 'src/Model/Movie.php';
//$movieRepository = new MovieRepository();

header('Content-Type: application/json'); // Configura la respuesta como JSON
if ($_GET['action'] === 'getMovies') {
    $movies = $movieRepository->getAllMovies();

    $serializedMovies = array_map(function ($movie) {
        return $movie->jsonSerializeTitle();
    }, $movies);
    sendSuccess200($serializedMovies);
}

// Ruta para filtrar películas por título
if ($_GET['action'] === 'filterByTitle') {
    $query = $_GET['query'];
    $mode = $_GET['mode'];
    $filteredMovies = $movieRepository->filterByTitle($query, $mode);
    echo json_encode($filteredMovies);
}


// Puedes agregar más rutas API aquí para filtrar por año
if ($_GET['action'] === 'filterByYear') {
        $year = (int)$_GET['year'];
        $filteredMovies = $movieRepository->filterByYear($year);
        echo json_encode($filteredMovies);
}

if ($_GET['action'] === 'filterByRating') {
    $rating = isset($_GET['rating']) ? (float)$_GET['rating'] : null;
    $minRating = isset($_GET['minRating']) ? (float)$_GET['minRating'] : 0.0;
    $maxRating = isset($_GET['maxRating']) ? (float)$_GET['maxRating'] : 10.0;
    $filteredMovies = $movieRepository->filterByRating($rating, $minRating, $maxRating);
    echo json_encode($filteredMovies);
}
