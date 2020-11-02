<?php 
$target_Path = "image.jpg";
move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );
$command = escapeshellcmd('python a.py');
$output = shell_exec($command);

$output = preg_replace('/\s/', '', $output);

$conn =mysqli_connect("localhost","root","","db","3306");
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error() );
    } 
    $sql = "select * from `profile` where name =  '$output' ";
    //echo "$sql";
    if (!mysqli_query($conn,$sql)) {
        echo("Error description: " . mysqli_error($conn));
      }
      
    else{
        $result = mysqli_query($conn,$sql);
        while ($row = $result->fetch_assoc()) {
            echo "name = ".$row['name']."<br>";
            echo "facebook = ".$row['fb']."<br>";
            echo "github = ".$row['insta']."<br>";
            echo "linkedin = ".$row['linked']."<br>";
        }
    }
    
    $command = escapeshellcmd('del image.jpg');
    shell_exec($command);

?>
