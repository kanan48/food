<?php session_start();
   include('common/connection.php');
?>
<html>
    <head>
        <title>Home</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<!-- main conatiner2 starts here -->
		<div class="maincontainer2">
		    <!-- upper part of the page starts here-->
		    <div class="left">
			    <span>its not just</span><br/>
				<span>Food,It's an</span><br/>
				<span>Experience.</span><br/>
				<br/><br/>
				<div class="button">
				    <a href="dishes.php"><button>View Menu</button></a>
					&nbsp
					<div class="rating">
					    <img src="images/ratings.png">
					</div>
				</div>
			</div>
			<div class="right">
			    <img src="images/home.png">
			</div>
			<!-- upper part of the page ends here -->
			<!-- lower part of the page starts here -->
			<div class="lower">
			    <div class="dish-name">
				    <span>Must try it!</span>
				</div>
				<br/>
				<div class="lower1">
				    <?php
    				    $query="select * from dish order by rand() limit 0,4";
    				    $result=mysqli_query($connect,$query);
    				    while($row=mysqli_fetch_assoc($result))
    				    {
    				?>
				    <div class="dish">
				        <div class="dish-detail">
				    	    <img src="uploadimages/<?php echo $row['dish_img']?>">
				    		<div class="details">
				    		    <span><?php echo $row['dish_desc']?></span><br/>
    			    			<span><?php echo $row['dish_name']?></span><br/>
    			    			<p>Rs.<?php echo $row['dish_price']?></p>
    			    		</div>
    			    		<hr class="hr2">
				    		<a href="dishes.php"><button class="button1">Explore</button></a>
				    	</div>
				    </div>
					<?php } ?>
				</div>
			</div>
			<!-- lower part of the page ends ends here-->
		</div>
		<!-- main conatiner2 ends here -->
		<!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
    </body>
</html>