<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>MyBlog</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="bnr3">
       <div class="bx">
       
        <form method="post" action="Function/auth.php">
        <h4 style="text-align: center;margin-bottom:5px">Login </h4>
        <hr>
        <br>
        
        <input type="email" name="email" placeholder="Email" required><br>
        
<br>

<input type="password" name="password" id="" placeholder="Password"><br>


<br>
        <!-- <button type="submit" name="submit">Submit</button> -->
         <input class="btn" style="background-color: green; color:white" type="submit" name="login" value="Login">   
        </form>
       </div>
    </div>
</body>
</html>