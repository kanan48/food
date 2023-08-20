<?php session_start();
    include('common/connection.php');
	if(!empty($_POST['login']))
	{
		$username=$_POST['uname'];
		$password=$_POST['ps'];
		$query="select * from signup1 where fullname='$username' and password='$password'";
		$result=mysqli_query($connect,$query);
		$res=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$_SESSION['Login']="set";
			header("location:home.php");
			$_SESSION['userid']=$res['id'];
			?>
				<script>
					alert("login successful");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("Information isn't valid");
				</script>
			<?php
		}
	}
	
	if(!empty($_GET['log']))
	{
		session_destroy();
	}
	
    if(!empty($_POST['signup']))
    {
		$fname=$_POST['fullname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$query="select * from signup1 where email='$email'";
		$result=mysqli_query($connect,$query);
		if($row=mysqli_num_rows($result))
		{
			?>
			  <script>
				alert("email already exist");
			  </script>
			<?php
		}
		else
		{ 
			$query1="insert into signup1(fullname,email,password) value('$fname','$email','$password')";
			if($res=mysqli_query($connect,$query1))
			{
				?>
				  <script>
					alert("information inserted successfully");
				  </script>
				<?php
			}
			else
			{
				?>
				  <script>
					alert("information not inserted");
				  </script>
				<?php
			}
		}
    }
	include('vendor/autoload.php');
	$client = new Google_Client();
	$client->setClientId('255206869304-b4giuupcneb3giql859a8jkoekt2q6vd.apps.googleusercontent.com');
	$client->setClientSecret('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');
	$client->setRedirectUri('http://localhost/food/EATZZY/home.php');
	$client->addScope("email");
	$client->addScope("profile");
	$_SESSION['Login']="set";
	$fb = new Facebook\Facebook([
	  'app_id' => '847432333389523',
	  'app_secret' => '61dd1c1f3d0ad89d13c5e959c5ff9543',
	  'default_graph_version' => 'v2.10',
	]);	
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; 
	$loginUrl = $helper->getLoginUrl('http://localhost/food/EATZZY/home.php');
	$_SESSION['Login']="set";
?>
<html>
   <head>
        <title>Login</title>
		<link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
        <!-- header starts here -->
        <?php include('common/header.php')?>
		<!-- header ends here -->
        <!-- center part start from here -->
		<div class="main">
		    <!-- login form goes here -->
            <div class="User">
			    <div class="login-here">
					<div class="login">
						<p>Login Here</p>
						<div  class="user-info">
							<form method="post">
								<table class="login-1">
									<tr class="inpt">
										<td ><span>Username</span></td>
										<td><input type="text" name="uname"></td>
									</tr><br>
									<tr class="inpt">
										<td ><span>Password</span></td>
										<td><input type="password" name="ps"></td>
									</tr>
									<tr class="logn-btn">
										<td></td>
										<td><a href="signup.php"><input class="log" type="submit" name="login" value="Login"></a>
										</td>
									</tr>
									<tr>
										<td></td>
										<td><a href="<?php echo $client ->createAuthUrl();?> "><input type="button" class="log" value="Login with Google"/></a></td>
									</tr>
									<tr>
										<td></td>
										<td><a href="<?php echo $loginUrl;?>"><input type="button" class="log" value="Login with Facebook"/></a></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
		    </div>
			<!-- login form ends here -->
			<br><br><br><br>
			<!-- sign up form goes here -->
			<div class="sign-up">
				<div class="sign">
					<p>New User? <a href=""> Sign up</a></p>
					<div  class="user-info">
						<form method="post">
							<table class="login-1">
								<tr class="inpt-1">
									<td ><span>Full Name</span></td>
									<td><input type="text" name="fullname"></td>
								</tr><br>
								<tr class="inpt-1">
									<td ><span>Email</span></td>
									<td><input type="text" name="email"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>Password</span></td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr class="logn-btn" >
									<td></td>
									<td><input class="log" type="submit" name="signup" value="Sign up">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<!-- sign up form ends here -->
		</div>
		<!-- center part ends here -->
		<!-- footer starts here -->
		<div class="footer">
		</div>
		<!-- footer ends here -->
   </body>
</html>