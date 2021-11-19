<html>
    <head>
        <title>닉네임 바꾸기</title>
    </head>
    <body>
        <form action="chgNick_server.php" method="post">

            <h2>닉네임 바꾸기</h2>
            <?php
            if(isset($_GET['error']))
            {   ?>
            <p><?php echo $_GET['error']; ?></p>
            <?php   }   ?>

            기존 닉네임 <input type="text" pattern="^[a-zA-Z0-9]+$" name="exNick" placeholder="기존 닉네임">
            새 닉네임 <input type="text" pattern="^[a-zA-Z0-9]+$" name="newNick" placeholder="새 닉네임">
            
            <br>

            비밀번호 <input type="password" name="pwd" placeholder="비밀번호">
            비밀번호 확인 <input type="password" name="conpwd" placeholder="비밀번호 확인">
            
            <button>바꾸기</button>
            
        </form>
    </body>
</html>