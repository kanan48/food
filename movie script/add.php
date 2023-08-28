<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" action="display.php">
			<table>
				<tr>
					<td>Enter Title:</td>
					<td><input type="text" name="title" required></td>
				</tr>
				<tr>
					<td>Enter Genre:</td>
					<td><input type="text" name="genre" required></td>
				</tr>
				<tr>
					<td>Enter Release Year:</td>
					<td><input type="text" name="release_year" required></td>
				</tr>
				<tr>
					<td>Enter Cast:</td>
					<td><input type="text" name="cast" required></td>
				</tr>
				<tr>
					<td><input type="submit" value="Add" name="save" required></td>
				</tr>
			</table>
		</form>
	</body>
</html>