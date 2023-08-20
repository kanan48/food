<?php session_start();
    include('common/connection.php');
	if(!empty($_POST['save']))
	{
		$username=$_POST['un'];
		$password=$_POST['pw'];
		$query="select * from login where username='$username' and password='$password'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$_SESSION['uname']="set";
			header('location:addresturant.php');
			
	        if(!empty($_POST['c']))
            if($_POST['c']=="on")
		    {
		      setcookie("usercookie",$username);
			  setcookie("userpassword",$password);
			}
		}
		else
		{
			echo"login failed";
		}
	}
	if(!empty($_GET['log']))
	{
		session_destroy();
	}
?>
<html>
   <head>
        <title>Admin Login</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <?php include('common/header.php')?>
        <!-- inner container 2 starts here -->
		<div class="innercontainer6">
		    <!-- login form starts from here -->
		    <div class="log">
		        <form method="post">
		            <table class="logintable">
		                <tr>
		        	    	<td></td>
		        	    	<td><p>Login</p></td>
		        	    </tr>
		        	    <tr>
		    	        	<td class="login-table-text">Username</td>
		    	        	<td><input type="text" name="un" class="login-table-text" required value="<?php if(!empty($_COOKIE['usercookie'])) echo $_COOKIE['usercookie']?>"/></td>
		    	        </tr>
		    	        <tr>
		    	        	<td class="login-table-text">Password</td>
		    	        	<td><input type="password" name="pw" class="login-table-text" required value="<?php if(!empty($_COOKIE['userpassword'])) echo $_COOKIE['userpassword']?>" /></td>
		    	        </tr>
		    	    	<tr>
		    	        	<td></td>
		    	        	<td><?php if(!empty($_COOKIE['usercookie']) && !empty($_COOKIE['userpassword'])) { ?>
		    		    	   <input checked type="checkbox" name="c"/>Remember me<br/>
		    		    	   <?php  }else { ?>
		    		    	   <input type="checkbox" name="c"/>Remember me<br/>
		    		    	   <?php } ?>
		    		    	</td>
                        </tr>
		        	    <tr>
		    	        	<td></td>
		    	        	<td><input type="submit" name="save" value="login"/></td>
                        </tr>			 
		            </table>
		        </form>
			</div>
			<!-- login form ends here -->
		</div>
		<!-- inner container 2 ends here -->
		<!-- footer starts here -->
		    <div class="footer">
			</div>
		<!-- footer ends here -->
   </body>
</html>