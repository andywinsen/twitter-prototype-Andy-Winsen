<?php
session_start()
?>
<html>
    <head>
        <title>Andy's Blog</title>
        <!-- import bootstrap library menggunakan cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <script>
        function f_edit_profile(user_id){
            location.href="profile.php?user_id="+user_id+"&";
        }

        function search_filter(tag_filter){
            location.href="search.php?tag_filter="+tag_filter+"&";
        }

        // function pengelola posting
        function f_edit_post(post_id){
            location.href="post_edit.php?post_id="+post_id+"&";
        }
        function f_del_post(post_id,connector_id){
		    location.href="post_delete.php?post_id="+post_id+"&connector_id="+connector_id+"&";
	    }

        // function pengelola comment
        function f_postcomment(comment){
		    location.href="comment_save.php?comment="+comment+"&";
	    }
        function f_del_comment(comment_id,connector_id){
            location.href="comment_delete.php?comment_id="+comment_id+"&connector_id="+connector_id+"&";
        }
        function f_edit_comment(comment_id){
            location.href="comment_edit.php?comment_id="+comment_id+"&";
        }
    </script>
    <body>

        <!-- bagian dari header -->
        <div class="container-fluid bg-primary bg-opacity-50 p-3">
            <div class="row">
                <div class="col p-4 ms-4">
                    <h3>My Blog</h3>
                </div>
                <!-- tombol logout -->
                <button style="width:80px; margin:15px 40px 0 0; background-color:blue; border:none; width:100px; border-radius:40px; height:60px; color:white" onclick="location.href='logout.php'">Logout</button>
                <!-- profile_picture -->
                <div class="col-md-auto mt-3 me-4">
                    <?php
                        // mengambil settingan dari file connection.php yang memilih database yang akan diconnect
                        include "connection.php";
                        $user_name = $_SESSION['user_name'];
                        // sinkronisasi profile picture dengan user yang login
                        $sql = "select * from users where user_name='$user_name'"; 
                        $query = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($query);
                    
                        for ($x=1; $x<=$num ; $x++) { 
                        $result = mysqli_fetch_array($query);
                        $profile_url = $result['profile_url'];
                        $user_id = $result['user_id'];
                        $pass_word = $result['pass_word'];
                        $user_name = $result['user_name'];
                    ?>
                    <div>
                        <img src=<?php echo $profile_url ?> name="profile_url" id="profile_url" class="rounded-circle" alt="" style="width:50px" onclick="f_edit_profile(<?php echo "'$user_id'" ?>)">
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- akhir dari bagian header -->

        <form action="search.php" method="GET">
            <input type="text" name="tag_filter" id="tag_filter" class="tag_filter" style="margin:50px; width:200px; border-radius:20px; border:1px solid grey">
            <button type="submit" style="border-radius:20px; border:none; color: white; background-color:blue; padding:10px; width:200px">Search</button>
        </form>

        <!-- bagian dari body blog -->
        <div class="p-5">

            <!-- header dari body blog -->
            <h3>My Stories</h3>
            
            <hr class="col-9 mt-5 mb-5">

                <!-- form untuk komentar posting -->
                <form action="comment_save.php" method="GET" autocomplete="off">
                    <!-- input untuk penetapan id post yang akan dicomment -->
                    <input type="text" placeholder="insert post ID" name="post_id" id="post_id" style="width:150px; border-radius:20px; padding:10px; border:1px solid grey;">
                    <!-- input untuk penetapan id connector yang akan dicomment -->
                    <input type="number" placeholder="insert connector ID" name="connector_id" id="connector_id" style="width:150px; border-radius:20px; padding:10px; border:1px solid grey;">
                    <!-- input untuk isi dari comment -->
                    <input type="text" name="comment" id="comment" style="width:640px; border-radius:20px; padding:10px; border:1px solid grey;" placeholder="Write your comment towards the post">
                    <button type="submit" style="border-radius:20px; border:none; color: white; background-color:blue; padding:10px; width:200px">Post Comment</button>
                </form>

            <p class="input_label" style="float:left; margin-right:20px; padding:35px">Story:</p>

                <!-- form untuk postingan -->
                <form action="post_save.php" method="GET" autocomplete="off">
                    
                    <!-- input isi postingan -->                        
                    <input type="number" name="connector_id" id="connector_id">
                    <textarea maxlength="250" class="tweet_content" name="tweet_content" id="tweet_content" style="border:1px solid blue; background-color:white ; border-radius:10px; width:700px; height:100px; float:left"></textarea>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- input untuk file di postingan -->
                    <p style="float:left; margin-right:20px;">Attach a file:</p><input type="file" name="file_name" class="file_name" id="file_name" style="float:left">
                    <p style="float:left; margin-right:20px;">Attach an image:</p><input type="file" name="image_name" class="image_name" id="image_name">

                    <br>
                    <button type="submit" value="tweet" style="margin-top:-40px; margin-right:250px; float:right; border-radius:20px; border:none; color: white; background-color:blue; padding:10px; width:100px">Tweet</button>

                    <div style="border:1px solid blue; background-color:white ; border-radius:20px; width:700px; height:auto; margin-top:50px; padding:20px; margin-left:50px;">
                        <?php
                            // mengambil settingan dari file connection.php yang memilih database yang akan diconnect
                            include "connection.php";
                            // mengambil seluruh data yang terletak pada tabel tweets
                            $sql = "select * from tweets"; 
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
                        <!-- return atau output dari isi tabel tweets -->
                        <div>

                            <!-- profile picture user yang melakukan tweet -->
                            <img src="<?php echo $profile_url ?>" style="width:50px; border-radius:50px; float:left; margin-right:20px; margin-top:30px;">
                            
                            <p style="font-size:12px">This post's id: <?php echo $post_id ?></p></p>
                            <p style="font-size:12px">This post's connector id: <?php echo $connector_id ?></p></p>

                            <!-- nama user yang melakukan tweet -->
                            <h3 style="margin-top:10px; margin-bottom:30px;"><?php echo $user_name ?></h3>

                            <!-- isi dari tweet yang dilakukan oleh user -->
                            <p style="margin-left:70px; margin-bottom:50px; inline-size:300px;"><?php echo $tweet_content ?>
                            </p>

                            <!-- file yang terattach dengan tweet user -->
                            <p style="margin-left:70px; margin-top:-20px; margin-bottom:40px;">Attached with "<?php echo $file_name ?>" file</p>

                            <!-- image yang terattach dengan tweet user -->
                            <p style="margin-left:70px; margin-top:-20px; margin-bottom:40px;">Attached with image:</p>
                            <img src="<?php echo $image_name ?>" alt="" style="margin-bottom:40px; margin-left:50px ;width:500px;">

                            <!-- button untuk menghapus post yang telah dilakukan -->
                            <input style="float:right; width:200px; padding:10px; border-radius:20px; margin-left:20px; border:none; background-color:blue; color:white;" class="target_button" value="Delete Post" type="button" onclick="f_del_post(<?php echo "'$post_id','$connector_id'" ?>)">

                            <!-- button untuk mengedit post yang telah dilakukan -->
                            <input style="float:right; width:200px; padding:10px; border-radius:20px; border:none; background-color:blue; color:white;" class="target_button" value="Edit Post" type="button" onclick="f_edit_post(<?php echo "'$post_id'" ?>)">


                            <hr style="margin-top:120px;">
                            <?php
                                }
                            ?>
                        </div>
                    </form>
            </div>
        </div>
        <!-- akhir dari body blog -->

        <?php
        include "connection.php";
        $sql = "select * from comments"; 
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
                        
        for ($x=1; $x<=$num ; $x++) { 
            $result = mysqli_fetch_array($query);
            $comment_id = $result['comment_id'];
            $connector_id = $result['connector_id'];

            $post_id = $result['post_id'];
            $profile_url = $result['profile_url'];
            $user_name = $result['user_name'];
            $comment = $result['comment'];
        ?>
        <div style="margin-top:40px;">
            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $comment_id ?>">
            <img src="<?php echo $profile_url ?>" alt="" style="width:50px; margin-right:20px; border-radius:100px; margin-left:100px;">
            <p style="margin-top:-65px; margin-left:180px;">Connector <?php echo $connector_id ?>, 
            <p style="margin-top:-65px; margin-left:180px;">Regarding post <?php echo $post_id ?>, 
            <br>
            <input type="button" style="float:right; margin-right:600px; margin-top:20px" value="Delete Comment" onclick="f_del_comment(<?php echo "'$comment_id', '$connector_id'" ?>)">
            <input type="button" style="float:right; margin-right:600px; margin-top:20px" value="Edit Comment" onclick="f_edit_comment(<?php echo "'$comment_id'" ?>)">
            <br>
            <br>
            <span style="font-weight:bold;"><?php echo $user_name ?></span> commented: "<?php echo $comment ?>"</p>
            <br>
            <br>
        </div>
        <?php
            }
        ?>

    </body>
    <style>
    </style>

</html>