
<?php 
$myfile = fopen("myfile.txt", "r") or die("Unable to open file!");
$search = fread($myfile,filesize("myfile.txt"));
fclose($myfile);

$conn =mysqli_connect("localhost","root","","db","3306");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error() );
} 
$sql = "select Facebook,Linkedin,Instagram from person where Name='$search";
$result=mysqli_query($conn,$sql);
echo "$result"."ana";
?> 
