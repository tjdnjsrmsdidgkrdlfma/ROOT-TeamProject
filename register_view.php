<html>
    <head>
        <title>회원가입</title>
    </head>
    <body>
        <form action="register_server.php" method="post">

            <h2>회원가입</h2>
            <?php
                if(isset($_GET['error']))
                {   ?>
                    <p><?php echo $_GET['error']; ?> </p>
                <?php   }   ?>

            <?php
                if(isset($_GET['success']))
                {   ?>
                    <p><?php echo $_GET['success'] ?> </p>
                <?php   }   ?>
            
            <label>아이디</label>
            <input type="text" pattern="^[a-zA-Z0-9]+$" name="regID" placeholder="아이디">
            
        <label>닉네임</label>
        <input type = "text" pattern="^[a-zA-Z0-9]+$" name="regNick" placeholder="닉네임"> <br>

        <label>비밀번호</label>
        <input type = "password" name="regPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" placeholder="비밀번호">
        
        <label>비밀번호 확인</label>
        <input type = "password"  name="regConPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" placeholder="비밀번호 확인">
        
        <button>등록하기</button>

        <br>
        <br>

        <a href="login_view.php">이미 회원이신가요?(로그인 페이지)</a>
    </form>
    </body>
    </html>