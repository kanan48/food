<?php session_start();
	include('common/connection.php');
		if(!empty($_POST['save']))
		{
			$catname=$_POST['catname'];
			$dishname=$_POST['dish_name'];
			$dishdesc=$_POST['dish_desc'];
			$dishprice=$_POST['dish_price'];
			$dishqty=$_POST['dish_qty'];
			$dimagename=$_FILES['dish_img']['name'];
			$dtemppath=$_FILES['dish_img']['tmp_name'];
			$currtime=round(microtime(true) * 1000);
			$extarr=explode(".",$dimagename);
			//print_r($extarr);
			$ext=$extarr[1];
			//echo $currtime;
			$fullfilename=$currtime.".".$ext;
			if(!empty($_POST['edited']))
			{
				$id=$_POST['edited'];
				$query="update dish set dish_name='$dishname',dish_desc='$dishdesc',dish_price=$dishprice,dish_qty=$dishqty where id=$id";
			}
			else
			{
			    $query="insert into dish (resturant_id,dish_name,dish_desc,dish_price,dish_img,dish_qty) value('$catname','$dishname','$dishdesc',$dishprice,'$fullfilename',$dishqty)";          				
		    }
			if(mysqli_query($connect,$query))
			{
				move_uploaded_file($dtemppath,"uploadimages/".$fullfilename);
				?>
				  <script>
				     alert("dish inserted");
				  </script>
				<?php
			}
			else
			{
				?>
				  <script>
				     alert("dish not inserted");
				  </script>
				<?php
			}
		}
		if(!empty($_GET['eid']))
	    {
	    	$id=$_GET['eid'];
	    	$query="select * from dish where id=$id";
	    	$result=mysqli_query($connect,$query);
	    	$row=mysqli_fetch_assoc($result);
	    }
		if(empty($_SESSION['uname']))
		{
			header('location:index.php');
		}
?>
<html>
   <head>
        <title>Dish Add</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <?php include('common/header.php')?>
        <!-- inner container starts from here -->
		<div class="innercontainer5">
		    <div class="heading">
			    <span>Add Dishes</span>
			</div>
			<div class="Page">
		        <p class="page1">Add Dishes from here:</p>
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="edited" value="<?php if(!empty($row['id'])) echo $row['id'];?>"/>
		            <table class="table2" border="solid 1px" width="655px">
					    <tr>
						    <td align="right">Select Resturant:</td>
				            <td>
							    <select name="catname">
								    <option>&lt;select Resturant:&gt;</option>
									    <option></option>
										<?php 
										   $query="select * from resturant";
										   $result=mysqli_query($connect,$query);
										   while($cat=mysqli_fetch_assoc($result))
										   {
										?>
										    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['resturant_name']?></option>
										   <?php } ?>
								</select>
							</td>
						</tr>
				        <tr>
				            <td align="right">Dish Name:</td>
				            <td><input name="dish_name" type="text"/>
					        </td>
				        </tr>
						<tr>
				            <td align="right">Dish Description:</td>
				            <td><input name="dish_desc" type="text"/></td>
						</tr>
						<tr>
				            <td align="right">Dish Quantity:</td>
				            <td><input name="dish_qty" type="text"/></td>
						</tr>
						<tr>
				            <td align="right">Dish Price:</td>
				            <td><input name="dish_price" type="text"/></td>
						</tr>
						<tr>
				            <td align="right">Dish Image:</td>
				            <td><input name="dish_img" type="file"/>
							<input type="submit" value="Save" name="save" class="end"/></td>
						</tr>
						
					</table>
		        </form>
			</div>
		</div>
		<!-- inner container5 ends here -->
		<!-- footer starts here -->
		    <div class="footer">
			</div>
		<!-- footer ends here -->
   </body>
</html>