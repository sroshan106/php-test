<?php 
    $username =   $_POST['username'];
    $password =   $_POST['password'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $conn =mysqli_connect("localhost","root","","db","3306");
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error() );
    } 
    $sql = "select username,password from users where username =  '$username' and password='$password' ";
    
    $flag = 0;
    if ($result=mysqli_query($conn,$sql))
    {
        while ($row=mysqli_fetch_row($result))
        {
            if ($row[0] == $username && $row[1] == $password)
            {
                session_start();
                $_SESSION["name"]=$username;
                header("location:form.html",true);
		die();
                $flag=1;
                break;
            }
        }   
    mysqli_free_result($result);
    }
    if ($flag==0)
    {
        header("location:Login.html",true);
    }
    mysqli_close($conn)

?>