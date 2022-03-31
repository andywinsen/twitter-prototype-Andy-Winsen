<?php
session_start();
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
        function f_del_post(post_id){
		    location.href="post_delete.php?post_id="+post_id+"&";
	    }

        // function pengelola comment
        function f_postcomment(comment){
		    location.href="comment_save.php?comment="+comment+"&";
	    }
        function f_del_comment(comment_id){
            location.href="comment_delete.php?comment_id="+comment_id+"&";
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

        <button onclick="location.href='home.php'" style="margin:50px;">Return to home</button>

        <!-- output tweets berdasarkan search -->
        <?php
        include "connection.php";
        ///mengambil data
        $tag_filter = $_GET['tag_filter'];
        $sql = "select * from tweets where tweet_content LIKE '%#$tag_filter%'";
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);

        for ($x=1; $x<=$num ; $x++) { 
            $result = mysqli_fetch_array($query);
            print_r($result);
            $profile_url = $result['profile_url'];
            $user_name = $result['user_name'];
            $post_id = $result['post_id'];
            $tweet_content = $result['tweet_content'];
            $file_name = $result['file_name'];
            $image_name = $result['image_name'];
        ?>
        <div style="padding:50px;">

            <!-- profile picture user yang melakukan tweet -->
            <img src="<?php echo $profile_url ?>" style="width:50px; border-radius:50px; float:left; margin-right:20px; margin-top:30px;">

            <p style="font-size:12px">This post's id: <?php echo $post_id ?></p>

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
            <input style="float:right; width:200px; padding:10px; border-radius:20px; margin-left:20px; border:none; background-color:blue; color:white;" class="target_button" value="Delete Post" type="button" onclick="f_del_post(<?php echo "'$post_id'" ?>)">

            <!-- button untuk mengedit post yang telah dilakukan -->
            <input style="float:right; width:200px; padding:10px; border-radius:20px; border:none; background-color:blue; color:white;" class="target_button" value="Edit Post" type="button" onclick="f_edit_post(<?php echo "'$post_id'" ?>)">


            <hr style="margin-top:120px;">
            <?php
                }
            ?>
        </div>

        <!-- output comment yang sesuai dengan hastag -->

        <?php
        include "connection.php";
        ///mengambil data
        $tag_filter = $_GET['tag_filter'];
        $sql = "select * from comments where comment LIKE '%#$tag_filter%'";
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);

        for ($x=1; $x<=$num ; $x++) { 
            $result = mysqli_fetch_array($query);
            $comment_id = $result['comment_id'];
            $post_id = $result['post_id'];
            $profile_url = $result['profile_url'];
            $user_name = $result['user_name'];
            $comment = $result['comment'];
        ?>
        <div style="margin-top:40px;">
            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $comment_id ?>">
            <img src="<?php echo $profile_url ?>" alt="" style="width:50px; margin-right:20px; border-radius:100px; margin-left:100px;">
            <p style="margin-top:-65px; margin-left:180px;">Regarding post <?php echo $post_id ?>, 
            <input type="button" style="float:right; margin-right:600px; margin-top:20px" value="Delete Comment" onclick="f_del_comment(<?php echo "'$comment_id'" ?>)">
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
        </div>
    </body>
</html>


