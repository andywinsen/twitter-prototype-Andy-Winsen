<html>
    <head>
        <title>Login Page</title>
        <!-- import bootstrap library menggunakan cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

        <h2 class="text-center p-5">Login Page</h2>

        <!-- body dari login page -->
        <form action="login.php" method="POST">
            <div class="container text-center p-4 border border-primary col-5" style="border-radius:20px">
                <div class="mt-4 mb-5">
                    <p class="fw-bold">Username</p>
                    <input type="text" name="user_name" class="user_name" id="user_name" placeholder="Masukkan Username anda">
                </div>
                <div class="mb-5">
                    <p class="fw-bold">Password</p>
                    <input type="password" name="pass_word" class="pass_word" id="pass_word" placeholder="Masukkan Password anda">
                </div>
                <input type="submit" name="cmdlogin" id="cmdlogin" value="LOGIN">
                <br>
        </form>
                <a href="register.php">Register</a>
            </div>
        
        <!-- akhir dari body login page -->
        
    </body>
    <style>

        /* selector untuk apply style di textbox password dan username */

        .user_name, .pass_word{
            width:250px;
            border-radius:10px;
            border:1px solid blue;
            padding: 10px;
        }

        /* selector untuk apply style di button login dan register */

        #cmdlogin, #register_button{
            background-color:blue;
            border:none;
            width:250px;
            padding:10px;
            border-radius:40px;
            color:white;
            margin-bottom:40px;
            font-weight:bold;
            transition:0.5s;
        }
        button:hover{
            transition:0.5s;
            background-color:white;
            color:blue;
            border:1px solid blue;
        }

    </style>
</html>