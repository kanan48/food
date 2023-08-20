<?php session_start();
    include('common/connection.php');
    if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from cart where id=$id";
		if(mysqli_query($connect,$query))
		{
			?>
			    <script> 
			       alert("order cancelled");
				</script>
			<?php
		}
		else
		{
			?>
			    <script> 
			       alert("order didn't cancelled");
				</script>
			<?php
		}
	}
?>
<html>
    <head>
        <title>Buy Cart</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<!-- inner part1 starts here -->
		<div class="inner-part1">
			<!-- right side goes here -->
			<div class="food">
			    <div class="name1">
				    <span>Your Cart:</span>
				</div>
				<div class="mycart">
				    <?php
                        $total = 0;
                        
                        $userid = $_SESSION['userid'];
                        $query = "SELECT * FROM cart WHERE userid=$userid";
                        $result = mysqli_query($connect, $query);
                    ?>
                     
                    <table>
                        <tr>
                            <th>Order no.</th>
                            <th>Dish Id</th>
                            <th>Dish Name</th>
                            <th>Quantity</th>
							<th>Price</th>
                            <th>Cancellation</th>
                        </tr>
                         
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            $total= $total + $row['dishqty'] * $row['dishprice'];
                        ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['dishid']?></td>
                                <td><?php echo $row['dishname']?></td>
                                <td><?php echo $row['dishqty']?></td>
							    <td><?php echo $row['dishprice'] ?> /qty.</td>
                                <td><a href="buycart.php?did=<?php echo $row['id']?>">Cancel Order</a></td>
                            </tr>
                        <?php } ?>
                        
                    </table>
					<div class="total">
						<p>Total Bill: Rs.<?php echo $total ?></p>
					</div>
				</div>
			</div>
			<!-- right side ends here -->
		</div>
		<!-- inner part ends here -->
		<!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
    </body>
</html>