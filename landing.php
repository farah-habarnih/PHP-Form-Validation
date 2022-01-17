<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
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
?>
    <div class="landing-container">
        <h1> Hello There!</h1>
        <p>Welcome to our Website</p>
        <img src="assets/user.png" alt="">
        <button class="login-btn"><a href="login.php">Login</a></button>
        <button class="signup-btn"><a href="Signup.php">Signup</a></button>
    </div>
   
</body>
</html>