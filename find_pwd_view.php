<html>
    <head>
        <title>비밀번호 찾기</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <style>
        .folder{
            height:890px;
            background:#474747;
        }
        h2{
            color:#D4EF63;
            font-weight:bold;
        }
        hr{
        width: 1200px;
        height: 3px;
        border: 0;
        background: #BBBBBB;
        }
        label{
            color:#FFFFFF;
        }
        .container{
            padding-top:100px;
            padding-bottom:300px;
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
            <form action="find_pwd_server.php" method="POST">
                
                <h2>비밀번호 찾기</h2>
                <hr>
        
                <div class="form-group">
                    <label>아이디</label>
                    <input class="form-control" type="text" pattern="^[a-zA-Z0-9]+$" name="checkID" placeholder="아이디">
                </div>
                <div class="form-group">
                    <label>닉네임</label>
                    <input class="form-control" type="password" name="checkNick" placeholder="닉네임">
                </div>    
                <button class="btn">찾기</button>
    
            </form>
            </div>
        
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