<?php session_start();
    include('common/connection.php');
	if(!empty($_POST['save']))
		{
			$rname=$_POST['resname'];
			if(!empty($_POST['edited']))
			{
				$id=$_POST['edited'];
				$query="update resturant set resturant_name='$rname' where id=$id";
			}
			else
			{
			    $query="insert into resturant(resturant_name) values('$rname')";                				
		    }
			if(mysqli_query($connect,$query))
			{
				?>
				  <script>
				     alert("Resturant inserted");
				  </script>
				<?php
			}
			else
			{
				?>
				  <script>
				     alert("Resturant not inserted");
				  </script>
				<?php
			}
		}
		if(!empty($_GET['eid']))
	    {
	    	$id=$_GET['eid'];
	    	$query="select * from resturant where id=$id";
	    	$result=mysqli_query($connect,$query);
	    	$r=mysqli_fetch_assoc($result);
	    }
		if(empty($_SESSION['uname']))
		{
			header('location:index.php');
		}
?>
<html>
   <head>
        <title>Resturant name</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <?php include('common/header.php')?>
        <!-- inner container 2 starts from here -->
		<div class="innercontainer2">
		    <div class="heading">
			    <span>Add Resturant:</span>
			</div>
		    <div class="Page">
		        <p class="page1">*Add Resturant here:</p>
				<form method="post">
					<input type="hidden" name="edited" value="<?php if(!empty($r['id'])) echo $r['id'];?>"/>
		            <table class="table2">
					    <tr>
					        <td align="right">Resturant Name</td>
					        <td><input name="resname" type="text" value="<?php if(!empty($r['resturant_name'])) echo $r['resturant_name']?>"/>
						    <input type="submit" value="Save" name="save" class="end"/></td>
					    </tr>
					</table>
		        </form>
			</div>
		</div>
		<!-- inner container 2 ends here -->
		<!-- footer starts here -->
		    <div class="footer">
			</div>
		<!-- footer ends here -->
   </body>
</html>