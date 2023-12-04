<?php

include('../Function/auth.php');

if(isset($_SESSION['role'])){

if($_SESSION['role']!=1)
{
echo"Access Denied";
header("location:../login.php");
}

}

?>