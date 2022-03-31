<?php
include "connection.php";
$comment_id=$_GET['comment_id'];
$connector_id=$_GET['connector_id'];

$sql = "delete from comments where comment_id='$comment_id'";
$query = mysqli_query($conn, $sql) or die($sql);
	
header("location:home.php");
?>