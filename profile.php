<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<script>
</script>
<body>
	<h1 style="text-align:center">Edit Your Profile</h1>

    <button onclick="location.href='home.php'">Return to home</button>

	<form action="profile_save.php" method="GET">
		<?php
			include "connection.php";
			$user_id = $_GET['user_id'];
			$sql = "select * from users where user_id = '$user_id'"; 
			$query = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($query);
						
			for ($x=1; $x<=$num ; $x++) { 
				$result = mysqli_fetch_array($query);
				$profile_url = $result['profile_url'];
				$user_name = $result['user_name'];
				$user_id = $result['user_id']
        ?>
		<table border="0">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input type="text" name="user_name" id="user_name" placeholder="Insert your name" value="<?php echo $user_name ?>"></td>
			</tr>
				<td>Profile picture</td>
				<td>:</td>
				<td><input type="file" name="profile_url" id="profile_url" value="<?php echo $profile_url ?>"></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
				<button type="submit" id="cmd" name="cmd" value="save">Save Data</button>
				</td>
			</tr>
		</table>
		<?php
			}
		?>
</body>
<style>
body{
	margin: auto;
  	width: 90%;
	font-family:arial;
	color:black;
    padding:70px;
}
form{
	margin: auto;
  	width: 60%;
	margin-bottom:50px;
}
input{
	padding:20px;
	border-radius:10px;
	border:1px solid grey;
	margin:20px 20px 20px 20px;
}
.result_table{
	margin-left:-100px;
}
.grid{
    background-color:#1C2833;
    padding:20px;
	text-align:center;
}
button{
	background-color:#5499C7;
	padding:20px;
	border:none;
	border-radius:5px;
	margin-left:20px;
	color:black;
	width:210px;
}
.action_butt{
	background-color:#85C1E9 ;
	border:none;
	border-radius:5px;
	color:black;
}
</style>
</html>