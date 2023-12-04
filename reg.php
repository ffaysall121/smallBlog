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
    <div class="bnr2">
       <div class="bx">
       
        <form method="post" action="Function/auth.php" enctype="multipart/form-data">
        <h4 style="text-align: center;margin-bottom:5px">Registration </h4>
        <hr>
        <br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="phone" placeholder="Phone Number" required><br>
      
        <input type="radio" name="gender" value="Mail" required>
        <label for="Mail">Mail </label>
        <input type="radio" name="gender" value="femail" required>
        <label for="Femail">Femail </label>
     <br>
     <label for="about" >About Your Interest :</label><br>
        <input type="checkbox" name="interest[]" id="" value="food">
        <label for="food">Food</label><br>
        <input type="checkbox" name="interest[]" id="" value="cook">
        <label for="Cook">Cook</label><br>
        <input type="checkbox" name="interest[]" id="" value="travel">
        <label for="travel">Travel</label><br>
        <input type="checkbox" name="interest[]" id="" value="sports">
        <label for="sports">Sports</label>
        <br>

        <label for="cars">Choose your Area :</label>

<select name="area" id="cars" required>
  <option value="asia">Asia</option>
  <option value="australia">Australia</option>
  <option value="europe">Europe</option>
  <option value="america">America</option>
  <option value="africa">Africa</option>
</select>
<br>
<label for="image">Profile Picture </label>
<input type="file" name="image" accept="image/*" >
<br>
<input type="password" name="password" id="" placeholder="Password"><br>
<input type="password" name="confirm_password" id="" placeholder="Confirm Password">

<br>
        <!-- <button type="submit" name="submit">Submit</button> -->
         <input class="btn" style="background-color: green; color:white" type="submit" name="submit" value="submit">   
        </form>
       </div>
    </div>
</body>
</html>