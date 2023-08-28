<?php 
	include("movie.php");
	$display=new display();
	if(!empty($_POST['save']))
	{
		$title = $_POST['title'];
		$genre = $_POST['genre'];
		$release_year = $_POST['release_year'];
		$cast = explode(",", $_POST['cast']);
		$display->addMovie($title, $genre, $release_year, $cast);
	}
	
?>

<?php 
	global $movies;
	
	foreach($movies as $movy)
	{
		$display->displayMovieDetails($movy);
	}
	

// Delete Code Executes Here	
    global $movies;
	
	foreach($movies as $movy)
	{
		$display->deletemoviesByTitle($movy);
	}
?>



<form>
	Search By Genre:<input type="text" name="search" />
	<input type="submit" value="Search"/>
	<input type="submit" value="delete"/>
</form>
<br/><br/><br/>

<?php 
	global $movies;
	
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
		
		$movies=$display->searchMoviesByGenre($search);
	}
	
	
	foreach($movies as $movy)
	{
		$display->displayMovieDetails($movy);
	}
?>