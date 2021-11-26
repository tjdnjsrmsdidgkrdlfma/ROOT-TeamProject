<?php
session_start();
if (isset($_SESSION['mb_nick'])) {
    echo "<script> alert('이미 로그인하셨습니다'); location.href='index.html'; </script>";
}
?>
<html>
    <head>
        <title>로그인</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <style>
            .folder{
                height:890px;
                background:#474747;
            }
            label{
                color:#D4EF63;
                font-weight:bold;
                font-size:2em;
            }
            form{
                margin-top: 13em;
            }
            button{
                margin:30px 0 0 0;
            }
            a{
                margin:0 20px 20px 0;
                color:#FFFFFF;
            }
            a:hover{
                color:#D4EF63;
                text-decoration:none;
            }
            .f-div {
                text-align: center;
                height: inherit;
                padding: 60px 0;
            }
        </style>
    </head>
    <body>
        <header></header>
        <div class="folder">
            <div class="container">
                <form action="login_server.php" method="post">
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" type="text" pattern="^[a-zA-Z0-9]+$" required title="영문 대소문자와 숫자만 입력 가능합니다" name="logID" placeholder="아이디"> 
                    </div>
                    <div class="form-group">
                        <label>PW</label>
                        <input class="form-control" type = "password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{4,16}$" required title="영문 대소문자와 숫자, 특수문자가 하나씩 들어가야 하고 최소 4글자, 최대 18글자입니다" name="logPassword" placeholder="비밀번호">
                    </div>
                    <button class="btn">로그인</button>
                    <br>
                    <br>
                    <a href="register_view.php">아직 회원이 아니신가요?</a>
                    <br>
                    <br>
                    <a href="find_id_view.php">아이디 찾기</a>
                    <a href="find_pwd_view.php">비밀번호 찾기</a>
                </form>
            </div>
        </div>
        <footer></footer>
    </body>
    <script src="./script/jquery-1.12.3.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        $('header').load('/header.html');
        $('footer').load('/footer.html');
        });
    </script>
</html>