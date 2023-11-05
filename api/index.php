<?php
// Comentar o eliminar si ya no se requiere utilizar los datos en memoria
require '../createMovies.php';
include '../src/Lib/errors.php';
// Descomentar cuando ya tengamos una DDBB
// require 'src/Repository/MovieRepository.php';
// require 'src/Model/Movie.php';
//$movieRepository = new MovieRepository();


/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="Api movie catalog",
 *   @OA\License(name="MIT"),
 *   @OA\Attachable()
 * )
 */
header('Content-Type: application/json'); // Configura la respuesta como JSON


 /**
 * @OA\Get(
 *     path="/moviecatalog/api?action=getMovies",
 *     summary="Obtener películas",
 *     description="Obtiene todas las películas",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de películas"
 *     )
 * )
 */
if ($_GET['action'] === 'getMovies') {
    $movies = $movieRepository->getAllMovies();

    $serializedMovies = array_map(function ($movie) {
        return $movie->jsonSerializeTitle();
    }, $movies);
    sendSuccess200($serializedMovies);
}


/**
 * @OA\Get(
 *     path="/moviecatalog/api?action=?&query=?&&mode=?",
 *     summary="Filtrar películas por título",
 *     @OA\Parameter(
 *         name="action",
 *         in="query",
 *         required=true,
 *         description="Acción de filtrado (filterByTitle)",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         required=true,
 *         description="Título de la película a filtrar",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="mode",
 *         in="query",
 *         required=false,
 *         description="Modo de filtrado (startswith, contains o endswith)",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Películas filtradas exitosamente"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Solicitud incorrecta"
 *     )
 * )
 */
if ($_GET['action'] === 'filterByTitle') {
    $query = $_GET['query'];
    $mode = $_GET['mode'];
    $filteredMovies = $movieRepository->filterByTitle($query, $mode);
    echo json_encode($filteredMovies);
}


/**
 * @OA\Get(
 *     path="/moviecatalog/api?action=?&year=?",
 *     summary="Filtrar películas por año",
 *     @OA\Parameter(
 *         name="action",
 *         in="query",
 *         required=true,
 *         description="Acción de filtrado (filterByYear)",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="year",
 *         in="query",
 *         required=true,
 *         description="Año de la película a filtrar",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Películas filtradas por año exitosamente"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Solicitud incorrecta"
 *     )
 * )
 */
if ($_GET['action'] === 'filterByYear') {
    $year = (int)$_GET['year'];
    $filteredMovies = $movieRepository->filterByYear($year);
    echo json_encode($filteredMovies);
}


/**
 * @OA\Get(
 *     path="/moviecatalog/api?action=?&rating=?&minRating=?&maxRating=?",
 *     summary="Filtrar películas por año",
 *     @OA\Parameter(
 *         name="action",
 *         in="query",
 *         required=true,
 *         description="Acción de filtrado (filterByRating)",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="rating",
 *         in="query",
 *         required=false,
 *         description="rating único",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="minRating",
 *         in="query",
 *         required=false,
 *         description="min rating",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="maxRating",
 *         in="query",
 *         required=false,
 *         description="max rating",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Películas filtradas por rating exitosamente"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Solicitud incorrecta"
 *     )
 * )
 */
if ($_GET['action'] === 'filterByRating') {
    $rating = isset($_GET['rating']) ? (float)$_GET['rating'] : null;
    $minRating = isset($_GET['minRating']) ? (float)$_GET['minRating'] : 0.0;
    $maxRating = isset($_GET['maxRating']) ? (float)$_GET['maxRating'] : 10.0;
    $filteredMovies = $movieRepository->filterByRating($rating, $minRating, $maxRating);
    echo json_encode($filteredMovies);
}
