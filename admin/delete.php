<?php

$server= "localhost";
$serverUsername = "root";
$serverPassword = "";
 try {
     $conn = new PDO("mysql:host=$server;dbname=store", $serverUsername, $serverPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
 } catch(PDOException $e) {
 // echo "Connection failed: " . $e->getMessage();
    }

    if($_SERVER["REQUEST_METHOD"]=="GET"){

        $value= $_GET["id"];
        $sql=$conn->prepare("DELETE FROM users WHERE id='$value'");
        $sql->execute();
        header('Location:http://localhost/Project/admin/tables.php');
    }

?>