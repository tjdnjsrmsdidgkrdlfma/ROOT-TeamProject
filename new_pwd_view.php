<html>
    <head>
        <title>새 비밀번호</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <style>
            .container{
            padding-top:100px;
            padding-bottom:150px;
        }
        .f-div {
                text-align: center;
                height: inherit;
                padding: 60px 0;
            }
        </style>
    </head>
    <form action="new_pwd_server.php" method="post">
        <body>
        <header></header>
        <div class="container">
            <h3>기존 아이디, 닉네임과 재설정할 비밀번호를 각각 입력해주세요</h3>
        <div class="form-group">
            <label>아이디</label>
            <input class="form-control" type="text" pattern="^[a-zA-z0-9]+$" name="exID" placeholder="아이디"> <br>
            </div>
            <div class="form-group">
            <label>닉네임</label>
            <input class="form-control" type="text" pattern="^[a-zA-z0-9]+$" name="exNick" placeholder="닉네임">  <br>
            </div>
            <div class="form-group">
            <label>새 비밀번호</label>
            <input class="form-control" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" name="newpwd" placeholder="새 비밀번호"> <br>
            </div>
            <div class="form-group">
            <label>비밀번호 확인</label>
            <input class="form-control" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" name="newconpwd" placeholder="비밀번호 확인">
            </div>
            <button class="btn">만들기</button>

        </form>
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