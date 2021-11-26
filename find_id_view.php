<html>
    <head>
        <title>아이디 찾기</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    </head>
    <style>
        .container{
            padding-top:100px;
        }
        .folder{
             height: 830px;
             background:#474747;
        }
        h2{
            color:#D4EF63;
            font-weight: bold;
        }
        hr{
            width: 1200px;
            height: 3px;
            border: 0;
            background: #BBBBBB;
        }
        h3{
            color:#FFFFFF;
        }
        label{
            color:#FFFFFF;
            font-size:1em;
            margin:20px 0;
        }
        .f-div {
                text-align: center;
                height: inherit;
                padding: 60px 0;
            }
    </style>
    <body>
        <header></header>
        <div class="folder">
        <div class="container">
        <form action="find_id_server.php" method="post">
                <h2>아이디 찾기</h2>
                <hr>
            <h3>유저의 ID를 찾기 위해 다음 정보들을 기입해주십시오</h3>    
            <div class="form-group">
                <label>닉네임</label>
                <input class="form-control" type="text" pattern="^[a-zA-Z0-9]+$" name="chkNick" placeholder="닉네임">
            </div>
            <div class="form-group">
                <label>비밀번호</label>
                <input class="form-control" type = "password" name="chkPwd" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{8,16}$" placeholder="비밀번호">
            </div>      
        <button class="btn">찾기</button>
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