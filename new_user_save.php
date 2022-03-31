<?php
include "connection.php";
$profile_url=$_GET['profile_url'];
$user_name=$_GET['user_name'];
$pass_word=$_GET['pass_word'];
// $hastag=isset($_GET['hastag']);
$cmd=$_GET['cmd'];

$sql = "insert into users(user_name,pass_word,profile_url) values('$user_name', '$pass_word', '$profile_url')";
$query = mysqli_query($conn, $sql) or die($sql);

header("location:index.php");
?>
