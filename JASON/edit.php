<?php
	include("json.class.php");

	$json = new json();

	// Retrieve the ID from the URL parameter
	$id = $_GET['id'];

	// Fetch the existing data based on the ID
	$existingData = $json->getSingle($id);
?>

<html>
	<head>
		<title>Edit Member</title>
	</head>
	<body>
		<h2>Edit Member</h2>
		<form method="post" action="index.php">
			<table>
				<tr>
					<td><input type="hidden" name="id" value="<?php echo $existingData['id']; ?>"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $existingData['name']; ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $existingData['email']; ?>"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="phone" value="<?php echo $existingData['phone']; ?>"></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><input type="text" name="country" value="<?php echo $existingData['country']; ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Edit" name="edit"></td>
				</tr>
			</table>
		</form>
	</body>
</html>