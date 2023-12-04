
<?php
session_start();
include("Data/connectbd.php");

// if($connection){
//     echo 'connected';
// }

// echo"<br/>";

// echo $_SESSION['userInfo']['userId'];
// echo"<br/>";
// echo $_SESSION['role'];

function getProfile()
{
    global $connection;
    $userID = $_SESSION['userInfo']['userId'];
    $sql = "SELECT * FROM user WHERE id='$userID'";
    $runSql = mysqli_query($connection,$sql);
    if(mysqli_num_rows($runSql)>0){
       
        return $runSql;
    }
    else{
        echo "Error";
    }
}



?>