<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php
 
 $server= "localhost";
 $serverUsername = "root";
 $serverPassword = "";
 
 try {
   $conn = new PDO("mysql:host=$server;dbname=store", $serverUsername, $serverPassword);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully";
 } catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
 
 if (isset($_POST['login_user'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);
	if($result->rowCount() ===1){
	$_SESSION['username'] = $username;
	header('Location: welcome.php');} 
 }





// $emailLoginMsg=$passwordLoginMsg="";
// $_SESSION["passwordEMsg"]="";
// $_SESSION["emailEMsg"]="";


// if(isset($_POST["email"])){ 
// 	$data=$_SESSION['userInformation'];
// 	foreach($data as $user){
// 		if($user["email"]===$_POST["email"] && $user["password"]===$_POST["password"] ){  
// 			 $_SESSION['userName']=$user["name"];
// 			 $_SESSION["passwordEMsg"]=" ";
// 			 $_SESSION["emailEMsg"]=" ";
// 			header('Location: welcome.php'); 
// 		}elseif($user["email"]!==$_POST["email"]){
// 			$_SESSION["emailEMsg"]="Incorrect Email";
// 			$_SESSION["emailEMsg"]=" ";
// 		}elseif($user["email"]===$_POST["email"] && $user["password"]!==$_POST["password"]){
// 			$_SESSION["passwordEMsg"]="Incorrect password";
// 			$_SESSION["emailEMsg"]=" ";
// 			break;
// 		}
// 	}
// }
?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card1">
			<div class="card-header">
				<h3>Login</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="">
				<div class="input-group form-group">
				<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="username" name="username" placeholder="username" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" id="email" name="email" placeholder="email" required>
						<p id="msgError" style="color:red"><?php
                                 if(isset( $_SESSION["emailEMsg"])) { echo $_SESSION["emailEMsg"]; }else echo ""; ?></p>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="password"required>	
						<p id="msgError" style="color:red"><?php  if(isset( $_SESSION["passwordEMsg"])) {echo $_SESSION["passwordEMsg"]; }else echo "";?></p>		
						</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="login_user" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="Signup.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>