<?php
require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

header('Content-Type: application/json'); // Configura la respuesta como JSON

// Crear una instancia del repositorio
$movieRepository = new MovieRepository();

// Ruta para obtener todas las películas
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getMovies') {
    $movies = $movieRepository->getAllMovies();
    echo json_encode($movies);
}

// Ruta para filtrar películas por título
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'filterByTitle') {
    if (isset($_GET['query']) && isset($_GET['mode'])) {
        $query = $_GET['query'];
        $mode = $_GET['mode'];
        $filteredMovies = $movieRepository->filterByTitle($query, $mode);
        echo json_encode($filteredMovies);
    }
}


// Puedes agregar más rutas API aquí para filtrar por año
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'filterByYear') {
    if (isset($_GET['year'])) {
        $year = (int)$_GET['year'];
        $filteredMovies = $movieRepository->filterByYear($year);
        echo json_encode($filteredMovies);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'filterByRating') {
    $rating = isset($_GET['rating']) ? (float)$_GET['rating'] : null;
    $minRating = isset($_GET['minRating']) ? (float)$_GET['minRating'] : 0.0;
    $maxRating = isset($_GET['maxRating']) ? (float)$_GET['maxRating'] : 10.0;
    $filteredMovies = $movieRepository->filterByRating($rating, $minRating, $maxRating);
    echo json_encode($filteredMovies);
}
