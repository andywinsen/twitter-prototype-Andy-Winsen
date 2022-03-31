<?php
session_start();
include "connection.php";

$user_name = $_POST['user_name'];
$pass_word = $_POST['pass_word'];

$sql = "select * from users where user_name='$user_name' and pass_word='$pass_word'";
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);
$user_name = $result['user_name'];
$pass_word = $result['pass_word'];

if($num==1){
	$_SESSION['user_name'] = $user_name;
	$_SESSION['pass_word'] = $pass_word;

	header("location:home.php");
}else{
?>
	<script type="text/javascript">
		alert("maaf, anda tidak memiliki akses login");
		location.href="index.php";
	</script>
<?php	
}
?>