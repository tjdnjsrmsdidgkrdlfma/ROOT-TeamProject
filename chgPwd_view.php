<html>
    <head>
        <title>비밀번호 바꾸기</title>
    </head>
    <body>
        <form action="chgPwd_server.php" method="post">

            <h2>비밀번호 바꾸기</h2>
            <?php
            if(isset($_GET['error']))
            {   ?>
            <p><?php echo $_GET['error']; ?></p>
            <?php   }   ?>

            기존 비밀번호 <input type="password" name="exPwd" placeholder="기존 비밀번호">
            새 비밀번호 <input type="password" name="newPwd" placeholder="새 비밀번호">
            
            <br>

            아이디 <input type="text" pattern="^[a-zA-Z0-9]+$" name="ID" placeholder="아이디">
            닉네임 <input type="text" pattern="^[a-zA-Z0-9]+$" name="Nick" placeholder="닉네임">
            
            <button>바꾸기</button>
            
        </form>
    </body>
</html>