<html>
    <head>
        <title>회원 탈퇴</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <style>
            .folder {
                height: 830px;
                background: #474747;
                color: #fff;
                padding-top: 140px;
            }
            .btn {
                color: #000;
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
        <form class="folder" action="delete_member_server.php" method="post">
            <div class="container">
                <h2>회원 탈퇴</h2>
                <hr>
                <h3>지우고자 하는 계정의 정보를 입력해주십시오</h3>
            
                <div class="form-group">
                    <label>아이디</label>
                    <input class="form-control" type="text" name = "id" pattern="^[a-zA-Z0-9]+$" required title = "영문 대소문자와 숫자만 입력 가능합니다" placeholder = "아이디">
                </div>

                <div class="form-group">
                    <label>닉네임</label>
                    <input class="form-control" type="text" name = "nick" pattern="^[a-zA-Z0-9]+$" required title = "영문 대소문자와 숫자만 입력 가능합니다" placeholder = "닉네임">
                </div>

                <div class="form-group">
                    <label>비밀번호</label>
                    <input class="form-control" type="password" name = "pwd" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{4,16}$" required title = "영문 대소문자, 숫자, 특수 문자가 최소 하나는 포함돼야 합니다" placeholder = "비밀번호">
                </div>

                <button class="btn">탈퇴</button>
            </div>
        </form>
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