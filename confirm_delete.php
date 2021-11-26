<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<style>
    .folder{
        height: 900px;
        background: #474747;
    }
    h1{
        color:#D4EF63;
        font-weight: bold;
    }
    h3{
        color:#FFFFFF;
    }
    .form-group > label {
        color:#FFFFFF;
    }
    hr{
        width: 1200px;
        height: 3px;
        border: 0;
        background: #BBBBBB;
    }
    .container{
            padding-top:130px;
        }
    .f-div {
            text-align: center;
            height: inherit;
            padding: 60px 0;
            }
</style>
<?php

// lib.php 파일을 포함시킨다
include "lib.php";

$idx = $_GET['idx']; // $_GET으로 idx를 받아온다
$idx = mysqli_real_escape_string($connect, $idx); // 특수문자를 문자열로 탈출시켜준다

?>
<body>
<header></header>
<div class="folder">
<div class="container">
    <form action="delete.php" method="post">
        <input type="hidden" name="idx" value="<?=$idx?>">
            <h1>게시글 삭제</h1>
            <hr>
            <h3>게시물을 정말 삭제하시겠습니까? </h3>
            <div class="form-group">
                <label>비밀번호 :</label>
                <input class="form-control" type="password" name="password" placeholder="비밀번호">
            </div>
        <input class="btn" type="submit" value="저장">
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