<?php session_start();
    include('common/connection.php');
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from resturant where id=$id";
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
        <title>Resturant summary</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <?php include('common/header.php')?>
		<!-- inner container3 starts here -->
		<div class="innercontainer3">
		    <div class="heading1">
			    <span>Resturant Summary:</span>
			</div>
			<p>This section displays the list of Resturants.</p>
			<table class="table">
			    <tr>
					<th>ID</th>
					<th>Resturant Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php 
					    if(!empty($_GET['s']))
					    {
							$query="select * from resturant";
						}
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
	                    $query="select * from resturant limit $start,$limit";
						$result=mysqli_query($connect,$query);
						while($row=mysqli_fetch_assoc($result))
						{
					?>
					<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo $row['resturant_name']?></td>
						<td><a href="addresturant.php?eid=<?php echo $row['id']?>"><img src="images/edit.jpg"/></a></td>
						<td><a href="resturantsummary.php?did=<?php echo $row['id']?>">Delete</a></td>
					</tr>
					<?php } ?>
					<tr>
	                    <td colspan="4">
	                    <?php
	                        $query="select * from resturant";
		                    $result=mysqli_query($connect,$query);
		                    $count=mysqli_num_rows($result);
		                    $pages=ceil($count/$limit);
		                    //echo $pages;
		                    for($i=1;$i<=$pages;$i++)
		                    {
		                 	   ?>
		                 	       <a href="resturantsummary.php?p=<?php echo $i; ?>"><?php echo $i;?></a>
		                 	   <?php
		                    }
	                    ?>
	                    </td>
	                </tr>
			</table>
		</div>
		<!-- inner container3 ends here --> 
		<!-- footer starts here -->
		    <div class="footer">
			</div>
		<!-- footer ends here -->
   </body>
</html>