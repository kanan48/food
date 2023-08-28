<?php
// Initialize the movie database (multidimensional array)
$movies = [
    [
        'title' => 'The Shawshank Redemption',
        'genre' => 'Drama',
        'release_year' => 1994,
        'cast' => ['Tim Robbins', 'Morgan Freeman'],
    ],
    [
        'title' => 'Inception',
        'genre' => 'Science Fiction',
        'release_year' => 2010,
        'cast' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt'],
    ],
    // Add more movie entries here
];

// Function to add a new movie to the database
function addMovie($title, $genre, $release_year, $cast)
{
    global $movies;
    $newMovie = [
        'title' => $title,
        'genre' => $genre,
        'release_year' => $release_year,
        'cast' => $cast,
    ];
    $movies[] = $newMovie;
}

// Function to search for movies by genre
function searchMoviesByGenre($genre)
{
    global $movies;
    $matchingMovies = [];
    foreach ($movies as $movie) {
        if (strcasecmp($movie['genre'], $genre) === 0) {
            $matchingMovies[] = $movie;
        }
    }
    return $matchingMovies;
}

// Function to display movie details
function displayMovieDetails($movie)
{
    echo "Title: " . $movie['title'] . "<br>";
    echo "Genre: " . $movie['genre'] . "<br>";
    echo "Release Year: " . $movie['release_year'] . "<br>";
    echo "Cast: " . implode(', ', $movie['cast']) . "<br>";
    echo "<br>";
}

// Add a new movie to the database
addMovie('The Dark Knight', 'Action', 2008, ['Christian Bale', 'Heath Ledger']);

// Search for movies by genre
$searchGenre = 'Science Fiction';
$matchingMovies = searchMoviesByGenre($searchGenre);

// Display movie details of matching movies
echo "Movies in the {$searchGenre} genre:<br>";
foreach ($matchingMovies as $movie) {
    displayMovieDetails($movie);
}
?>