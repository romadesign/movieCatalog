<?php

use PHPUnit\Framework\TestCase;

require 'src/Repository/MovieRepository.php';
require 'src/Model/Movie.php';

class MovieRepositoryTest extends TestCase
{
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

    public function testFilterByTitle()
    {
        $movieRepository = new MovieRepository();
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
        $movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
        $movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
        $movieRepository->addMovie(new Movie("Avatar", 2009, 7.8));

        $filteredMovies = $movieRepository->filterByTitle("Rápidos");

        $this->assertCount(2, $filteredMovies);

        // Verificar que las películas filtradas coincidan con el título esperado
        $this->assertEquals("Rápidos y Furiosos 1", $filteredMovies[0]->getTitle());
        $this->assertEquals("Rápidos y Furiosos 2", $filteredMovies[1]->getTitle());

        // Verificar que las películas filtradas no incluyan otras películas
        $this->assertNotContains("Matrix", array_column($filteredMovies, 'getTitle'));
        $this->assertNotContains("Avatar", array_column($filteredMovies, 'getTitle'));
    }
}
