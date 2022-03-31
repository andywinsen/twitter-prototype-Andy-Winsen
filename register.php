<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1 style="text-align:center">Register a New User</h1>

	<form action="new_user_save.php" method="GET">
		<table border="0">
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input type="text" name="user_name" id="user_name" placeholder="Insert your username"></td>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="pass_word" id="pass_word" placeholder="Insert your password"></td>
			</tr>
				<td>Profile picture</td>
				<td>:</td>
				<td><input type="file" name="profile_url" id="profile_url"></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
				<button type="submit" id="cmd" name="cmd" value="save">Save Data</button>
				</td>
			</tr>
		</table>
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