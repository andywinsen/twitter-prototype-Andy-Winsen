<?php
include "connection.php";
///mengambil data
$post_id=$_GET['post_id'];
$connector_id=$_GET['connector_id'];
$profile_url=$_GET['profile_url'];
$tweet_content=$_GET['tweet_content'];
$cmd=$_GET['cmd'];

$sql = "delete from tweets where connector_id='$connector_id'";
$query = mysqli_query($conn, $sql) or die($sql);

$sql2 = "delete from comments where connector_id='$connector_id'";
$query2 = mysqli_query($conn, $sql2) or die($sql2);

$sql3 = "delete from tags where connector_id='$connector_id'";
$query2 = mysqli_query($conn, $sql3) or die($sql3);
	
header("location:home.php");
?>