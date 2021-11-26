<?php
session_start();
include "library.php";
$URL = "./index.php";
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root-입부신청</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <style>
        .folder{
            height:900px;
            background:#474747;
        }
        h1{
            color:#D4EF63;
            font-weight:bold;
        }
        h4{
            color:#FFFFFF;
            padding:0 0 30px 0;
        }
        hr{
            width: 1200px;
            height: 3px;
            border: 0;
            background: #BBBBBB;
        }
        .container{
            padding-top:80px;
        }
        label{
            color:#FFFFFF;
            font-size:1.2em;
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
        <h1>문의</h1>
        <hr>
        <h4>아래에 제목과 내용, 이메일을 입력해주세요</h4>
        <form method="POST" action="question_action.php">
            <div class="form-group">
                <label>이메일 :</label>
                <input class="form-control" type="text" name="email"/>
            </div>

            <div class="form-group">
                <label>제목 :</label>
                <input class="form-control" type="text" name="title"/>
            </div>

            <div class="form-group">
                <label>내용 :</label>
                <textarea class="form-control" rows="10" name="content"></textarea>
            </div>

            <input class="btn" type="submit" name="answer" />
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