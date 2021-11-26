<?php
session_start();
include "library.php";
if (!isset($_SESSION['mb_nick'])) {
    echo "<script> alert('로그인이 필요합니다'); location.href='login_view.php'; </script>";
}
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>

<?php
session_start();
include "lib.php";

$idx = $_GET['idx'];
$idx = mysqli_real_escape_string($connect, $idx);

$query = "select * from sing_board where idx='$idx'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
$data['pub'] = $_SESSION['mb_nick'];
?>
<style>
    .folder{
        height:890px;
        background:#474747;
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
    label{
        font-size:1.2em;
        color:#FFFFFF;
    }
    .container{
            padding-top:150px;
            padding-bottom:70px;
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
<form action="writepost.php" method="post">
    <h1>게시판 작성</h1>
    <hr>
    <input type="hidden" name="idx" value="<?=$idx?>">
    <input type="hidden" name="publisher" value="<?=$data['pub']?>" readonly>
    
    <div class="form-group">
        <label>제목 :</label>
        <input class="form-control" type="text" pattern=".{0,100}" required title="최대 100글자" name="name" value="<?=$data['name']?>">
    </div>

    <div class="form-group">
        <label>내용 :</label>
        <textarea class="form-control" name="memo"><?=$data['memo']?></textarea>
    </div>

    <div class="form-group">
        <label>비밀번호 :</label>
        <input class="form-control" type="password" name="password" placeholder="비밀번호"> 
    </div>

    <input class="btn" type="submit" value="저장">
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