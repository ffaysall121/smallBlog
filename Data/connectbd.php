<?php
       $host ="localhost";
       $username ="root";
       $password ="";
       $database ="myblog";
   
       $connection = mysqli_connect($host,$username,$password,$database);

    if(mysqli_connect_errno()){
        echo"problem creating database connection";
    }
    else{
        // echo("Database connect Successful");
    }
?>