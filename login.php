<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
$e="";
$p="";
$eE="*";
$pE="*";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["e"]))
        $eE="e-mail ID is Required";
    else
    {
        $e=test_input($_POST["e"]);
        if(!preg_match("/^[a-zA-Z0-9]+@[a-z]+\.[a-z]+/",$e))
            $eE="Invalid e-mail ID";
        else
            $eE="";
    }
    if(empty($_POST["p"]))
        $pE="password is Required";
    else
    {
        $p=test_input($_POST["p"]);
        $pE="";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($pE==""&&$eE=="")
{
    $servername="localhost";
    $username="";//write username here
    $password="";//write password here
    $dbname="bloggerdb";
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)
    {
       die("Connection Failed". mysqli_connect_error());
    }
    $sql="SELECT * FROM acc WHERE id='".$e."' AND pass='".$p."';";
    $query=mysqli_query($conn, $sql);
    $numrows=mysqli_num_rows($query); 
    if($numrows!=0)  
    {  
        while($row=mysqli_fetch_assoc($query))  
        {  
            $dbusername=$row['id'];  
            $dbpassword=$row['pass'];  
        }  
  
        if($e == $dbusername && $p == $dbpassword)  
        {  
            session_start();  
            $_SESSION['sess_user']=$e;  
  
            /* Redirect browser */  
            header("Location: welcome.php");  
        }  
    }
    else
        {  
            echo("Invalid username or password!");  
        } 
    
    $conn->close();
}
?>
<html>
    <body>
    <p><span class="error">* required field</span></p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            E-MAIL ID:<input type="text" name="e">
            <span class="error">* <?php echo $eE;?></span><br><br>
            PASSWORD:<input type="password" name="p">
            <span class="error">* <?php echo $pE;?></span><br><br>
            <input type="submit" name="submit"  value="LOGIN"><br><br>
            New to Blogging? Register <a href="register.php">here</a><br>
        </form>
    </body>
</html>
