<!-- left side goes here -->
<div class="left1">
    <div class="categorious">
		<div class="cate-heading">
			<p>Restaurants/Cafe's</p>
		</div>
		<div class="items">
			<?php
		    $query="select * from resturant";
		    $result=mysqli_query($connect,$query);
		    while($row=mysqli_fetch_assoc($result))
		    {
	        ?>
		    <ul>
		    	<a href="Dishes.php?cid=<?php echo $row['id']?>"><li><?php echo $row['resturant_name']?></li></a>
		       <?php } ?>
		    </ul>
		</div>
	</div>
</div>
<!-- left side ends here -->