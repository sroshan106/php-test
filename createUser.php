<?php 

    $username =   $_POST['username'];
    $password =   $_POST['password'];
    $contact = $_POST['contact'] ;
    $address = $_POST['address'];
    $email = $_POST['email'];

    $conn =mysqli_connect("localhost","root","","db","3306");
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error() );
    } 
    $query = "create table if not exists users (id INT NOT NULL AUTO_INCREMENT primary key,username varchar(50),password varchar(50),contact varchar(10),email varchar(200),address varchar(50))";
    mysqli_query($conn,$query);
    

    $sql = "INSERT INTO  users (username,password,contact,address,email) values ('$username','$password','$contact','$address','$email')";
    if(mysqli_query($conn,$sql))
    {
        echo "User created";
	header("Location: login.html");
	die();
    }
    else
    {
        echo "Unable to create User".mysqli_error($conn);
    }
    mysqli_close($conn);
    
?>