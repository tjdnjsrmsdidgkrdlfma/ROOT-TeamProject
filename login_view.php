<html>
    <head>
        <title>로그인</title>
    </head>
    <body>

    <form action="login_server.php" method="post">

        <h2>로그인</h2>

        
        <?php
        //올바르지 않은 입력이 있을 때 각 ?error에 관한 내용을 출력
        if(isset($_GET['error'])) { ?>
        <P><?php echo $_GET['error']; ?></P>
        <?php   }   ?>

        <?php
        //성공적으로 입력이 완료됐을 때 ?suuccess에 관한 내용을 출력
        if(isset($_GET['success'])){ ?>
        <P><?php echo $_GET['success']; ?></P>
        <?php   }  ?>
        
        <label>아이디</label>
        <input type="text" name="loginID" pattern="^[a-zA-Z0-9]+$" placeholder="아이디"> <br>
        
        <label>비밀번호</label>
        <input type="password" name="loginPassword" placeholder="비밀번호">
        
        <button type="submit" name="Login">로그인</button> <br> <br>

        <a href="register_view.php">아직 회원이 아니신가요? (회원가입 페이지)</a>

        </form>
    </body>
</html>