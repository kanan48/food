<?php
	include("json.class.php");
	$json=new json();
	$data=$json->getRows();
	if(!empty($_POST['save']))
	{
		$newData=[
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'country' => $_POST['country']
		];
		$json->insert($newData);
	}
	if(!empty($_GET['did']))
	{
		$delete=$_GET['did'];
		$Delete=$json->deleteData($delete);
	}
	if($data)
	{
		?>
			<table border="1" width="50%">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Country</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
		<?php
		foreach($data as $row)
		{
			?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo $row['phone']?></td>
					<td><?php echo $row['country']?></td>
					<td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
					<td><a href="index.php?did=<?php echo $row['id'] ?>">Delete</a></td>
				</tr>
			<?php
		}
		?>
			</table>
		<?php
	}
	else
	{
		echo "data not found";
	}
	
	if (!empty($_POST['edit'])) 
	{
		$id = $_POST['id'];
		$upData = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'country' => $_POST['country']
		];

		// Assuming your json class has an update method
		$updateResult = $json->update($upData, $id);
		if ($updateResult) 
		{
			echo "Data updated successfully.";
		}
		else 
		{
			echo "Failed to update data.";
		}
	}
?>
<br><br>
<a href="add.php">New Member</a>
<br><br><br>
<form>
	Search By Id: <input type="text" name="search"/>
	<input type="submit" value="Search" />
</form>
<br><br><br>
<?php
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
		$searchJson=$json->getSingle($search);
		if($searchJson)
		{
			?>
			<table border="1" width="50%">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Country</th>
				</tr>
				<tr>
					<td><?php echo $searchJson['id']?></td>
					<td><?php echo $searchJson['name']?></td>
					<td><?php echo $searchJson['email']?></td>
					<td><?php echo $searchJson['phone']?></td>
					<td><?php echo $searchJson['country']?></td>
				</tr>
			</table>
			<?php
		}
	}	
?>