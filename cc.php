<?php 



 
$yourName = $_POST['yourName'];
$yourLastname = $_POST['yourLastname'];
$yourEmail = $_POST['yourEmail'];
$query = $_POST['query'];

$sql="INSERT INTO contact(username, lastname, email, query) VALUES ('".$yourName."','".$yourLastname."', '".$yourEmail."', '".$query."')";

$conn =mysqli_connect("localhost","root","","db","3306");
if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you! We will contact you soon";
header("Location: index.html");
die();


}
?>