<html>
    <head>
        <title>로그인</title>
    </head>
    <body>
        <form action="login_server.php" method="post">

            <h2>로그인</h2>
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
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="logID" placeholder="아이디"> <br>
            
        <label>비밀번호</label>
        <input type = "password" name="logPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" placeholder="대소문자와 숫자를 하나씩 포함시켜야 합니다">
                    
        <button>로그인하기</button>

        <br>
        <br>

        <a href="register_view.php">아직 회원이 아니신가요?(회원가입 페이지)</a>

        <br>
        <br>

        <a href="find_id_view.php">아이디 찾기</a>
        <a href="find_pwd_view.php">비밀번호 찾기</a>


    </form>
    </body>
    </html>