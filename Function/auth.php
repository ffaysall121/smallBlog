<?php

session_start();
include("../Data/connectbd.php");



if(isset($_POST['submit']))
{
$name = mysqli_real_escape_string($connection,$_POST['name']);
$email = mysqli_real_escape_string($connection,$_POST['email']);
$phone = mysqli_real_escape_string($connection,$_POST['phone']);
$gender = mysqli_real_escape_string($connection,$_POST['gender']);
$interest1 = serialize($_POST['interest']) ;
$interest = mysqli_real_escape_string($connection,$interest1);

$area = mysqli_real_escape_string($connection,$_POST['area']);

$password = mysqli_real_escape_string($connection,$_POST['password']);
$conPassword = mysqli_real_escape_string($connection,$_POST['confirm_password']);

$imageName = $_FILES['image']['name'];
$imageSize = $_FILES['image']['size'];
$imageExt = pathinfo($imageName,PATHINFO_EXTENSION);
$newImageName = uniqid(). '.' .$imageExt;
$path = "../images/";


$checkMail="SELECT email FROM user WHERE email='$email'";
$runCheckMail = mysqli_query($connection,$checkMail);

if(mysqli_num_rows($runCheckMail)>0)
{
    echo "Email already exists";
    header("location:../reg.php");
}
elseif($password!=$conPassword){
    echo "Password are not same";
    header("location:../reg.php");

}



else{

$sql = "INSERT INTO user (name,email,phone,gender,interest,area,image,password) VALUES('$name','$email','$phone','$gender','$interest','$area','$newImageName','$password')";
$runSql = mysqli_query($connection,$sql);
}

if(!$runSql){
    echo "Error";
    header("location:../reg.php");
    
    
  
}
else {
    move_uploaded_file($_FILES['image']['tmp_name'],$path.$newImageName);
    echo "Sucessfully executed";
    header("location:../login.php");

}



}


elseif(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $loginSql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $runLoginSql =mysqli_query($connection, $loginSql);
if(mysqli_num_rows($runLoginSql)>0){
    $userData = mysqli_fetch_array($runLoginSql);
    $uname =$userData['name'];
    $uemail =$userData['email'];
    $urole =$userData['role'];
    $uid = $userData['id'];
    $_SESSION['role'] = $urole;
    $_SESSION['userInfo'] = [
        'userName' => $uname,
        'userEmail' => $uemail,
        'userId' => $uid
    ];

     

    if($urole==0){
        echo " Login Successfully";
        header("location:../index.php");
    }
    elseif($urole==1){
        echo " Login Successfully";
        header("location:../Admin/index.php");
    }

    
   
}
else{
    echo " Error";
    header("location:../login.php");
   
}

}





else if(isset($_POST['update']))
{

$name = mysqli_real_escape_string($connection,$_POST['name']);
$email = mysqli_real_escape_string($connection,$_POST['email']);
$phone = mysqli_real_escape_string($connection,$_POST['phone']);
$gender = mysqli_real_escape_string($connection,$_POST['gender']);
$interest1 = serialize($_POST['interest']) ;
$interest = mysqli_real_escape_string($connection,$interest1);

$area = mysqli_real_escape_string($connection,$_POST['area']);

$password = mysqli_real_escape_string($connection,$_POST['password']);
$conPassword = mysqli_real_escape_string($connection,$_POST['confirm_password']);
$id = mysqli_real_escape_string($connection,$_POST['id']);
$oldImage = mysqli_real_escape_string($connection,$_POST['imageOld']);
$imageName = $_FILES['image']['name'];

if($imageName==''){
    $newImageName=$oldImage;
}
else{
$imageSize = $_FILES['image']['size'];
$imageExt = pathinfo($imageName,PATHINFO_EXTENSION);
$newImageName = uniqid(). '.' .$imageExt;
}

$path = "../images/";

if($password!=$conPassword){
    echo "Password are not same";
    header("location:../profile.php");

}



else{
    $sql = "UPDATE user SET  name='$name', email='$email', phone='$phone',gender='$gender', interest ='$interest',area='$area',image='$newImageName',password='$password' WHERE id='$id'";

     $runSql = mysqli_query($connection,$sql);



if($runSql){
    move_uploaded_file($_FILES['image']['tmp_name'],$path.$newImageName);
    
    if($_FILES['image']['name'] != "")
    {
        unlink($path.$oldImage);
    }
   

        header("location:../profile.php");
    
}
}




}

else{
    echo"Something went wrong";
}

?>