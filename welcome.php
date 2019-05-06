<html>
    <body>
    <p align="right"><a href="logout.php">logout</a></p>
        Welcome, 
        <?php
        session_start();
        $e=$_SESSION['sess_user'];

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
        $dbid=$dbpass=$dbn=$dbo="";
        if($numrows!=0)  
        {
            while($row=mysqli_fetch_assoc($query))  
            {  
                $dbid=$row['id'];  
                $dbpass=$row['pass']; 
                $dbn=$row['name'];
                $dbo=$row['occ']; 
            }
        }
        echo $dbn;
        
        $_SESSION['sess_user']=$dbid;
        $_SESSION['sess_pass']=$dbpass;
        $_SESSION['sess_name']=$dbn;
        $_SESSION['sess_occ']=$dbo;
        ?>
        <br>
        <br>
        <a href="addblog.php">Add a new blog</a>
        <br>
        <br>
        <a href="viewblog.php">View all blogs</a>
        <br>
    </body>
</html>
