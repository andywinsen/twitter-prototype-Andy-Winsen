<!DOCTYPE html>
<html>
<head>
	<title>Edit Comments</title>
</head>
<script>
	
</script>
<body>
	<h1 style="text-align:center">Comment Details</h1>

    <button onclick="location.href='home.php'">Return to home</button>

	<form action="comment_edit_save.php" method="GET">
        <?php
        include "connection.php";
        $comment_id = $_GET['comment_id'];
        $sql = "select * from comments where comment_id= '$comment_id'"; 
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
                    
        for ($x=1; $x<=$num ; $x++) { 
            $result = mysqli_fetch_array($query);
            $post_id = $result['post_id'];
            $comment_id = $result['comment_id'];
            $comment = $result['comment'];
        ?>
		<table border="0">
            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $comment_id ?>">
			<tr>
				<td>Comment</td>
				<td>:</td>
                <td><input type="text" name="comment" id="comment" value="<?php echo $comment ?>"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
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