<?php

session_start(); //세션을 시작한다
include "lib.php"; // lib.php 파일을 포함시킨다
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <title>PHP write</title>
    <style>
        .folder{
            height:890px;
            background:#474747;
        }
        .container{
            padding-top:50px;
            padding-bottom:100px;
        }
        h1{
            color:#D4EF63;
            font-weight:bold;
        }
        hr{
        width: 1200px;
        height: 3px;
        border: 0;
        background: #BBBBBB;
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
        <h1>입부신청</h1>
        <hr>
        <h3>ROOT를 선택하려는 당신을 환영합니다, 아래 정보를 채워 제출해주세요!</h3>
            <form method="POST" action="membership_action.php">
                <div class="row">
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label>이름 :</label>
                        <input class="form-control" type="name" name="name"/>
                    </div>
                    </div>
    
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label>학번 :</label>
                        <input class="form-control" type="num" name="num"/>
                    </div>
                    </div>
                </div>
    
                <div class="form-group">
                    <label>전화번호 :</label>
                    <input class="form-control" type="tel" name="tel"/>
                </div>
    
                <div class="form-group">
                    <label>제목 :</label>
                    <input class="form-control" type="text" name="title"/>
                </div>
    
                <div class="form-group">
                    <label>내용 :</label>
                    <textarea class="form-control" rows="10" name="content" ></textarea>
                </div>
    
                <input class="btn" type="submit" name="answer"/>
            </form>
    </div>
</div>
<footer></footer>
    </div>
</body>
<script src="./script/jquery-1.12.3.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $('header').load('/header.html');
       $('footer').load('/footer.html');
   });
</script>
</html>