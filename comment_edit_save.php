<?php
include "connection.php";
$comment_id=$_GET['comment_id'];
$comment=$_GET['comment'];

$hastag= explode("#", $comment);

$array_count = count($hastag);

for($x=1; $x<$array_count; $x++){
    $sql = "insert into tags(tag) values('$hastag[$x]')";
    $query = mysqli_query($conn, $sql) or die($sql);
}

$sql2 = "update comments set comment='$comment' where comment_id='$comment_id'";
$query = mysqli_query($conn, $sql2) or die($sql2);
	
header("location:home.php");
?>