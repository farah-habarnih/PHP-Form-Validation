<?php 
  session_start();
   ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<script src="jquery/jquery.min.js"></script>
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

$userInformation=array(["username"=>"farah","email"=>"user@gmail.com","password"=>"123698745"]);
$emailMsg=$passwordMsg=$matchMsg="";

if(isset($_POST['email'])){
	$regexEmail='/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
	$regexPass='/^.{8,}$/';
	$user=array();
	if(preg_match($regexEmail,$_POST['email'])){
		$emailMsg='';
	}
	else{
		$emailMsg="Invalid Email";
	}

	if(preg_match($regexPass,$_POST['password'])){
		if($_POST['password'] === $_POST['repeatPassword']){
			$matchMsg="Password Matched";
		}
		else{
			$matchMsg="Password Didn't Match";
		}
	}
		else{
			$passwordMsg="Password should be at least 8 characters";
		}
}
if(preg_match($regex,$_POST['email']) && preg_match($regexPass,$_POST['password']) && $_POST['password']===$_POST['repeatPassword']){
	$user=array("name"=>$_POST['username'],"email"=>$_POST['email'],"password"=>$_POST['password']);
	if( $_SESSION['userInformation']){
		 $lastData=$_SESSION["userInformation"];
		 array_push($lastData,$user);
	$_SESSION["userInformation"]=$lastData;
	}else{
		array_push($userInformation,$user);
		$_SESSION["userInformation"]=$userInformation;
	}
   
}
?>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form role="form" method="post" onsubmit="return formSignup()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
						<input type="email" class="form-control" id="email" name="email" placeholder="email" onchange="emailValidate()" required>
						<p id="msgEmail"><?php echo $emailMsg;?></p>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="password" onchange="passwordValidate()" required>
						<p id="msgPassword"></p>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="repeat password" onchange="passwordMatching()" required>
					<p id="msgMatch"></p>
					</div>
                    
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Signup" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php">Login </a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script src="index.js"> </script>
</body>
</html>