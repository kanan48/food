<?php session_start();
   include('common/connection.php');
   if(!empty($_GET['addcart']))
	{
		$userid=$_GET['userid'];
		$dishid=$_GET['dishid'];
		$qty=$_GET['qty'];
		$name=$_GET['name'];
		$price=$_GET['price'];
		
		$query="select * from cart where dishid='$dishid'";
		$result=mysqli_query($connect,$query);
		if($row=mysqli_num_rows($result))
		{
			?>
			    <script>
				    alert("Dish already added");
			    </script>
			<?php
		}
		else
		{ 
	    	$query = "insert into cart(userid,dishqty,dishid,dishname,dishprice) values ($userid,$qty,$dishid,'$name',$price)";
            if (mysqli_query($connect, $query)) 
			{
                ?>
                    <script>
                        alert("Record inserted");
                        window.location.href = 'buycart.php';
                    </script>
                <?php
            } 
			else 
			{
                ?>
                    <script>
                        alert("Record not inserted");
                    </script>
                <?php
            }
		}
	}
?>
<html>
    <head>
        <title>Food order</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<div class="inner-part1">
		    <?php include('common/leftlist.php')?>
			<!-- right side goes here -->
			<div class="right2">
		    	<div class="name1">
		    		<span>Details</span>
		    	</div>
		    	<div class="food1">
				  <?php
				        if(!empty($_GET['dishid']))
                        {
                            $id=$_GET['dishid'];
    				        $query="select * from dish where id=$id";
    				        $result=mysqli_query($connect,$query);
    				        $row=mysqli_fetch_assoc($result)
    			  ?>
		    		        <div class="eachfood">
		    		            <div class="image">
		    			            <img src="uploadimages/<?php echo $row['dish_img']?>">
		    			        </div>
		    			        <div class="information1">
						            <form>
						                <table>
						        		    <tr>
						        			    <td></td>
						        			</tr>
						        			<tr>
						        			    <td>Dish:<?php echo $row['dish_name'] ?>
						        				<input type="hidden" name="name" value="<?php echo $row['dish_name'] ?>"></td>
						        				<td></td>
						        			</tr>
						        			<tr>
						        			    <td>Rs.<?php echo $row['dish_price']?>
						        				<input type="hidden" name="price" value="<?php echo $row['dish_price'] ?>"></td>
						        			</tr>
						        			<tr>
						        			    <input type="hidden" name="dishid" value="<?php echo $_GET['dishid'] ?>"/><br/>
						        			    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>"/>
						        			    <td class="qty">Enter quantity:</td>
    					        			    <td><input type="text" name="qty"></td>
						        			</tr>
						        	    </table>
						        		<hr class="hr2">
						        		<br/>
						        		<div>
						        		   <?php
    					        			if(empty($_SESSION['Login']))
    					        			{
    					        				?>
    					        				    <input type="submit" name="addcart" class="button1" value="Add to Cart">
    					        				<?php
    					        			}
    					        			else
    					        			{
    					        				?>
    					        				    <a href="buycart.php"><input type="submit" name="addcart" class="button1" value="Add to Cart"></a>
    					        				<?php
    					        			}
    		                                ?>
						        		</div>
						        	</form>
		    			        </div>
		    		        </div>	
				  <?php } ?>
		    	</div>
			</div>
			<!-- right side ends here -->
		</div>
		<!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
    </body>
</html>