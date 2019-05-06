<!DOCTYPE html>
<html>
    <head>
        <title>Add a blog</title>
    </head>
    <body>
        <form method="POST" action="">
            Blog Name:<input type="text" name="bn">
            <br>
            <br>
            Blog Description:<textarea name="bd" maxlength="500" rows="10" cols="50" placeholder="Enter blog here..."></textarea>
            <br>
            <br>
            <input type="submit" name="submit"  value="ADD">
            <br>
            <br>
        </form>
        <?php
            session_start();
            $e=$_SESSION['sess_user'];
            $p=$_SESSION['sess_pass'];
            $n=$_SESSION['sess_name'];
            $o=$_SESSION['sess_occ'];
            if(isset($_POST["submit"]))
            {  
                if(!empty($_POST['bn']) && !empty($_POST['bd']))
                {
                    $bn=$_POST['bn'];
                    $bd=$_POST['bd'];

                    $servername="localhost";
                    $username="";//write username here
                    $password="";//write password here
                    $dbname="bloggerdb";
                    $conn=mysqli_connect($servername, $username, $password, $dbname);
                    if(!$conn)
                    {
                       die("Connection Failed". mysqli_connect_error());
                    }
                    $query=mysqli_query($conn,"SELECT * FROM blogs WHERE bname='".$bn."'");  
                    $numrows=mysqli_num_rows($query);  
                    if($numrows==0)  
                    {  

                        $sql="INSERT INTO blogs VALUES('$e','$bn','$bd','$n','$o')"; 
                        $result=mysqli_query($conn, $sql);
                    
                        if($result)
                        {  
                            echo "Blog Successfully Added";  
                        } 
                        else 
                        {  
                            echo "Failure!";  
                        }
                    }
                    else
                    {
                        echo "That Blog Name already exists! Please try again with another.";  
                    }
                }
                else
                {
                    echo "All fields are required!";
                }
            }
            //echo $e."<br>".$p."<br>".$n."<br>".$o."<br>";


        ?>

    </body>
</html>
