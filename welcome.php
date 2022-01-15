<?php 
  session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="welcome-container">
    <h1>
         <?php if(isset($_SESSION['userName'])){
        echo "Welcome"." ".ucfirst($_SESSION['userName']) ;
          }     
          else echo "You have to Login first";
        ?>
    </h1>
    </div>

</body>
</html>