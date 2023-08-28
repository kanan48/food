<?php session_start();
   include('common/connection.php');
   if(!empty($_POST['save']))
	{
		$name=$_POST['name'];
		$email=$_POST['add'];
		$message=$_POST['msg'];
		$query="insert into review(name,email,message) values('$name','$email','$message')";		
		if(mysqli_query($connect,$query))
		{
			?>
			    <script>
			        alert("information saved");
			    </script>
			<?php			
		}
		else
		{
			?>
			    <script>
			        alert("not saved");
			    </script>
			<?php
		}		
	}	   
?>
<html>
    <head>
        <title>Reviews</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<!-- inner part goes here -->
		<div class="body1">
		    <div class="heading">
			    <span>Give us Reviews:</span>
			</div>
		    <div class="border">
			    <div class="border-1">
			    	<div class="requir-info">
			    		<span>*Required information</span>
			    	</div>
			    	<div class="input-info">
			    		<div class="input-information">
			    			<form method="post">
			    				<table class="form">
			    					<tr>
			    						<td ><p>full Name* </p></td>
			    						<td><input type="text" name="name" required></td>
			    					</tr>
			    					<tr>
			    						<td > <p>E-mail Address </p></td>
			    						<td><input type="text" name="add" required></td>
			    					</tr>
			    					<tr>
			    						<td> <p>Message</p></td>
			    						<td><textarea  name="msg" required ></textarea></td>
			    					</tr>
									<tr>
									    <td></td>
										<td><div class="snd-btn">
												<input type="submit" value="Send" class="button1" name="save"/>
											</div>
										</td>
									</tr>
			    				</table>
			    			</form>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
		<!-- inner part ends here -->
        <!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
    </body>
</html>