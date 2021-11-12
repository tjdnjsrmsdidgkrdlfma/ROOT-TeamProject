<html>
    <head>
        <title>회원가입</title>
    </head>
    <body>

    <!-- 사용자가 입력한 걸 post 방식으로 넘기고 register_server.php로 해당 데이터를 받는다 -->
    <form action="register_server.php" method="post">

        <h2>회원가입</h2>

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
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="id" placeholder="아이디">
        
        <label>닉네임</label>
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="nickname" placeholder="닉네임"> <br>
        
        <label>비밀번호</label>
        <input type="password" name="password" placeholder="비밀번호">
        
        <label>비밀번호 확인</label>
        <input type="password" name="confirmPassword" placeholder="비밀번호">

        <button type="submit">저장</button> <br> <br>

        <a href="login_view.php">이미 회원이신가요? (로그인 페이지)</a>

        </form>
    </body>
</html>