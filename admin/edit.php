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
	<link rel="stylesheet" type="text/css" href="../login.css">
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
 if($_SERVER["REQUEST_METHOD"]=="GET"){
 $value= $_GET["id"];
 $sql =$conn->prepare("SELECT * FROM users WHERE is_admin='0' AND id='$value'");
 $sql->execute();
 $data=$sql->fetch(PDO::FETCH_ASSOC);
 }

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $value= $_GET["id"];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];


    $sql =$conn->prepare("UPDATE users SET username='$username',email='$email',password='$password' WHERE id='$value'");
    $sql->execute();
  
    header('Location:http://localhost/Project/admin/tables.php');

}

?>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Edit user</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form role="form" method="post" onsubmit="" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="username" name="username" value='<?php echo "$data[username]"; ?>' placeholder="username" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" id="email" name="email" value='<?php echo "$data[email]"; ?>' placeholder="email" onchange="emailValidate()" required>
						<p id="msgEmail"></p>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="password" name="password" value='<?php echo "$data[password]"; ?>' placeholder="password" onchange="passwordValidate()" required>
						<p id="msgPassword"></p>
					</div>
                   
                    
					
					<div class="form-group">
						<input type="submit" value="Signup" name="signup_user" class="btn float-right login_btn">
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