<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
</head>
<script>
	
</script>
<body>
	<h1 style="text-align:center">Post Details</h1>

    <button onclick="location.href='home.php'">Return to home</button>

	<form action="post_edit_save.php" method="GET">
        <?php
        include "connection.php";
        $post_id = $_GET['post_id'];
        $sql = "select * from tweets where post_id = '$post_id'"; 
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
                    
        for ($x=1; $x<=$num ; $x++) { 
            $result = mysqli_fetch_array($query);
            $post_id = $result['post_id'];
			$connector_id = $result['connector_id'];
            $profile_url = $result['profile_url'];
            $user_name = $result['user_name'];
            $tweet_content = $result['tweet_content'];
			$image_name = $result['image_name'];
			$file_name = $result['file_name'];
        ?>
		<table border="0">
            <input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id ?>">
			<tr>
				<td>Post's Old File</td>
				<td>:</td>
				<td><input type="text" name="" id="" disabled="yes" value="<?php echo $file_name ?>"></td>
				<td>Post's New File</td>
				<td>:</td>
				<td><input type="file" name="file_name" id="file_name" value=""></td>
			</tr>
			<tr>
				<td>Post's Old Image</td>
				<td>:</td>
				<td><input type="text" name="" id="" disabled="yes" value="<?php echo $image_name ?>"></td>
				<td>Post's New Image</td>
				<td>:</td>
				<td><input type="file" name="image_name" id="image_name" value=""></td>
			</tr>
			<tr>
				<td>Connector ID</td>
				<td>:</td>
                <td><input type="text" name="connector_id" id="connector_id" value="<?php echo $connector_id ?>"></td>
				<td>Tweet Content</td>
				<td>:</td>
                <td><input type="text" name="tweet_content" id="tweet_content" value="<?php echo $tweet_content ?>"></td>	
                <td>
				<button type="submit">Save Changes</button>
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