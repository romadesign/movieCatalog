<?php

require 'createMovies.php'; // Incluye el archivo que crea películas

$movies = $_SESSION['movies']; // Obtiene las películas de la sesión

// Define el criterio de filtro y el tipo de filtro
$filter = "on"; // Reemplaza esto con tu criterio de filtro
$filterType = "endswith"; // Puedes cambiar esto a "contains" o "endswith" según tus necesidades

// Inicializa un arreglo para almacenar las películas filtradas
$filteredMovies = [];

foreach ($movies as $movie) {
    // Aplica la lógica de filtro según el tipo especificado
    $title = strtolower($movie->getTitle());

    if ($filterType === "startswith" && strpos($title, strtolower($filter)) === 0) {
        $filteredMovies[] = $movie;
    } elseif ($filterType === "contains" && strpos($title, strtolower($filter)) !== false) {
        $filteredMovies[] = $movie;
    } elseif ($filterType === "endswith" && substr($title, -strlen($filter)) === strtolower($filter)) {
        $filteredMovies[] = $movie;
    }
}

// Muestra las películas filtradas en la consola
foreach ($filteredMovies as $movie) {
    echo "Título: " . $movie->getTitle() . " ";
    echo "Año: " . $movie->getYear() . " ";
    echo "Valoración: " . $movie->getRating() . " ";
    echo PHP_EOL;
}
