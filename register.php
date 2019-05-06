<!doctype html>  
<html>  
<head>  
<title>Register</title>  
</head>  
<body>  
    <form action="" method="POST">   
        NAME: <input type="text" name="n"><br />           
        E-MAIL ID: <input type="text" name="e"><br />  
        PASSWORD: <input type="password" name="p"><br />   
        Occupation: <input type="text" name="o"><br />  
        <input type="submit" value="REGISTER" name="submit" />  
    </form>  
<?php  
if(isset($_POST["submit"]))
{  
if(!empty($_POST['e']) && !empty($_POST['p'])&& !empty($_POST['n'])&& !empty($_POST['o'])) 
{  

    $e=$_POST['e'];  
    $p=$_POST['p']; 
    $n=$_POST['n'];
    $o=$_POST['o'];

    $servername="localhost";
    $username="";//write username here
    $password="";//write password here
    $dbname="bloggerdb";
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)
    {
       die("Connection Failed". mysqli_connect_error());
    }

    $query=mysqli_query($conn,"SELECT * FROM acc WHERE id='".$e."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
        $sql="INSERT INTO acc VALUES('$e','$p','$n','$o')";  
  
        $result=mysqli_query($conn, $sql);
        if($result)
        {  
            echo "Account Successfully Created";  
        } 
        else 
        {  
            echo "Failure!";  
        }  
  
    } 
    else 
    {  
        echo "That username already exists! Please try again with another.";  
    }  
  
} 
else 
{  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   
