<?php
session_start();
$user_name = $_SESSION['user_name'];
if($user_name==""){
	header("location:index.php");
}
?>