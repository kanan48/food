<?php session_start();
    include('common/connection.php');
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from dish where id=$id";
		if(mysqli_query($connect,$query))
		{
			?>
			   <script> 
			       alert("Record Deleted");
				</script>
			<?php
		}
		else
		{
			?>
			   <script> 
			       alert("Record not Deleted");
				</script>
			<?php
		}
	}
	if(empty($_SESSION['uname']))
		{
			header('location:index.php');
		}
?>
<html>
   <head>
        <title>Dish Summary</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <?php include('common/header.php')?>
        <!-- innercontainer4 starts from here -->
		<div class="innercontainer4">
		    <div class="heading1">
			    <span>Dish Summary</span>
			</div>
			<p>This section displays the list of Dishes.</p>
			<table class="table">
			    <tr>
					<th>ID</th>
					<th>Resturant Id</th>
					<th>Dish Name</th>
					<th>Dish Description</th>
					<th>Dish Price</th>
					<th>Dish Qty</th>
					<th>Dish image</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
				    $query="select d.*,r.resturant_name from dish d, resturant r where r.id=d.resturant_id";
				    $limit=6;
		               if(empty($_GET['p']))
		               {
		               	$start=0;
		               }
		               else
		               {
		               	$pi=$_GET['p'];
		               	$end=$pi * $limit;
		               	$start=$end-$limit;
		               }
	                   $query="select * from dish limit $start,$limit";
					$result=mysqli_query($connect,$query);
					while($row=mysqli_fetch_assoc($result))
					{
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['resturant_id']?></td>
					<td><?php echo $row['dish_name']?></td>
					<td><?php echo $row['dish_desc']?></td>
					<td><?php echo $row['dish_price']?></td>
					<td><?php echo $row['dish_qty']?></td>
					<td><img width="48" height="34" src="uploadimages/<?php echo $row['dish_img']?>"></td>
					<td><a href="dishadd.php?eid=<?php echo $row['id']?>">Edit</a></td>
					<td><a href="dishsummary.php?did=<?php echo $row['id']?>">Delete</a></td>
				</tr>
				<?php } ?>
				<tr>
	               <td colspan="8">
	               <?php
	                   $query="select * from dish";
		               $result=mysqli_query($connect,$query);
		               $count=mysqli_num_rows($result);
		               $pages=ceil($count/$limit);
		               //echo $pages;
		               for($i=1;$i<=$pages;$i++)
		               {
		            	   ?>
		            	       <a href="dishsummary.php?p=<?php echo $i; ?>"><?php echo $i;?></a>
		            	   <?php
		               }
	               ?>
	               </td>
				</tr>
			</table>
		</div>
		<!-- innercontainer4 ends here -->
		<!-- footer starts here -->
		    <div class="footer">
			</div>
		<!-- footer ends here -->
   </body>
</html>