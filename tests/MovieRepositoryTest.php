<?php

use PHPUnit\Framework\TestCase;

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

class MovieRepositoryTest extends TestCase
{
    public function testGetAllMovies()
    {
        @session_start();
        // Crea una instancia de MovieRepository
        $movieRepository = new MovieRepository();

        // Agrega películas al repositorio
        $movieRepository->addMovie(new Movie("Película 1", 2022, 8.0));
        $movieRepository->addMovie(new Movie("Película 2", 2020, 7.5));

        // Obtiene todas las películas del repositorio
        $allMovies = $movieRepository->getAllMovies();

        // Realiza las aserciones necesarias
        $this->assertNotEmpty($allMovies);
    }

    public function testAddMovie()
    {
        // Configura el repositorio en memoria
        $movieRepository = new MovieRepository();

        // Crea instancias de películas
        $movie1 = new Movie("Rapidos y furiosos 1", 2022, 8.5);
        $movie2 = new Movie("Rapidos y furiosos 2", 2020, 7.8);

        // Agrega las películas al repositorio
        $movieRepository->addMovie($movie1);
        $movieRepository->addMovie($movie2);

        // Realiza aserciones para verificar que las películas se hayan agregado correctamente
        $movies = $movieRepository->getAllMovies();

        $this->assertEquals("Rapidos y furiosos 1", $movies[0]->getTitle());
        $this->assertEquals("Rapidos y furiosos 2", $movies[1]->getTitle());
    }

    public function testFilterByTitleStartsWith()
    {
        $movieRepository = new MovieRepository();

        // Crea algunas películas de ejemplo
        $movieRepository->addMovie(new Movie("Inception", 2010, 8.8));
        $movieRepository->addMovie(new Movie("The Dark Knight", 2008, 9.0));
        $movieRepository->addMovie(new Movie("Interstellar", 2014, 8.6));

        // Filtra películas que comienzan con "In"
        $filteredMovies = $movieRepository->filterByTitle("In", 'startswith');

        // Verifica que haya 2 películas que comienzan con "In"
        $this->assertCount(2, $filteredMovies);

        // Verifica que los títulos de las películas en el resultado son correctos
        $this->assertEquals("Inception", $filteredMovies[0]->getTitle());
        $this->assertEquals("Interstellar", $filteredMovies[1]->getTitle());
    }

    public function testFilterByTitleContains()
    {
        $movieRepository = new MovieRepository();

        // Configura tus datos de prueba
        $movieRepository->addMovie(new Movie("The Dark Knight", 2020, 7.8));
        $movieRepository->addMovie(new Movie("Inception", 2022, 8.5));

        // Filtra películas que contienen "The Dark Knight"
        $filteredMovies = $movieRepository->filterByTitle("The Dark Knight", 'contains');

        // Verifica que haya al menos una película en el resultado
        $this->assertNotEmpty($filteredMovies);

        // Verifica que el título de la película coincida con "The Dark Knight"
        $this->assertEquals("The Dark Knight", $filteredMovies[0]->getTitle());
    }

    public function testFilterByTitleEndsWith()
    {
        $movieRepository = new MovieRepository();

        // Crea algunas películas de ejemplo
        $movieRepository->addMovie(new Movie("Inception", 2010, 8.8));
        $movieRepository->addMovie(new Movie("The Dark Knight", 2008, 9.0));
        $movieRepository->addMovie(new Movie("Interstellar", 2014, 8.6));

        // Filtra películas que terminan con "ar"
        $filteredMovies = $movieRepository->filterByTitle("ar", 'endswith');

        $this->assertCount(1, $filteredMovies); // Esperamos que haya 1 película que termina con "ar"
    }

    public function testFilterByYear()
    {
        $movieRepository = new MovieRepository();
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
        $movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
        $movieRepository->addMovie(new Movie("Avatar", 2009, 7.8));

        $filteredMovieByYear = $movieRepository->filterByYear(2022);

        $this->assertCount(1, $filteredMovieByYear);

        // Verificar que las películas filtradas coincidan con el año correcto
        $this->assertEquals(2022, $filteredMovieByYear[0]->getYear());
    }


    public function testFilterByRating()
    {
        $movieRepository = new MovieRepository();
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
        $movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
        $movieRepository->addMovie(new Movie("Avatar", 2009, 7.8));

        // Filtrar por valor exacto
        $filteredMovieByExactRating = $movieRepository->filterByRating(8.7, 8.7, 8.7);
        $this->assertCount(1, $filteredMovieByExactRating);

        // Filtrar por rango
        $filteredMovieByRatingRange = $movieRepository->filterByRating(null, 8.0, 8.7);
        $this->assertCount(2, $filteredMovieByRatingRange);

        // Verificar que las películas filtradas tengan una valoración dentro del rango correcto
        foreach ($filteredMovieByRatingRange as $movie) {
            $this->assertGreaterThanOrEqual(8.0, $movie->getRating());
            $this->assertLessThanOrEqual(8.7, $movie->getRating());
        }
    }
}
