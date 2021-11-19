<html>
    <head>
        <title>아이디 찾기</title>
    </head>
    <body>
        <form action="find_id_server.php" method="post">

            <h2>아이디 찾기</h2>
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
        <br>

        <h3>유저의 ID를 찾기 위해 다음 정보들을 기입해주십시오</h3>    

        <label>닉네임</label>
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="chkNick" placeholder="닉네임"> <br>
            
        <label>비밀번호</label>
        <input type = "password" name="chkPwd" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" placeholder="비밀번호">
                
        <button>찾기</button>


    </form>
    </body>
    </html>