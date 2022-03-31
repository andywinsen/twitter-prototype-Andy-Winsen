<?php
include "connection.php";
$user_id=$_GET['user_id'];
$profile_url=$_GET['profile_url'];
$user_name=$_GET['user_name'];

$sql2 = "update users set profile_url='$profile_url', user_name='$user_name' where user_id='$user_id'";
$query = mysqli_query($conn, $sql2) or die($sql2);
	
echo $sql2;
header("location:home.php");
?>