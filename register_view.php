<html>
    <head>
        <title>회원가입</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <style>
            .folder {
                height: 890px;
                background: #474747;
            }
            h2 {
                color: #D4EF63;
                font-weight: bold;
            }
            hr {
                width: 1200px;
                height: 3px;
                border: 0;
                background: #BBBBBB;
            }
            label {
                color: #FFFFFF;
                font-size: 1em;
                padding: 0 0 10px;
            }
            .container {
                padding-top: 60px;
                padding-bottom: 70px;
            }
            a {
                color: #FFFFFF;
            }
            a:hover {
                text-decoration: none;
                color: #D4EF63;
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
                <form action="register_server.php" method="post">

                    <h2>회원가입</h2>
                    <hr>

                    <div class="form-group">
                        <label>아이디</label>
                        <input
                            class="form-control"
                            type="text"
                            pattern="^[a-zA-Z0-9]+$"
                            required="required"
                            title="영문 대소문자와 숫자만 입력 가능합니다"
                            name="regID"
                            placeholder="아이디">
                    </div>
                    <div class="form-group">
                        <label>닉네임</label>
                        <input
                            class="form-control"
                            type="text"
                            pattern="^[a-zA-Z0-9]+$"
                            required="required"
                            title="영문 대소문자와 숫자만 입력 가능합니다"
                            name="regNick"
                            placeholder="닉네임">
                    </div>
                    <div class="form-group">
                        <label>비밀번호</label>
                        <input
                            class="form-control"
                            type="password"
                            name="regPassword"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$"
                            required="required"
                            title="최소 영문 대소문자, 숫자, 특수문자가 하나씩 포함되어야 합니다"
                            placeholder="비밀번호">
                    </div>
                    <div class="form-group">
                        <label>비밀번호 확인</label>
                        <input
                            class="form-control"
                            type="password"
                            name="regConPassword"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$"
                            required="required"
                            title="최소 영문 대소문자, 숫자, 특수문자가 하나씩 포함되어야 합니다"
                            placeholder="비밀번호 확인">
                    </div>
                    <button class="btn">등록하기</button>
                    <a href="login_view.php">이미 회원이신가요?</a>
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