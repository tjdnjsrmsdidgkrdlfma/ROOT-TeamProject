<html>
    <head>
        <title>새 비밀번호</title>
    </head>
    <form action="new_pwd_server.php" method="post">
        <body>
            <h3>기존 아이디, 닉네임과 재설정할 비밀번호를 각각 입력해주세요</h3>
            <?php

        //올바르지 않은 입력이 있을 때 각 ?error에 관한 내용을 출력
        if(isset($_GET['error'])) { ?>
        <p><?php echo $_GET['error']; ?></p>
        <?php   }   ?>

        <?php

        if(isset($_GET['success'])) { ?>
        <p><?php echo $_GET['success']; ?></p>
        <?php   }   ?>

            <label>아이디</label>
            <input type="text" pattern="^[a-zA-z0-9]+$" name="exID" placeholder="아이디"> <br>

            <label>닉네임</label>
            <input type="text" pattern="^[a-zA-z0-9]+$" name="exNick" placeholder="닉네임">  <br>

            <label>새 비밀번호</label>
            <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" name="newpwd" placeholder="새 비밀번호"> <br>

            <label>비밀번호 확인</label>
            <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" name="newconpwd" placeholder="비밀번호 확인">
            
            <button>만들기</button>

        </form>
    </body>
</html>