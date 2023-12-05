<?php

include('functionUser.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>
<body>

    <div class="bnr4">
        <div class="box2">
            <div class="part1">
            <?php
                $profile = getProfile();
                $profileData = mysqli_fetch_array($profile);
                foreach($profile as $data){
                   
                    ?>

                    <img src="images/<?=$data['image'];?>" alt="" height="300px" width="250px">
                    <h4>Name :<?=$data['name']; ?></h4>
                    <h5>Email :<?=$data['email']; ?></h5>
                    <h5>Phone :<?=$data['phone']; ?></h5>
                    <h5>Gender :<?=$data['gender']; ?></h5>
                    <h5>Blog Location :<?=$data['area']; ?></h5>
                    <ul>Interest :-></ul><?php $interest = unserialize($data['interest']);
                    foreach($interest as $item){
                        ?>
                      <li><?=$item?> </li>

                    <?php

                    }
                     ?>



                 <?php

                }
                ?>

            </div>
            <div class="part2">
                <div class="bx">
                <?php
                $profile = getProfile();
                $profileData = mysqli_fetch_array($profile);
                foreach($profile as $data){
                   
                    ?>
                    
                <form method="post" action="Function/auth.php" enctype="multipart/form-data">
        <h4 style="text-align: center;margin-bottom:5px">Update Info </h4>
        <hr>
        <br>
        <input type="text" name="name" placeholder="Name" value="<?=$data['name']; ?>" required><br>
        <input type="email" name="email" placeholder="Email" value="<?=$data['email']; ?>" required><br>
        <input type="number" name="phone" placeholder="Phone Number" value="<?= $data['phone']; ?>" required><br>
      
        <input type="radio" name="gender" value="Male" <?= $data['gender']=='Male'?  "checked":"";  ?> >
        <label for="Mail">Male </label>
        <input type="radio" name="gender" value="female" <?= $data['gender']=='female' ? "checked":"" ; ?> >
        <label for="Femail">Female </label>
     <br>
     <label for="about" >About Your Interest :</label><br>
     <?php 

     function inCheck($vlu){
        global $data;
        $interest = unserialize($data['interest']);
        if(in_array($vlu,$interest))
           {
            echo "checked";
          }  
          elseif($data['area']==$vlu){
            echo "selected";

          }
     }
     
    ?>
        <input type="checkbox" name="interest[]" id="" value="food" <?php inCheck("food"); ?>>
        <label for="food">Food</label><br>
        <input type="checkbox" name="interest[]" id="" value="cook"<?php inCheck("cook"); ?>>
        <label for="Cook">Cook</label><br>
        <input type="checkbox" name="interest[]" id="" value="travel"<?php inCheck("travel");?>>
        <label for="travel">Travel</label><br>
        <input type="checkbox" name="interest[]" id="" value="sports"<?php inCheck("sports"); ?>>
        <label for="sports">Sports</label>
        <br>
     
        <label for="area">Choose your Area :</label>

<select name="area" id="area" required>
  <option value="asia" <?php inCheck("asia");?>>Asia</option>
  <option value="australia"<?php inCheck("australia");?>>Australia</option>
  <option value="europe"<?php inCheck("europe");?>>Europe</option>
  <option value="america"<?php inCheck("america");?>>America</option>
  <option value="africa"<?php inCheck("africa");?>>Africa</option>
</select>
<br>
<label for="image">Profile Picture </label>
<input type="file" name="image" accept="image/*" >
<br>
<input type="password" name="password" id="" placeholder="Password" value="<?=$data['password']; ?>"><br>
<input type="password" name="confirm_password" id="" placeholder="Confirm Password" value="<?=$data['password']; ?>">
<input type="hidden" name="id" value="<?=$data['id'] ?>">
<input type="hidden" name="imageOld" value="<?=$data['image'] ?>">

<!-- <span class="spn"><img src="images/eye-close.png" alt=""></span> -->
<br>
        <!-- <button type="submit" name="submit">Submit</button> -->
         <input class="btn" style="background-color: green; color:white" type="submit" name="update" value="Update">   
        <?php
                }
         ?>       
        </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>