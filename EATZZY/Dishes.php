<?php session_start();
   include('common/connection.php');
?>
 <html>
    <head>
        <title>Food Items</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<!-- inner part starts from here -->
		<div class="inner-part">
		    <?php include('common/leftlist.php')?>
			<!-- right side goes here -->
			<div class="right1">
			    <div class="name1">
				    <span>food Items:</span>
				</div>
				<div class="food">
				    <?php
    				    if(!empty($_GET['cid']))
					    {
                            $cid=$_GET['cid'];
    				        $query="select * from dish where resturant_id=$cid";
    				        $result=mysqli_query($connect,$query);
    				    	while($row=mysqli_fetch_assoc($result))
    				    	{	
    			    ?>
				                <div class="each-food">
				                    <div class="image">
				                         <img src="uploadimages/<?php echo $row['dish_img']?>">
					         	    </div>
					         	    <div class="information">
					         	        <div class="food-detail">
					         		    	<span>Dish: <?php echo $row['dish_name']?></span><br/><br/>
					         		    	<span> <?php echo $row['dish_desc']?></span><br/><br/>
					         		    	<p>Rs.<?php echo $row['dish_price']?></p>
					         		    </div>
					         		    <hr class="hr2">
					         		    <?php
    			                            if(empty($_SESSION['Login']))
    			                            {
    			                            	echo"login first";
    			                            }
    			                            else
    			                            {
    			                            	?>
    			                            		<a href="foodorder.php?dishid=<?php echo $row['id']?>"><input type="submit"  class="button1" name="view" value="View"></a>
    			                            	<?php
    			                            }
    		                             ?>
					         	    </div>
				                </div>
				            <?php 
					    	}
					    }
					    	?>	
				</div>
			</div>
			<!-- right side ends here -->
		</div>
		<!-- inner part ends here -->
    </body>
</html>