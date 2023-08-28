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
        'genre' => 'Science',
        'release_year' => 2010,
        'cast' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt'],
    ],
	[
        'title' => 'Golmal',
        'genre' => 'Drama',
        'release_year' => 2008,
        'cast' => ['Ajay Devgon','Kareena Kapoor'],
    ],
];
class display
{
	function displayMovieDetails($movie)
	{
	    echo "Title: ".$movie['title']."<br>";
	    echo "Genre: ".$movie['genre']."<br>";
	    echo "Release Year: ".$movie['release_year']."<br>";
	    echo "Cast: ".implode(', ', $movie['cast'])."<br>";
	    echo "<br>";
	}
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
	function searchMoviesByGenre($genre)
	{
	    global $movies;
	    $matchingMovies = [];
	    foreach ($movies as $movie) 
	    {
	        if ($movie['genre']=== $genre){
	            $matchingMovies[] = $movie;
	        }
	    }
		return($matchingMovies);
	}
	function deletemoviesByTitle($title)
	{
		echo"";
	}
	function editMovie($title, $genre, $release_year, $cast)
	{
		global $movies;
		 
	}
}
?> 