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

        $this->assertEquals(2, count($movies));

        $this->assertEquals("Rapidos y furiosos 1", $movies[0]->getTitle());

        $this->assertEquals("Rapidos y furiosos 2", $movies[1]->getTitle());
    }
}
