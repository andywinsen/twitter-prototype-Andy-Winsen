<?php
include "connection.php";
///mengambil data
$post_id=$_GET['post_id'];
$tweet_content=$_GET['tweet_content'];
$image_name = $_GET['image_name'];
$file_name = $_GET['file_name'];

$hastag= explode("#", $tweet_content);

$array_count = count($hastag);

for($x=1; $x<$array_count; $x++){
    $sql = "insert into tags(tag) values('$hastag[$x]')";
    $query = mysqli_query($conn, $sql) or die($sql);
}

$sql2 = "update tweets set tweet_content='$tweet_content', image_name='$image_name' ,file_name='$file_name' where post_id='$post_id'";
$query = mysqli_query($conn, $sql2) or die($sql2);
	
header("location:home.php");
?>