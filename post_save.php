<?php
session_start();
include "connection.php";
///mengambil data
$connector_id = $_GET['connector_id'];
$profile_url=$_GET['profile_url'];
$user_name = $_SESSION['user_name'];
$file_name = $_GET['file_name'];
$image_name = $_GET['image_name'];
$sql = "select profile_url from users where user_name='$user_name'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);

for ($x=1; $x<=$num ; $x++) { 
    $result = mysqli_fetch_array($query);
    $profile_url = $result['profile_url'];
}
$tweet_content=$_GET['tweet_content'];
$comment = $_GET['comment'];

$hastag= explode("#", $tweet_content);

$array_count = count($hastag);


for($x=1; $x<$array_count; $x++){
    $sql = "insert into tags(connector_id,tag) values('$connector_id','$hastag[$x]')";
    $query = mysqli_query($conn, $sql) or die($sql);
}

$sql2 = "insert into tweets(connector_id,user_name,profile_url,tweet_content,image_name,file_name,comment) values('$connector_id','$user_name', '$profile_url', '$tweet_content', '$image_name' ,'$file_name', '$comment')";
$query2 = mysqli_query($conn, $sql2) or die($sql2);

header("location:home.php");
?>