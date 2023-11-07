<?php
require 'src/Model/Movie.php';
require 'src/Repository/MovieRepository.php';
session_start();

// add movies
$movieRepository = new MovieRepository();
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 1", 2022, 8.5));
$movieRepository->addMovie(new Movie("Rápidos y Furiosos 2", 2020, 7.8));
$movieRepository->addMovie(new Movie("Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("Avatar", 2009, 7.8));
$movieRepository->addMovie(new Movie("X-men", 2003, 7.4));
$movieRepository->addMovie(new Movie("The Lord of the Rings: The Fellowship of the Ring", 2001, 8.8));
$movieRepository->addMovie(new Movie("Inception", 2010, 8.8));
$movieRepository->addMovie(new Movie("Pulp Fiction", 1994, 8.9));
$movieRepository->addMovie(new Movie("Forrest Gump", 1994, 8.8));
$movieRepository->addMovie(new Movie("The Dark Knight", 2008, 9.0));
$movieRepository->addMovie(new Movie("Ar La Land", 2016, 8.0));
$movieRepository->addMovie(new Movie("Jurassic Park", 1993, 8.1));
$movieRepository->addMovie(new Movie("The Shawshank Redemption", 1994, 9.3));
$movieRepository->addMovie(new Movie("The Godfather", 1972, 9.2));
$movieRepository->addMovie(new Movie("Titanic", 1997, 7.8));
$movieRepository->addMovie(new Movie("Star Wars: Episode IV - A New Hope", 1977, 8.6));
$movieRepository->addMovie(new Movie("The Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("Gladiator", 2000, 8.5));
$movieRepository->addMovie(new Movie("Ar Silence of the Lambs", 1991, 8.6));
$movieRepository->addMovie(new Movie("Fight Club", 1999, 8.8));
$movieRepository->addMovie(new Movie("Schindler's List", 1993, 6.4));
$movieRepository->addMovie(new Movie("The Avengers", 2012, 8.0));
$movieRepository->addMovie(new Movie("Inception", 2010, 8.8));
$movieRepository->addMovie(new Movie("Pulp Fiction", 1994, 8.9));
$movieRepository->addMovie(new Movie("Forrest Gump", 1994, 8.8));
$movieRepository->addMovie(new Movie("The Dark Knight 2", 2008, 9.0));
$movieRepository->addMovie(new Movie("The Lord of the Rings: The Fellowship of the Ring", 2001, 8.8));
$movieRepository->addMovie(new Movie("The Lord of the Rings: The Two Towers", 2002, 8.7));
$movieRepository->addMovie(new Movie("The Lord of the Rings: The Return of the King", 2003, 8.9));
$movieRepository->addMovie(new Movie("The Great Gatsby", 2013, 7.2));
$movieRepository->addMovie(new Movie("Inglourious Basterds", 2009, 8.3));
$movieRepository->addMovie(new Movie("The Revenant", 2015, 8.0));
$movieRepository->addMovie(new Movie("The Social Network", 2010, 7.7));
$movieRepository->addMovie(new Movie("The Departed", 2006, 8.5));
$movieRepository->addMovie(new Movie("Interstellar", 2014, 8.6));
$movieRepository->addMovie(new Movie("Eternal Sunshine of the Spotless Mind", 2004, 8.3));
$movieRepository->addMovie(new Movie("Gladiator", 2000, 8.5));
$movieRepository->addMovie(new Movie("Schindler's List", 1993, 8.9));
$movieRepository->addMovie(new Movie("The Shawshank Redemption", 1994, 9.3));
$movieRepository->addMovie(new Movie("Inglourious Basterds", 2009, 8.3));
$movieRepository->addMovie(new Movie("The Matrix", 1999, 8.7));
$movieRepository->addMovie(new Movie("The Godfather", 1972, 9.2));
$movieRepository->addMovie(new Movie("The Godfather: Part II", 1974, 9.0));
$movieRepository->addMovie(new Movie("Fight Club", 1999, 8.8));
$movieRepository->addMovie(new Movie("The Dark Knight Rises", 2012, 6.4));
$movieRepository->addMovie(new Movie("The Silence of the Lambs", 1991, 8.6));
$movieRepository->addMovie(new Movie("The Lion King", 1994, 8.5));
$movieRepository->addMovie(new Movie("The Avengers", 2012, 8.0));
$movieRepository->addMovie(new Movie("Jurassic Park", 1993, 8.1));
$movieRepository->addMovie(new Movie("The Green Mile", 1999, 8.6));
$movieRepository->addMovie(new Movie("Forrest Gump", 1994, 8.8));
$movieRepository->addMovie(new Movie("The Departed", 2006, 8.5));
$movieRepository->addMovie(new Movie("The Revenant", 2015, 8.0));
$movieRepository->addMovie(new Movie("The Prestige", 2006, 8.5));

// Obtiene todas las películas del repositorio para guardar en
$movies = $movieRepository->getAllMovies();

// Serializar las películas a formato JSON

// Almacenar datos en la sesión
$_SESSION['movies'] = $movies;
