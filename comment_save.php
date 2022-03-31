<?php
session_start();
include "connection.php";
$post_id=$_GET['post_id'];
$connector_id=$_GET['connector_id'];
$user_name = $_SESSION['user_name'];
$sql = "select profile_url from users where user_name='$user_name'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);

for ($x=1; $x<=$num ; $x++) { 
    $result = mysqli_fetch_array($query);
    $profile_url = $result['profile_url'];
}
$comment = $_GET['comment'];

$hastag= explode("#", $comment);

$array_count = count($hastag);

for($x=1; $x<$array_count; $x++){
    $sql = "insert into tags(connector_id,tag) values('$connector_id','$hastag[$x]')";
    $query = mysqli_query($conn, $sql) or die($sql);
}

$sql2 = "insert into comments(post_id,connector_id,user_name,profile_url,comment) values('$post_id','$connector_id','$user_name', '$profile_url' ,'$comment')";
$query = mysqli_query($conn, $sql2) or die($sql);
	
header("location:home.php");
?>