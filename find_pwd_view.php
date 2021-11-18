<html>
    <head>
        <title>비밀번호 찾기</title>
    </head>
    <body>
        
        <form action="find_pwd_server.php" method="POST">

        <h2>비밀번호 찾기</h2>

        <?php
            if(isset($_GET['error']))
            {   ?>
                <p><?php echo $_GET['error']; ?> </p>
            <?php    }  ?>

            <?php
            if(isset($_GET['success']))
            {   ?>
                <p><?php echo $_GET['success']; ?> </p>
            <?php    }  ?>
            
        <label>아이디</label>
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="checkID" placeholder="아이디"> <br>
            
        <label>닉네임</label>
        <input type="password" name="checkNick" placeholder="닉네임">
            
        <button>찾기</button>

        </form>
        </body>
</html>