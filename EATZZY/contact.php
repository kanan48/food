<?php session_start();
   include('common/connection.php');
   if(!empty($_POST['save']))
	{
		$name=$_POST['name'];
		$email=$_POST['add'];
		$message=$_POST['msg'];
		$query="insert into contact(name,email,message) values('$name','$email','$message')";		
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
        <title>Contact</title>
		<link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
		<!-- inner part goes here -->
		<div class="contact-us">
		    <div class="heading">
			    <span>Contact us</span>
			</div>
			<div class="costomer-info">
			    <div class="costomer-service">
			    	<p>Customer Service:91+ 1658936340</p>
			    	<p>Ludhiana,Punjab,INDIA</p>
			    	<p>Eatzzy food factory.</p>
			    </div>
			        <hr class="hr">
			    <div class="info">
			    	<div class="required-info">
			    		<h4>Contact Us</h4>
			    		<p>Have a question? We have 24x7 Costomer Service.</p>
			    		<p>Befor you contact us,skim through our self Serve opton and Frequently Asked Question for Quicker answer.</p>
			    		<p>Want to know more about the status of the orders?</p>
			    		<p>Login to view our order.</p>
			    	</div>
			    </div>
				<!-- customer required detail form goes here -->
			    <div class="border">
			    	<div class="border-1">
			    		<div class="border-2">
			    			<p>Contact Us</p>
			    		</div>
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
				<!-- customer required details form ends here -->
			</div>
		</div>
		<!-- inner part ends here -->
		<!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
    </body>
</html>