<!DOCTYPE html>
<html>
    <head>
        <title>Blogs</title>
    </head>
<body>
<?php
    $servername="localhost";
    $username="";//write username here
    $password="";//write password here
    $dbname="bloggerdb";
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)
    {
       die("Connection Failed". mysqli_connect_error());
    }

    $query=mysqli_query($conn,"SELECT * FROM blogs;");
    $numrows=mysqli_num_rows($query); 
    $e=$bn=$bd=$wn=$wo="";
    if($numrows!=0)  
    {
        while($row=mysqli_fetch_assoc($query))  
        {  
            $e=$row['id'];  
            $bn=$row['bname']; 
            $bd=$row['bdesc'];
            $wn=$row['wname'];
            $wo=$row['wocc'];
            
            echo "<h3>".$bn."</h3>";
            echo "<testarea rows=\"10\" cols=\"50\">".$bd."</textarea>";
            echo "<br>";
            echo "Author - ".$wn.", ".$wo;
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
    }
    else
    {
        echo "Hmm, quite empty in here!!";
    }
?>
</body>
</html>
