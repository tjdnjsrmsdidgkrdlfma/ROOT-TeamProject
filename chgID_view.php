<html>
    <head>
        <title>아이디 바꾸기</title>
    </head>
    <body>
        <form action="chgID_server.php" method="post">

            <h2>아이디 바꾸기</h2>
            <?php
            if(isset($_GET['error']))
            {   ?>
            <p><?php echo $_GET['error']; ?></p>
            <?php   }   ?>

            기존 아이디 <input type="text" pattern="^[a-zA-Z0-9]+$" name="exID" placeholder="기존 아이디">
            새 아이디 <input type="text" pattern="^[a-zA-Z0-9]+$" name="newID" placeholder="새 아이디">
            
            <br>

            비밀번호 <input type="password" name="pwd" placeholder="비밀번호">
            비밀번호 확인 <input type="password" name="conpwd" placeholder="비밀번호 확인">
            
            <button>바꾸기</button>
            
        </form>
    </body>
</html>