<!-- main container starts here -->
	<div class="maincontainer">
	    <!-- inner container starts from here -->
		<div class="innercontainer">
		    <div class="name">
		        <span>Eatzzy</span>
				<p>ENJOY THE TASTE OF EVERY BITE</p>
		    </div>
		    <!-- login/logout button goes here -->
		    <div class="login1">
			    <?php
		        	if(empty($_SESSION['Login']))
					{
		               	?>
		               		<a href="login.php"><input type="button" name="login" value="Log in"></a>
		               	<?php
		            }
		        	else
		        	{
		        		?>
							<a href="login.php?log=1"><input type="button" name="logout" value="Logout <?php echo $_SESSION['Login'] ?>"/></a>
		        		<?php
		        	}
		         ?>
		    </div>
		    <!-- login/logout button ends here -->
	    </div>
		<!-- inner container starts from here -->
	</div>
	<!-- main container ends here -->
	<!-- main container1 goes here -->
	<div class="maincontainer1">
	    <!-- inner container1 starts from here -->
	    <div class="innercontainer1">
	        <div class="list">
		    		<ul>
		    			<li><a href="home.php">Home</a></li>
		    			<li><a href="contact.php">Contact us</a></li>
						<li><a href="review.php">Your Reviews</a></li>
		    		</ul>
		    </div>
		</div>
		<!-- inner container1 ends here -->
	</div>
	<!-- main container1 ends here -->